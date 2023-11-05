<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CaseStudiesAttachment;
use App\Models\CaseStudiesChart;
class CaseStudy extends Model
{
    use HasFactory;
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function casestudiesAttachments()
    {
        return $this->hasMany(CaseStudiesAttachment::class);
    }
    public function casestudiesCharts()
    {
        return $this->hasMany(CaseStudiesChart::class);
    }

}
