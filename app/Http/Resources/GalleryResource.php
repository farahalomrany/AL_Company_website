<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GalleryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    
    public function toArray($request)
    {    
        if($this->image_url){
               $image_url = env('APP_URL')."/storage/".$this->image_url; 
        }else{
            $image_url = -1;
        }
        return [
            'id' => $this->id,
            'image_url' => $image_url,
        ];
    }
}