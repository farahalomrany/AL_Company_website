<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vacancy;
use App\Models\Account;
class VacanciesAccount extends Model
{
    use HasFactory;
    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class,'vacancy_id');
    }
    public function account()
    {
        return $this->belongsTo(Account::class,'account_id');
    }
}
