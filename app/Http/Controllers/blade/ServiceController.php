<?php

namespace App\Http\Controllers\blade;

use App\Http\Controllers\Controller;
use App\Models\Imagesconfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ImageSaveTrait;
use App\Models\Service;

class ServiceController extends Controller
{
    use ImageSaveTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $serv = new Service();
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required|min:2|max:255',
            'description' => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $serv->title = $request->title;

        if (isset($request->image_icon)) {

            $serv->image_icon = $this->check_validation_and_save_croped_image($request, "services", "image_icon", "Services");

        }


        $serv->description = $request->description;

        $serv->save();
        return redirect('/services');

    }
    public function add(Request $request)
    {

        return view('service.add');

    }
    public function edit($id)
    {
        $serv = Service::where('id', '=', $id)->first();
        return view('service.edit', compact('serv'));
    }
    public function update($id, Request $request)
    {
        $serv = Service::find($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'min:2|max:255',
            'description' => 'nullable'

        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $serv->title = $request->title;
        if ($request->chechbox == "on") {
            $serv->image_icon = null;
        }
        if (isset($request->image_icon)) {

            $serv->image_icon = $this->check_validation_and_save_croped_image($request, "services", "image_icon", "Services");

        }
        $serv->description = $request->description;
        $serv->save();
        return redirect('/services');
    }

    public function delete(Request $request, $id)
    {
        $serv = Service::find($id);
        $serv->delete();
        return redirect('/services')->with('success', 'This Service has deleted successfully');
    }

    public function all(Request $request)
    {
        $serv = Service::all();
        return view('service.all', compact('serv'));

    }
}