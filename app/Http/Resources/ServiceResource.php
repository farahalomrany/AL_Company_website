<?php

namespace App\Http\Resources;

use App\Models\Product;
use App\Models\ProductsService;
use App\Models\Project;
use App\Models\ServicesProject;
use App\Models\Technology;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    
    public function toArray($request)
    {   
        if($this->image_icon){
               $image_icon = env('APP_URL')."/storage/".$this->image_icon; 
        }else{
            $image_icon = -1;
        }
        $servtech = $this->servicestechs;
        $technologies = [];
        foreach($servtech as $t){
            array_push($technologies,Technology::where('id','=',$t->technology_id)->first());
        }
        $servprojects = ServicesProject::where('service_id','=',$this->id)->get();
        $projects = [];
        foreach($servprojects as $sp){
            array_push($projects,Project::where('id','=',$sp->project_id)->first());
        }

        $servproducts = ProductsService::where('service_id','=',$this->id)->get();

        $products = [];
        foreach($servproducts as $sp){
            array_push($products,Product::where('id','=',$sp->product_id)->first());
        }
        return [
            'id' => $this->id,
            'title' => $this->title,
            'image_icon' => $image_icon,
            'description' => $this->description,
            'technologies' =>  TechnologyResource::collection($technologies),
            'projects' =>  Project2Resource::collection($projects),
            'products' =>  Product2Resource::collection($products),

        ];
    }
}