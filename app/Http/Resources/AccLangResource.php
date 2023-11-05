<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccLangResource extends JsonResource
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
            'name' => $this->name,
            'reading_level' => $this->reading_level,
            'writing_level' => $this->writing_level,
            'listening_level' => $this->listening_level,
            'speaking_level' => $this->speaking_level,
            'account_id' => $this->account_id,
        ];
    }
}