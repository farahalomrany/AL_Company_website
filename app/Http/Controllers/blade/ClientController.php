<?php

namespace App\Http\Controllers\blade;

use App\Http\Controllers\Controller;
use App\Models\Imagesconfig;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Traits\ImageSaveTrait;
class ClientController extends Controller
{
    use ImageSaveTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $clien = new Client();
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:2|max:255',
            'logo' => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $clien->name = $request->name;

        if (isset($request->logo)) {

            $clien->logo = $this->check_validation_and_save_croped_image($request, "clients", "logo", "Clients");

        }

        $clien->save();
        return redirect('/clients');

    }
    public function add(Request $request)
    {

        return view('client.add');

    }
    public function edit($id)
    {
        $clien = Client::where('id', '=', $id)->first();
        return view('client.edit', compact('clien'));
    }
    public function update($id, Request $request)
    {
        $clien = Client::find($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'regex:/^[\pL\s\-]+$/u|min:2|max:255',
            'logo' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $clien->name = $request->name;
        if ($request->chechbox == "on") {
            $clien->logo = null;
        }
        if (isset($request->logo)) {

            $clien->logo = $this->check_validation_and_save_croped_image($request, "clients", "logo", "Clients");

        }
        $clien->save();
        return redirect('/clients');
    }

    public function delete(Request $request, $id)
    {
        $clien = Client::find($id);
        $clien->delete();
        return redirect('/clients')->with('success', 'This client has deleted successfully');
    }

    public function all(Request $request)
    {
        $clien = Client::all();
        return view('client.all', compact('clien'));

    }
}