<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccContactResource extends JsonResource
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
            'contact_type' => $this->contact_type,
            'contact_value' => $this->contact_value,
            'account_id' => $this->account_id,
        ];
    }
}