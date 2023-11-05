<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TechnologyResource extends JsonResource
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
            $image_icon =-1;
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image_icon' => $image_icon,
        ];
    }
}