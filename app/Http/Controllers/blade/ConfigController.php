<?php

namespace App\Http\Controllers\blade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;
use Illuminate\Support\Facades\Validator;

class ConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $con = new Config();

        $input = $request->all();
        $validator = Validator::make($input, [
            'ckey' => 'required|regex:/^[\pL\s\-]+$/u|max:255|unique:configs'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $con->ckey = $request->ckey;
        $con->type = $request->type;
        if ($request->type == "text") {
            $validator = Validator::make($input, [
                'text' => 'required'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('error', $validator->errors()->first());
            }
            $con->value = $request->text;

        } elseif ($request->type == "integer") {
            $validator = Validator::make($input, [
                'integer' => 'required'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('error', $validator->errors()->first());
            }
            $con->value = $request->integer;

        } elseif ($request->type == "float") {
            $validator = Validator::make($input, [
                'float' => 'required'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('error', $validator->errors()->first());
            }
            $con->value = $request->float;

        } elseif ($request->type == "boolean") {
           
            $con->value = $request->boolean;
        }
        $con->save();
        return redirect()->to('/configs');
    }
    public function add(Request $request)
    {

        return view('config.add');

    }
    public function edit($id)
    {
        $con = Config::where('id', '=', $id)->first();
        return view('config.edit', compact('con'));
    }
    public function update($id, Request $request)
    {
        $con = Config::find($id);
        $input = $request->all();
        $validator = Validator::make($input, [
            'ckey' => 'regex:/^[\pL\s\-]+$/u|max:255|unique:configs,ckey,' . $id
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        // $con->ckey = $request->ckey;
        $con->type = $request->type;
        if ($request->type == "text") {
            $con->value = $request->text;

        } elseif ($request->type == "integer") {
            $con->value = $request->integer;

        } elseif ($request->type == "float") {
            $con->value = $request->float;

        } elseif ($request->type == "boolean") {
            $con->value = $request->boolean;

        }
        $con->save();
        return redirect('/configs');
    }

    public function delete(Request $request, $id)
    {
        $con = Config::find($id);
        $con->delete();
        return redirect('/configs');
    }

    public function all(Request $request)
    {
        $con = Config::all();
        return view('config.all', compact('con'));

    }
}