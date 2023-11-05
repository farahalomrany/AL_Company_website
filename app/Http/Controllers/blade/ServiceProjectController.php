<?php

namespace App\Http\Controllers\blade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServicesProject;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;
use App\Models\Service;
class ServiceProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $projectservice = new ServicesProject();
        $input = $request->all();
        $validator = Validator::make($input, [
            'service_id' => 'exists:services,id',
            'project_id' => 'exists:projects,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $projectservice->service_id = $request->service_id;
        $projectservice->project_id = $request->project_id;

        $projectservice->save();
        return redirect()->route('all_serviceproject', $request->project_id)->with('success', 'This ServicesProject has created successfully');

    }
    public function add(Request $request, $project_id)
    {      
        $serprojs = Project::find($project_id)->servicesprojects;
        $ids = [];
        foreach($serprojs as $s){
                array_push($ids, $s->service_id);
        }
       
        $services = Service::whereNotIn('id',$ids)->get();
              
        return view('serviceproject.add', compact('services', 'project_id'));

    }
    public function edit($id)
    {
        $services = Service::all();
        $projserv = ServicesProject::where('id', '=', $id)->first();
        return view('serviceproject.edit', compact('projserv', 'services'));
    }
    public function update($id, Request $request)
    {
        $projectservice = ServicesProject::find($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'service_id' => 'exists:services,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $projectservice->service_id = $request->service_id;

        $projectservice->save();
        return redirect()->route('all_serviceproject', $projectservice->project_id);
    }

    public function delete(Request $request, $id)
    {
        $projectservice = ServicesProject::find($id);
        $projid = $projectservice->project_id;
        $projectservice->delete();
        return redirect()->route('all_serviceproject', $projid)->with('success', 'This Service has deleted successfully');
    }
    public function all_servie_for_project(Request $request, $id)
    {
        $project = Project::find($id);
        $projserv = ServicesProject::where('project_id', '=', $id)->get();
        return view('serviceproject.all', compact('projserv', 'project'));

    }
    
}
