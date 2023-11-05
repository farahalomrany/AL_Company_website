<?php

namespace App\Http\Controllers\api;

use App\Http\Resources\UserResource;
use App\Mail\Verificationemail;
use App\Models\ResetPassword;
use App\Traits\ResponseTraits;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Mail\SendResetPasswordCode;
use Illuminate\Support\Facades\Auth;

//email verify
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Exception;

class AuthController extends Controller
{
    use ResponseTraits;


    public function register(Request $request)
    {
        $fields = $request->validate([
            // 'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => 'null',
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        // $token = $user->createToken('myapptoken')->plainTextToken;
        $message = $this->emailverifycode($user->email);
        $response = [
            'user' => $user,
            // 'verify message' => $message
            // 'token' => $token
        ];
        return $this->sendResponse(UserResource::collection($response), 'completed successfully', []);
    }
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response(['message' => 'Wrong Password'], 401);
        }
        if ($user->is_blocked == 1) {
            return $this->sendError([], "you are blocked");
        }
        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => new UserResource($user),
            'token' => $token
        ];
        return $this->sendResponse($response, 'completed successfully', []);
    }
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
    //reset password
    public function sendCodeToEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $oldCode = ResetPassword::firstWhere('email', $request->email);
        if (isset($oldCode)) {
            $oldCode->delete();
        }
        $code = Str::random(6);

        try {
            ResetPassword::create([
                'email' => $request->email,
                'code' => $code
            ]);
            Mail::to($request->email)->send(new SendResetPasswordCode($code));
            return $this->sendResponse([], 'successfuly.', []);

        } catch (Exception $e) {
            return $this->sendError([], $e->getMessage());
        }


    }
    public function checkCodeForEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
            'code' => 'required|string|exists:reset_passwords',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $code = ResetPassword::firstWhere('code', $request->code);
        if (Carbon::parse($code->created_at)->diffInHours(now()) > 1) {
            return $this->sendError([], 'The code has expired');

        }

        if ($code->email != $request->email) {
            return $this->sendError([], 'The code invalid');

        }
        //    $code->delete();
        //    $token = User::firstWhere('email',$request->email)->createToken('auth_token')->plainTextToken;
        return $this->sendResponse([], 'success', []);

    }
    public function reset_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:8|confirmed',
            'code' => 'required|string|exists:reset_passwords'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $code = ResetPassword::firstWhere('code', $request->code);

        if ($request->password != $request->password_confirmation) {
            return $this->sendError([], "passwords doesn't match");

        }
        if (Carbon::parse($code->created_at)->diffInHours(now()) > 1) {
            return $this->sendError([], 'The code has expired');

        }

        if ($code->email != $request->email) {
            return $this->sendError([], 'The code in invalid');

        }

        User::firstWhere('email', $request->email)->update(['password' => bcrypt($request->password)]);
        $code->delete();
        return $this->sendResponse([], 'done', []);

    }
    //email verification
    public function emailverifycode($email)
    {
        $oldCode = \App\Models\VerificationEmail::firstWhere('email', $email);
        if (isset($oldCode)) {
            $oldCode->delete();
        }
        $code = Str::random(6);
        try {
            \App\Models\VerificationEmail::create([
                'email' => $email,
                'code' => $code
            ]);
            Mail::to($email)->send(new Verificationemail($code));
            return $this->sendResponse($code, 'successfuly.', []);

        } catch (Exception $e) {
            return $this->sendError([], $e->getMessage());
        }
    }
    public function emailverifycodecheck(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
            'code' => 'required|string|exists:verification_emails',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $code = \App\Models\VerificationEmail::firstWhere('code', $request->code);

        if (Carbon::parse($code->created_at)->diffInHours(now()) > 1) {
            return $this->sendError([], 'The code has expired');

        }

        if ($code->email != $request->email) {
            return $this->sendError([], 'The code invalid');
        }
        $user = User::where('email', '=', $request->email)->first();
        $user->email_verified_at = Carbon::now()->toDateTimeString();
        $user->save();
        return $this->sendResponse([], 'success', []);

    }

    //change password
    public function change_password(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();
        if ($user == null) {
            return $this->sendError([], 'email invaled');
        } else {
            $input = $request->all();
            $check = Auth::guard('web')->attempt([
                'email' => $user->email,
                'password' => $input['old_password']
            ]);

            if ($check) {
                $validator = Validator::make($input, [
                    'new_password' => 'required|min:8'
                ]);
                if ($validator->fails()) {
                    return $this->sendError([], $validator->errors()->first());
                }
                $user->password = bcrypt($input['new_password']);

                $user->save();
                return $this->sendResponse([], 'Password changed successfully', []);
            } else {
                return $this->sendError([], 'Wrong password');
            }
        }
    }


}