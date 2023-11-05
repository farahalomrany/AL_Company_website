<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PagesTextsResource extends JsonResource
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
            'text' => $this->text,
            'text_name' => $this->text_name,
            'page_name' => $this->page_name,

        ];
    }

}