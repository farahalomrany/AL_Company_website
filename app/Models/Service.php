<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Technology;
use App\Models\ServicesProject;
use App\Models\ServicesTechnology;
class Service extends Model
{
    use HasFactory;
    public function servicesprojects()
    {
        return $this->hasMany(ServicesProject::class,'service_id');
    }
    public function servicesproducts()
    {
        return $this->hasMany(ProductsService::class,'service_id');
    }
    public function servicestechs()
    {
        return $this->hasMany(ServicesTechnology::class,'service_id');
    }
    
}
