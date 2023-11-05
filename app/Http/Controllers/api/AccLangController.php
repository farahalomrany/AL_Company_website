<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AccLangResource;
use App\Models\AccLanguage;
use App\Models\Account;
use App\Traits\ResponseTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccLangController extends Controller
{
    use ResponseTraits;

    
    public function add(Request $request)
    {
        $acclang = new AccLanguage();
        $input = $request->all();
       
        $validator = Validator::make($input, [
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:2|max:255',
            'reading_level' => 'required|in:beginner,intermediate,advanced',
            'writing_level' => 'required|in:beginner,intermediate,advanced',
            'listening_level' => 'required|in:beginner,intermediate,advanced',
            'speaking_level' => 'required|in:beginner,intermediate,advanced',
        ]);

        if ($validator->fails()) {
            return $this->sendError([], $validator->errors()->first());

        }
        $acclang->name = $request->name;
        $acclang->reading_level = $request->reading_level;
        $acclang->writing_level = $request->writing_level;
        $acclang->listening_level = $request->listening_level;
        $acclang->speaking_level = $request->speaking_level;

        $acclang->account_id = Account::where('user_id','=',$request->user()->id)->first()->id;
        $acclang->save();

        if (isset($acclang)) {
            $resource_data = new AccLangResource($acclang);
            $data = [
                "acc_languages" => $resource_data
            ];
            return $this->sendResponse($data, 'add successfully', []);
        } else {
            return $this->sendError([], "error");
        }



    }
    public function edit(Request $request, $id)
    {
        $acclang = AccLanguage::find($id);
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'nullable|regex:/^[\pL\s\-]+$/u|min:2|max:255',
            'reading_level' => 'nullable|in:beginner,intermediate,advanced',
            'writing_level' => 'nullable|in:beginner,intermediate,advanced',
            'listening_level' => 'nullable|in:beginner,intermediate,advanced',
            'speaking_level' => 'nullable|in:beginner,intermediate,advanced',
        ]);

        if ($validator->fails()) {
            return $this->sendError([], $validator->errors()->first());

        }
        if (isset($request->name)) {

            $acclang->name = $request->name;
        }

        if (isset($request->reading_level)) {

            $acclang->reading_level = $request->reading_level;
        }
        if (isset($request->writing_level)) {

            $acclang->writing_level = $request->writing_level;
        }
        if (isset($request->listening_level)) {

            $acclang->listening_level = $request->listening_level;
        }
        if (isset($request->speaking_level)) {

            $acclang->speaking_level = $request->speaking_level;
        }
        $acclang->save();

        if (isset($acclang)) {
            $resource_data = new AccLangResource($acclang);
            $data = [
                "acc_languages" => $resource_data
            ];
            return $this->sendResponse($data, 'edit successfully', []);
        } else {
            return $this->sendError([], "error");
        }

    }
    public function delete(Request $request, $id)
    {
        $acclang = AccLanguage::find($id);
        $acclang->delete();
        if (isset($acclang)) {
            return $this->sendResponse([], 'delete succesfully', []);
        } else {
            return $this->sendError([], "error");
        }

    }
}