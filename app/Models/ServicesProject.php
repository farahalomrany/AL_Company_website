<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Service;
class ServicesProject extends Model
{
    use HasFactory;
    public function project()
    {
        return $this->belongsTo(Project::class , 'project_id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class , 'service_id');
    }

}
