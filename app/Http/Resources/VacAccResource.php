<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VacAccResource extends JsonResource
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
            'date' => $this->date,
            'status' => $this->status,
            'vacancie_id' => $this->vacancie_id,
            'account_id' => $this->account_id,
        ];
    }
}