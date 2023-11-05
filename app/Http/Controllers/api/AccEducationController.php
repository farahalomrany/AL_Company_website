<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AccEducationResource;
use App\Models\AccEducation;
use App\Models\Account;
use App\Traits\ResponseTraits;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccEducationController extends Controller
{
    use ResponseTraits;

   
    public function add(Request $request)
    {
        $accedu = new AccEducation();
        $input = $request->all();
        $mytime = Carbon::now();
        $validator = Validator::make($input, [
            'degree_name' => 'required|regex:/^[\pL\s\-]+$/u|min:2|max:255',
            'date' => 'required|date|before:' . $mytime,
            'source' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError([], $validator->errors()->first());

        }
        $accedu->degree_name = $request->degree_name;
        $accedu->date = $request->date;
        $accedu->source = $request->source;
        $accedu->account_id = Account::where('user_id','=',$request->user()->id)->first()->id;
        $accedu->save();

        if (isset($accedu)) {
            $resource_data = new AccEducationResource($accedu);
            $data = [
                "accounts_education" => $resource_data
            ];
            return $this->sendResponse($data, 'add successfully', []);
        } else {
            return $this->sendError([], "error");
        }



    }
    public function edit(Request $request, $id)
    {
        $accedu = AccEducation::find($id);
        $input = $request->all();
        $mytime = Carbon::now();

        $validator = Validator::make($input, [
            'degree_name' => 'nullable|regex:/^[\pL\s\-]+$/u|min:2|max:255',
            'date' => 'nullable|date|before:' . $mytime,
            'source' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->sendError([], $validator->errors()->first());

        }
        if (isset($request->degree_name)) {

            $accedu->degree_name = $request->degree_name;
        }

        if (isset($request->date)) {

            $accedu->date = $request->date;
        }
        if (isset($request->source)) {

            $accedu->source = $request->source;
        }
        $accedu->save();

        if (isset($accedu)) {
            $resource_data = new AccEducationResource($accedu);
            $data = [
                "accounts_education" => $resource_data
            ];
            return $this->sendResponse($data, 'edit successfully', []);
        } else {
            return $this->sendError([], "error");
        }

    }
    public function delete(Request $request, $id)
    {
        $accedu = AccEducation::find($id);
        $accedu->delete();
        if (isset($accedu)) {
            return $this->sendResponse([], 'delete succesfully', []);
        } else {
            return $this->sendError([], "error");
        }

    }
}