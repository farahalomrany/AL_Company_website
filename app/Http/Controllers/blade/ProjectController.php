<?php

namespace App\Http\Controllers\blade;

use App\Http\Controllers\Controller;
use App\Models\Imagesconfig;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ImageSaveTrait;;
use App\Models\Project;
class ProjectController extends Controller
{
    use ImageSaveTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $proj = new Project();
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required|min:2|max:255',
            'domain' => 'required|min:2',
            'description' => 'nullable',
            'imp_year' => 'nullable',
        ]);
      
        if ($validator->fails()) {
            return redirect()->back()->with('error',$validator->errors()->first());
        }
        $proj->name = $request->name;
        $proj->domain = $request->domain;
        if (isset($request->image)) {

            $proj->image = $this->check_validation_and_save_croped_image($request, "projects", "image", "Projects");

        }
    
        $proj->description = $request->description;
        $proj->imp_year = $request->imp_year;

        $proj->save();
        return redirect('/projects');

    }
    public function add(Request $request)
    {
        $years = range(Carbon::now()->year, 2010);
        return view('project.add',compact('years'));

    }
    public function edit($id)
    {
        $proj = Project::where('id', '=', $id)->first();
        $years = range(Carbon::now()->year, 2010);
        return view('project.edit', compact('proj','years'));
    }
    public function update($id,Request $request){
        $proj = Project::find($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'min:2|max:255',
            'domain' => 'min:2',
            'description' => 'nullable',
            'imp_year' => 'nullable',
        ]);
      
        if ($validator->fails()) {
            return redirect()->back()->with('error',$validator->errors()->first());
        }
        $proj->name = $request->name;
        $proj->domain = $request->domain;
        if($request->chechbox == "on"){
            $proj->image =  null;
        }
        if (isset($request->image)) {

            $proj->image = $this->check_validation_and_save_croped_image($request, "projects", "image", "Projects");

        }
    //    return $request->description;
        $proj->description = $request->description;
        $proj->imp_year = $request->imp_year;

        $proj->save(); 
       return redirect('/projects');
      }

    public function delete(Request $request, $id)
    {
        $proj = Project::find($id);
        $proj->delete();
        return redirect('/projects')->with('success', 'This Project has deleted successfully');
    }

    public function all(Request $request)
    {
        $proj = Project::all();
        return view('project.all', compact('proj'));

    }
}
