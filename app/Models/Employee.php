<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\EmployeesProject;
class Employee extends Model
{
    use HasFactory;
    public function employeesProjects()
    {
        return $this->hasMany(EmployeesProject::class, 'employee_id');
    }
}
