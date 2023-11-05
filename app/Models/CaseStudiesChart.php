<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CaseStudy;

class CaseStudiesChart extends Model
{
    use HasFactory;
    public function casestudy()
    {
        return $this->belongsTo(CaseStudy::class,'case_study_id');
    }
}