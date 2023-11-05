<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VacAccResource;
use App\Models\Account;
use App\Models\VacanciesAccount;
use App\Traits\ResponseTraits;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VacAccController extends Controller
{
    use ResponseTraits;

    public function index(Request $request)
    {
        $accvac = VacanciesAccount::where($request->filters)->get();

        if (isset($accvac)) {
            $resource_data = VacAccResource::collection($accvac);
            $data = [
                "applications" => $resource_data
            ];
            return $this->sendResponse($data, 'completed successfully', []);
        } else {
            return $this->sendError([], "error");
        }

    }
    public function add(Request $request)
    {
        $accvac = new VacanciesAccount();
        $input = $request->all();
      
        $validator = Validator::make($input, [
            'vacancie_id' => 'required|exists:vacancies,id',
        ]);

        if ($validator->fails()) {
            return $this->sendError([], $validator->errors()->first());

        }
        $accvac->vacancie_id = $request->vacancie_id;
        $accvac->date = Carbon::now();
        $accvac->status = "new";

        $accvac->account_id = Account::where('user_id','=',$request->user()->id)->first()->id;

        $accvac->save();

        if (isset($accvac)) {
            $resource_data = new VacAccResource($accvac);
            $data = [
                "account vacancy" => $resource_data
            ];
            return $this->sendResponse($data, 'add successfully', []);
        } else {
            return $this->sendError([], "error");
        }



    }
    public function edit(Request $request, $id)
    {
        $accvac = VacanciesAccount::find($id);
        $input = $request->all();
        $validator = Validator::make($input, [
            'vacancie_id' => 'nullable|exists:vacancies,id',
            'status' => 'required|in:new,refuse,accepted,reviewed',

        ]);

        if ($validator->fails()) {
            return $this->sendError([], $validator->errors()->first());

        }
        if (isset($request->vacancie_id)) {

            $accvac->vacancie_id = $request->vacancie_id;
        }

        if (isset($request->status)) {

            $accvac->status = $request->status;
        }

        $accvac->save();

        if (isset($accvac)) {
            $resource_data = new VacAccResource($accvac);
            $data = [
                "account vacancy" => $resource_data
            ];
            return $this->sendResponse($data, 'edit successfully', []);
        } else {
            return $this->sendError([], "error");
        }

    }
    public function delete(Request $request, $id)
    {
        $accvac = VacanciesAccount::find($id);
        $accvac->delete();
        if (isset($accvac)) {
            return $this->sendResponse([], 'delete succesfully', []);
        } else {
            return $this->sendError([], "error");
        }

    }
}