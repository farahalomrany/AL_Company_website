<?php

namespace App\Http\Resources;

use App\Models\Service;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CaseStudyResource;
use App\Http\Resources\GalleryResource;
class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function toArray($request)
    {

        if ($this->image) {
            $image = env('APP_URL') . "/storage/" . $this->image;
        } else {
            $image = -1;
        }
        $gallery = $this->projectsgalleries;
        $casestudy = -1;
        if ($this->casestudy != null) {
            $casestudy = new CaseStudyResource($this->casestudy);
        } 
        $serviceproj = $this->servicesprojects;

        $services = [];
        foreach($serviceproj as $sp){
            array_push($services,Service::where('id','=',$sp->service_id)->first());
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $image,
            'domain' => $this->domain,
            'description' => $this->description,
            'imp_year' => $this->imp_year,
            'gallery' => GalleryResource::collection($gallery),
            'casestudy' => $casestudy,
            'services' => Service2Resource::collection($services),
        ];
    }
}