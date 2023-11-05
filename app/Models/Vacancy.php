<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Vacancy extends Model
{
    use HasFactory;
    public function vacanciescritera()
    {
        return $this->hasMany(VacanciesCriteria::class,'vacancy_id');
    }
    public function vacancyaccounts()
    {
        return $this->hasMany(VacanciesAccount::class,'vacancy_id');
    }
}
