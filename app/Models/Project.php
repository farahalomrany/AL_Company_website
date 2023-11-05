<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ServicesProject;
use App\Models\EmployeesProject;
use App\Models\ProjectsGallery;
use App\Models\CaseStudy;
class Project extends Model
{
    use HasFactory;
    public function servicesprojects()
    {
        return $this->hasMany(ServicesProject::class , 'project_id');
    }
    public function employeesprojects()
    {
        return $this->hasMany(EmployeesProject::class , 'project_id');
    }
    public function projectsgalleries()
    {
        return $this->hasMany(ProjectsGallery::class ,'project_id');
    }
    public function casestudy()
    {
        return $this->hasOne(CaseStudy::class,'project_id');
    }
}
