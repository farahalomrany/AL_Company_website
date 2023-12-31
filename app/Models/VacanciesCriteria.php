<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vacancy;
class VacanciesCriteria extends Model
{
    use HasFactory;
    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }
}
