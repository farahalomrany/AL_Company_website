<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PartnerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    
    public function toArray($request)
    {  
        if($this->logo){
               $logo = env('APP_URL')."/storage/".$this->logo; 
        }else{
            $logo = $this->logo;
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'logo' => $logo,
            'description' => $this->description,

        ];
    }
}