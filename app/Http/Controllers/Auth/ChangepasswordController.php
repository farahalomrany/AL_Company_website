<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ChangepasswordController extends Controller
{
    public function password(Request $request)
    {
        return view('auth.changepassword.edit');
    }
    public function change_password(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();
        // dd($user);
        if ($user == null) {
            return redirect()->back()->with('error', 'email invaled');
        } else {
            $input = $request->all();
            //checking the old password first
            $check = Auth::guard('web')->attempt([
                'email' => $user->email,
                'password' => $input['old_password']
            ]);
            if ($check) {
                $validator = Validator::make($input, [
                    'new_password' => 'required|min:8'
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->with('error', $validator->errors()->first());
                }
                $user->password = bcrypt($input['new_password']);
                $user->save();
                return redirect('/admin')->with('success', 'Password changed successfully');
            } else {
                return redirect()->back()->with('error', 'Wrong password ');
            }

        }


    }
}