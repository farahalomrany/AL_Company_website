<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AskForServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    
    public function toArray($request)
    {   

        return [
            'id' => $this->id,
            'email' => $this->email,
            'full_name' => $this->full_name,
            'service_description' => $this->service_description,
            'phone' => $this->phone,
            'budget' => $this->budget,

        ];
    }

}