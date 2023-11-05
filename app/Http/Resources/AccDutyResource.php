<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccDutyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    
    public function toArray($request){
        return [  
            'id' => $this->id,
            'duty_description' => $this->duty_description,
            'accounts_experiences_id' => $this->accounts_experiences_id,
        ];
    }
}