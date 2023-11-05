<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AccDutyResource;
use App\Models\AccDuty;
use App\Traits\ResponseTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccDutyController extends Controller
{
    use ResponseTraits;

  
    public function add(Request $request)
    {
        $accdut = new AccDuty();
        $input = $request->all();
        $validator = Validator::make($input, [
            'duty_description' => 'required',
            'accounts_experiences_id' => 'required|exists:accounts_experiences,id',

        ]);

        if ($validator->fails()) {
            return $this->sendError([], $validator->errors()->first());

        }
        $accdut->duty_description = $request->duty_description;
        $accdut->accounts_experiences_id = $request->accounts_experiences_id;
        $accdut->save();

        if (isset($accdut)) {
            $resource_data = new AccDutyResource($accdut);
            $data = [
                "acc_exp_duties" => $resource_data
            ];
            return $this->sendResponse($data, 'add successfully', []);
        } else {
            return $this->sendError([], "error");
        }



    }
    public function edit(Request $request, $id)
    {
        $accdut = AccDuty::find($id);
        $input = $request->all();
        $validator = Validator::make($input, [
            'duty_description' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError([], $validator->errors()->first());

        }
        if (isset($request->duty_description)) {

            $accdut->duty_description = $request->duty_description;
        }
        if (isset($request->accounts_experiences_id)) {

            $accdut->accounts_experiences_id = $request->accounts_experiences_id;
        }
        
       
        $accdut->save();

        if (isset($accdut)) {
            $resource_data = new AccDutyResource($accdut);
            $data = [
                "acc_exp_duties" => $resource_data
            ];
            return $this->sendResponse($data, 'edit successfully', []);
        } else {
            return $this->sendError([], "error");
        }

    }
    public function delete(Request $request, $id)
    {
        $accdut = AccDuty::find($id);
        $accdut->delete();
        if (isset($accdut)) {
            return $this->sendResponse([], 'delete succesfully', []);
        } else {
            return $this->sendError([], "error");
        }

    }
}