<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CaseattResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function toArray($request)
    {
        if ($this->file_url) {
            $file_url = env('APP_URL') . "/storage/" . $this->file_url;
        } else {
            $file_url = -1;
        }
        return [
            'id' => $this->id,
            'file_name' => $this->file_name,
            'file_description' => $this->file_description,
            'file_url' => $file_url,
        ];
    }
}