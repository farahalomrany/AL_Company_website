<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AccountResource;
use App\Models\Account;
use App\Traits\ResponseTraits;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Traits\ImageSaveTrait;

class AccountController extends Controller
{
    use ResponseTraits, ImageSaveTrait;
    public function index(Request $request)
    {
        $account = Account::where('user_id', '=', $request->user()->id)->first();
        // return $account;
        if (isset($account)) {
            $resource_data = new AccountResource($account);
            $data = [
                "accounts" => $resource_data
            ];
            return $this->sendResponse($data, 'completed successfully', []);
        } else {
            return $this->sendError([], "error you dont have account");
        }

    }
    public function add(Request $request)
    {
        $checkaccount = Account::where('user_id', '=', $request->user()->id)->first();
        if ($checkaccount) {
            return $this->sendError([], "you have an account");
        } else {
            $account = new Account();
            $input = $request->all();
            $mytime = Carbon::now();

            $validator = Validator::make($input, [
                'full_name' => 'required|regex:/^[\pL\s\-]+$/u|min:2|max:255',
                'date_of_birth' => 'date|before:' . $mytime,
                'gender' => 'in:male,female',
                'vacancy_id' => 'required|exists:vacancies,id',
                
            ]);

            if ($validator->fails()) {
                return $this->sendError([], $validator->errors()->first());

            }
            $account->full_name = $request->full_name;
            if (isset($request->personal_photo)) {

                $account->personal_photo = $this->check_validation_and_save_croped_image($request, "accounts", "personal_photo", "Accounts");

            }

            $account->date_of_birth = $request->date_of_birth;
            $account->gender = $request->gender;
            $account->address = $request->address;
            $account->vacancy_id = $request->vacancy_id;
            $account->user_id = $request->user()->id;
            if (isset($request->cv)) {
                $validator = Validator::make($request->all(), [
                    'cv' => 'required|mimes:doc,docx,pdf,txt,png,jpg,gif|max:10000'
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->with('error', $validator->errors()->first());
                }
                $file = $request->file("cv")->getClientOriginalName();
                $image_name = "aldr" . Str::random(25) . $file;
                $image = "cv/";
                $image_path = $image . $image_name;
                $account->cv = $image_path;
                $request->cv->move(public_path('storage/cv'), $image_name);
            }

            $account->save();

            if (isset($account)) {
                $resource_data = new AccountResource($account);
                $data = [
                    "accounts" => $resource_data
                ];
                return $this->sendResponse($data, 'add successfully', []);
            } else {
                return $this->sendError([], "error");
            }

        }

    }
    public function edit(Request $request, $id)
    {
        $account = Account::find($id);
        $input = $request->all();
        $mytime = Carbon::now();

        $validator = Validator::make($input, [
            'full_name' => 'nullable|regex:/^[\pL\s\-]+$/u|min:2|max:255',
            'date_of_birth' => 'nullable|date|before:' . $mytime,
            'gender' => 'nullable|in:male,female',
            'vacancy_id' => 'nullable|exists:vacancies,id',
        ]);

        if ($validator->fails()) {
            return $this->sendError([], $validator->errors()->first());

        }
        if (isset($request->full_name)) {

            $account->full_name = $request->full_name;
        }
        if (isset($request->personal_photo)) {

            $account->personal_photo = $this->check_validation_and_save_croped_image($request, "accounts", "personal_photo", "Accounts");

        }
        if (isset($request->date_of_birth)) {

            $account->date_of_birth = $request->date_of_birth;
        }
        if (isset($request->gender)) {

            $account->gender = $request->gender;
        }
        if (isset($request->address)) {

            $account->address = $request->address;
        }
        if (isset($request->vacancy_id)) {

            $account->vacancy_id = $request->vacancy_id;
        }

        if (isset($request->cv)) {
            $validator = Validator::make($request->all(), [
                'cv' => 'required|mimes:doc,docx,pdf,txt,png,jpg,gif|max:10000'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('error', $validator->errors()->first());
            }
            $file = $request->file("cv")->getClientOriginalName();
            $image_name = "aldr" . Str::random(25) . $file;
            $image = "cv/";
            $image_path = $image . $image_name;
            $account->cv = $image_path;
            $request->cv->move(public_path('storage/cv'), $image_name);
        }

        $account->save();

        if (isset($account)) {
            $resource_data = new AccountResource($account);
            $data = [
                "accounts" => $resource_data
            ];
            return $this->sendResponse($data, 'edit successfully', []);
        } else {
            return $this->sendError([], "error");
        }

    }

}