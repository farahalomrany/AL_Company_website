<?php

namespace App\Http\Resources;

use App\Models\Project;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    
    public function toArray($request)
    {      
        if($this->profile_photo){
               $profile_photo = env('APP_URL')."/storage/".$this->profile_photo; 
        }else{
            $profile_photo = -1;
        }
        $projectemp = $this->employeesProjects;
        $projects = [];
        foreach($projectemp as $pe){
            array_push($projects,Project::where('id','=',$pe->project_id)->first());
        }
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'pre_name' => $this->pre_name,
            'profile_photo' => $profile_photo,
            'job_title' => $this->job_title,
            'description' => $this->description,
            'projects' => ProjectResource::collection($projects),
        ];
    }
}