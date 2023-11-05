<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CaseStudyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    
    public function toArray($request)
    {  
        $attachments = $this->casestudiesAttachments;
        $charts = $this->casestudiesCharts;
        return [
            'id' => $this->id,
            'analysis_phase' => $this->analysis_phase,
            'design_phase' => $this->design_phase,
            'development_phase' => $this->development_phase,
            'test_phase' => $this->test_phase,
            'attachments' => CaseattResource::collection($attachments),
            'charts' => CasechartResource::collection($charts),
        ];
    }
}