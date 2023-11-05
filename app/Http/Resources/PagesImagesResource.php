<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PagesImagesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    
    public function toArray($request)
    {   
        if($this->image){
               $image = env('APP_URL')."/storage/".$this->image; 
        }else{
            $image = -1;
        }

        if($this->image_mobile){
            $image_mobile = env('APP_URL')."/storage/".$this->image_mobile; 
        }else{
            $image_mobile = -1;
        }
        return [
            'id' => $this->id,
            'image_name' => $this->image_name,
            'page_name' => $this->page_name,
            'image' => $image,
            'image_mobile' => $image_mobile,
        ];
    }
}