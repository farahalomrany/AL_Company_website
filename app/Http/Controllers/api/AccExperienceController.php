<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AccExperienceResource;
use App\Models\AccExperience;
use App\Models\Account;
use App\Traits\CheckTimeTraits;
use App\Traits\ResponseTraits;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccExperienceController extends Controller
{
    use ResponseTraits;
    use CheckTimeTraits;
  
    public function add(Request $request)
    {
        $accexp = new AccExperience();
        $input = $request->all();
        $mytime = Carbon::now();
        $validator = Validator::make($input, [
            'job_title' => 'required|regex:/^[\pL\s\-]+$/u|min:2|max:255',
            'company_name' => 'required',
            'date_from' => 'required|date|before:' . $mytime,
            'date_to' => 'required|date',
        ]);
        if (!$this->check_validate_time($request->date_from, $request->date_to)) {
            return 'to time must be greater than from or from must be greater than or equal to now date';
        }
        if ($validator->fails()) {
            return $this->sendError([], $validator->errors()->first());

        }
        $accexp->job_title = $request->job_title;
        $accexp->company_name = $request->company_name;
        $accexp->date_from = $request->date_from;
        $accexp->date_to = $request->date_to;

        $accexp->account_id = Account::where('user_id', '=', $request->user()->id)->first()->id;
        $accexp->save();

        if (isset($accexp)) {
            $resource_data = new AccExperienceResource($accexp);
            $data = [
                "account education" => $resource_data
            ];
            return $this->sendResponse($data, 'add successfully', []);
        } else {
            return $this->sendError([], "error");
        }



    }
    public function edit(Request $request, $id)
    {
        $accexp = AccExperience::find($id);
        $input = $request->all();
        $mytime = Carbon::now();

        $validator = Validator::make($input, [
            'job_title' => 'nullable|regex:/^[\pL\s\-]+$/u|min:2|max:255',
            'company_name' => 'nullable',
            'date_from' => 'nullable|date|before:' . $mytime,
            'date_to' => 'nullable|date',
        ]);
      
        if ($validator->fails()) {
            return $this->sendError([], $validator->errors()->first());

        }
        if (isset($request->job_title)) {

            $accexp->job_title = $request->job_title;
        }
        if (isset($request->company_name)) {

            $accexp->company_name = $request->company_name;
        }
        if (isset($request->date_from) and !isset($request->date_to)) {
            if (!$this->check_validate_time($request->date_from, $accexp->date_to)) {
                return 'date from must be smaller than date to';
            }
            $accexp->date_from = $request->date_from;
        } elseif (!isset($request->date_from) and isset($request->date_to)) {
            if (!$this->check_validate_time($accexp->date_from, $request->date_to)) {
                return 'date to must be greater than date from';
            }
            $accexp->date_to = $request->date_to;
        } elseif (isset($request->date_from) and isset($request->date_to)) {
            if (!$this->check_validate_time($request->date_from, $request->date_to)) {
                return 'date to must be greater than date from';
            }
            $accexp->date_from = $request->date_from;
            $accexp->date_to = $request->date_to;
        }


        $accexp->save();

        if (isset($accexp)) {
            $resource_data = new AccExperienceResource($accexp);
            $data = [
                "account education" => $resource_data
            ];
            return $this->sendResponse($data, 'edit successfully', []);
        } else {
            return $this->sendError([], "error");
        }

    }
    public function delete(Request $request, $id)
    {
        $accexp = AccExperience::find($id);
        $accexp->delete();
        if (isset($accexp)) {
            return $this->sendResponse([], 'delete succesfully', []);
        } else {
            return $this->sendError([], "error");
        }

    }
}