<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AccProjectResource;
use App\Models\Account;
use App\Models\AccProject;
use App\Traits\CheckTimeTraits;
use App\Traits\ResponseTraits;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccProjectController extends Controller
{
    use ResponseTraits;
    use CheckTimeTraits;
 
    public function add(Request $request)
    {
        $accproj = new AccProject();
        $input = $request->all();
        $mytime = Carbon::now();
       
        $validator = Validator::make($input, [
            'project_name' => 'required|regex:/^[\pL\s\-]+$/u|min:2|max:255',
            'description' => 'required',
            'date_from' => 'required|date|before:' . $mytime,
            'date_to' => 'required|date',
        ]);
        if (!$this->check_validate_time($request->date_from, $request->date_to)) {
            return 'to time must be greater than from or from must be greater than or equal to now date';
        }
        if ($validator->fails()) {
            return $this->sendError([], $validator->errors()->first());

        }
        $accproj->project_name = $request->project_name;
        $accproj->description = $request->description;
        $accproj->date_from = $request->date_from;
        $accproj->date_to = $request->date_to;

        $accproj->account_id = Account::where('user_id', '=', $request->user()->id)->first()->id;
        $accproj->save();

        if (isset($accproj)) {
            $resource_data = new AccProjectResource($accproj);
            $data = [
                "acc_projects" => $resource_data
            ];
            return $this->sendResponse($data, 'add successfully', []);
        } else {
            return $this->sendError([], "error");
        }



    }
    public function edit(Request $request, $id)
    {
        $accproj = AccProject::find($id);
        $input = $request->all();
        $mytime = Carbon::now();

        $validator = Validator::make($input, [
            'project_name' => 'nullable|regex:/^[\pL\s\-]+$/u|min:2|max:255',
            'description' => 'nullable',
            'date_from' => 'nullable|date|before:' . $mytime,
            'date_to' => 'nullable|date',
        ]);
      
        if ($validator->fails()) {
            return $this->sendError([], $validator->errors()->first());

        }
        if (isset($request->project_name)) {

            $accproj->project_name = $request->project_name;
        }
        if (isset($request->description)) {

            $accproj->description = $request->description;
        }
        if (isset($request->date_from) and !isset($request->date_to)) {
            if (!$this->check_validate_time($request->date_from, $accproj->date_to)) {
                return 'date from must be smaller than date to';
            }
            $accproj->date_from = $request->date_from;
        } elseif (!isset($request->date_from) and isset($request->date_to)) {
            if (!$this->check_validate_time($accproj->date_from, $request->date_to)) {
                return 'date to must be greater than date from';
            }
            $accproj->date_to = $request->date_to;
        } elseif (isset($request->date_from) and isset($request->date_to)) {
            if (!$this->check_validate_time($request->date_from, $request->date_to)) {
                return 'date to must be greater than date from';
            }
            $accproj->date_from = $request->date_from;
            $accproj->date_to = $request->date_to;
        }
        $accproj->save();

        if (isset($accproj)) {
            $resource_data = new AccProjectResource($accproj);
            $data = [
                "acc_projects" => $resource_data
            ];
            return $this->sendResponse($data, 'edit successfully', []);
        } else {
            return $this->sendError([], "error");
        }

    }
    public function delete(Request $request, $id)
    {
        $accproj = AccProject::find($id);
        $accproj->delete();
        if (isset($accproj)) {
            return $this->sendResponse([], 'delete succesfully', []);
        } else {
            return $this->sendError([], "error");
        }

    }
}