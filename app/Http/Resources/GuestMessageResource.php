<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GuestMessageResource extends JsonResource
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
            'message_body' => $this->message_body,
            'phone' => $this->phone,
            'status' => $this->status,

        ];
    }

}