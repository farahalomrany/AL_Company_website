<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AccContactResource;
use App\Models\AccContact;
use App\Models\Account;
use App\Traits\ResponseTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccContactController extends Controller
{
    use ResponseTraits;


    public function add(Request $request)
    {
        $accsk = new AccContact();
        $input = $request->all();
       
        $validator = Validator::make($input, [
            'contact_type' => 'required|in:email,phone,mobile,facebook,instagram',
            'contact_value' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError([], $validator->errors()->first());
        }
        $accsk->contact_type = $request->contact_type;
        $accsk->contact_value = $request->contact_value;
        $accsk->account_id = Account::where('user_id','=',$request->user()->id)->first()->id;
        $accsk->save();

        if (isset($accsk)) {
            $resource_data = new AccContactResource($accsk);
            $data = [
                "acc_contacts" => $resource_data
            ];
            return $this->sendResponse($data, 'add successfully', []);
        } else {
            return $this->sendError([], "error");
        }



    }
    public function edit(Request $request, $id)
    {
        $accsk = AccContact::find($id);
        $input = $request->all();
        $validator = Validator::make($input, [
            'contact_type' => 'nullable|in:email,phone,mobile,facebook,instagram',
            'contact_value' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->sendError([], $validator->errors()->first());

        }
        if (isset($request->contact_type)) {

            $accsk->contact_type = $request->contact_type;
        }

        if (isset($request->contact_value)) {

            $accsk->contact_value = $request->contact_value;
        }
        $accsk->save();

        if (isset($accsk)) {
            $resource_data = new AccContactResource($accsk);
            $data = [
                "acc_contacts" => $resource_data
            ];
            return $this->sendResponse($data, 'edit successfully', []);
        } else {
            return $this->sendError([], "error");
        }

    }
    public function delete(Request $request, $id)
    {
        $accsk = AccContact::find($id);
        $accsk->delete();
        if (isset($accsk)) {
            return $this->sendResponse([], 'delete succesfully', []);
        } else {
            return $this->sendError([], "error");
        }

    }
}