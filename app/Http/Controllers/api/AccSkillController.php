<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AccSkillResource;
use App\Models\Account;
use App\Models\AccSkill;
use App\Traits\ResponseTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccSkillController extends Controller
{
    use ResponseTraits;

  
    public function add(Request $request)
    {
        $accsk = new AccSkill();
        $input = $request->all();
       
        $validator = Validator::make($input, [
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:2|max:255',
            'level' => 'required|in:1,2,3,4,5',
        ]);

        if ($validator->fails()) {
            return $this->sendError([], $validator->errors()->first());

        }
        $accsk->name = $request->name;
        $accsk->level = $request->level;
        $accsk->account_id = Account::where('user_id','=',$request->user()->id)->first()->id;
        $accsk->save();

        if (isset($accsk)) {
            $resource_data = new AccSkillResource($accsk);
            $data = [
                "acc_skills" => $resource_data
            ];
            return $this->sendResponse($data, 'add successfully', []);
        } else {
            return $this->sendError([], "error");
        }



    }
    public function edit(Request $request, $id)
    {
        $accsk = AccSkill::find($id);
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:2|max:255',
            'level' => 'required|in:1,2,3,4,5',
        ]);

        if ($validator->fails()) {
            return $this->sendError([], $validator->errors()->first());

        }
        if (isset($request->name)) {

            $accsk->name = $request->name;
        }

        if (isset($request->level)) {

            $accsk->level = $request->level;
        }
        $accsk->save();

        if (isset($accsk)) {
            $resource_data = new AccSkillResource($accsk);
            $data = [
                "acc_skills" => $resource_data
            ];
            return $this->sendResponse($data, 'edit successfully', []);
        } else {
            return $this->sendError([], "error");
        }

    }
    public function delete(Request $request, $id)
    {
        $accsk = AccSkill::find($id);
        $accsk->delete();
        if (isset($accsk)) {
            return $this->sendResponse([], 'delete succesfully', []);
        } else {
            return $this->sendError([], "error");
        }

    }
}