<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\Technology;
class ServicesTechnology extends Model
{
    use HasFactory;
    public function technology()
    {
        return $this->belongsTo(Technology::class,'technology_id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class,'service_id');
    }
}
