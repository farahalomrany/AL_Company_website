<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function toArray($request)
    {
        if ($this->personal_photo) {
            $personal_photo = env('APP_URL') . "/storage/" . $this->personal_photo;
        } else {
            $personal_photo = -1;
        }
        if ($this->cv) {
            $cv = env('APP_URL') . "/storage/" . $this->cv;
        } else {
            $cv = -1;
        }
        if (count($this->accountseducations) > 0) {
            $edu = AccEducationResource::collection($this->accountseducations);
        } else {
            $edu = -1;
        }
        // return $this->accountseducations;
        if (count($this->accountsexperiences) > 0) {
            $exp = AccExperienceResource::collection($this->accountsexperiences);
        } else {
            $exp = -1;
        }
        if (count($this->accskills) > 0) {
            $skill = AccSkillResource::collection($this->accskills);
        } else {
            $skill = -1;
        }
        if (count($this->acclanguage) > 0) {
            $lang = AccLangResource::collection($this->acclanguage);
        } else {
            $lang = -1;
        }
        if (count($this->acccontact) > 0) {
            $cont = AccContactResource::collection($this->acccontact);
        } else {
            $cont = -1;
        }
        if (count($this->accproject) > 0) {
            $proj = AccProjectResource::collection($this->accproject);
        } else {
            $proj = -1;
        }

        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'personal_photo' => $personal_photo,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'address' => $this->address,
            'vacancie_id' => $this->vacancie_id,
            'user_id' => $this->user_id,
            'cv' => $cv,
            'education' => $edu,
            'experience' => $exp,
            'skill' => $skill,
            'language' => $lang,
            'contact' => $cont,
            'project' => $proj,
        ];
    }
}