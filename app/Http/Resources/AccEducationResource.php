<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccEducationResource extends JsonResource
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
            'degree_name' => $this->degree_name,
            'date' => $this->date,
            'source' => $this->source,
            'account_id' => $this->account_id,
        ];
    }
}