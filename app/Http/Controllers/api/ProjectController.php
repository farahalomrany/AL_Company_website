<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Service2Resource;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Traits\ResponseTraits;
class ProjectController extends Controller
{
    use ResponseTraits;

    public function index(Request $request)
    {
        $project = Project::where($request->filters)->get();


        if (isset($project)) {
            $resource_data = ProjectResource::collection($project);
            $data = [
                "projects" => $resource_data
            ];
            return $this->sendResponse($data, 'completed successfully',[]);
        } 
        else {
            return $this->sendError([],"error");
        }
        
    }
    public function project_tech($id)
    {
        $project = Project::find($id);

        if (isset($project)) {
            $serviceproj = $project->servicesprojects;

            $services = [];
            foreach($serviceproj as $sp){
                array_push($services,Service::where('id','=',$sp->service_id)->first());
            }
           
            $resource_data = Service2Resource::collection($services);
            $data = [
                "project services" => $resource_data
            ];
            return $this->sendResponse($data, 'completed successfully',[]);
        } 
        else {
            return $this->sendError([],"error");
        }
        
    }
}
