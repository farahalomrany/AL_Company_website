<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CasechartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function toArray($request)
    {
        if ($this->chart_image_url) {
            $chart_image_url = env('APP_URL') . "/storage/" . $this->chart_image_url;
        } else {
            $chart_image_url = -1;
        }
        return [
            'id' => $this->id,
            'chart_title' => $this->chart_title,
            'chart_description' => $this->chart_description,
            'chart_image_url' => $chart_image_url,
        ];
    }
}