<?php

namespace App\Http\Controllers\blade;

use App\Http\Controllers\Controller;
use App\Models\Imagesconfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Technology;
use App\Traits\ImageSaveTrait;
class TechnologyController extends Controller
{
    use ImageSaveTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $tech = new Technology();
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required|min:2|max:255',
            'image_icon' => 'nullable'
        ]);
      
        if ($validator->fails()) {
            return redirect()->back()->with('error',$validator->errors()->first());
        }
        $tech->name = $request->name;
       
        if (isset($request->image_icon)) {

            $tech->image_icon = $this->check_validation_and_save_croped_image($request, "technologies", "image_icon", "Technologies");

        }
       
        
        $tech->save();
        return redirect('/techs');

    }
    public function add(Request $request)
    {

        return view('technology.add');

    }
    public function edit($id)
    {
        $tech = Technology::where('id', '=', $id)->first();
        return view('technology.edit', compact('tech'));
    }
    public function update($id,Request $request){
        $tech = Technology::find($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'min:2|max:255',
            'image_icon' => 'nullable'

        ]);
      
        if ($validator->fails()) {
            return redirect()->back()->with('error',$validator->errors()->first());
        }
        $tech->name = $request->name;
        if($request->chechbox == "on"){
            $tech->image_icon =  null;
        }
        if (isset($request->image_icon)) {

            $tech->image_icon = $this->check_validation_and_save_croped_image($request, "technologies", "image_icon", "Technologies");

        }
  
        $tech->save(); 
       return redirect('/techs');
      }

    public function delete(Request $request, $id)
    {
        $tech = Technology::find($id);
        $tech->delete();
        return redirect('/techs')->with('success', 'This technology has deleted successfully');
    }

    public function all(Request $request)
    {
        $tech = Technology::all();
        return view('technology.all', compact('tech'));

    }
}
