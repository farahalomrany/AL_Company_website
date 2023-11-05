<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            $logo = -1;
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'logo' => $logo,
        ];
    }
}