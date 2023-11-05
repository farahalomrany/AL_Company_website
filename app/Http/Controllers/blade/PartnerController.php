<?php

namespace App\Http\Controllers\blade;

use App\Http\Controllers\Controller;
use App\Models\Imagesconfig;
use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Traits\ImageSaveTrait;
class PartnerController extends Controller
{
    use ImageSaveTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $partn = new Partner();
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:2|max:255',
            'logo' => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $partn->name = $request->name;
        if (isset($request->logo)) {

            $partn->logo = $this->check_validation_and_save_croped_image($request, "partners", "logo", "Partners");

        }
       
        $partn->description = $request->description;

        $partn->save();
        return redirect('/partners');

    }
    public function add(Request $request)
    {

        return view('partner.add');

    }
    public function edit($id)
    {
        $partn = Partner::where('id', '=', $id)->first();
        return view('partner.edit', compact('partn'));
    }
    public function update($id, Request $request)
    {
        $partn = Partner::find($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'regex:/^[\pL\s\-]+$/u|min:2|max:255',
            'logo' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $partn->name = $request->name;
        if ($request->chechbox == "on") {
            $partn->logo = null;
        }
        if (isset($request->logo)) {

            $partn->logo = $this->check_validation_and_save_croped_image($request, "partners", "logo", "Partners");

        }

        $partn->description = $request->description;

        $partn->save();
        return redirect('/partners');
    }

    public function delete(Request $request, $id)
    {
        $partn = Partner::find($id);
        $partn->delete();
        return redirect('/partners')->with('success', 'This Partner has deleted successfully');
    }

    public function all(Request $request)
    {
        $partn = Partner::all();
        return view('partner.all', compact('partn'));

    }
}