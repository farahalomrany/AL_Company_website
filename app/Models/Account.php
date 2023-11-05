<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vacancy;
class Account extends Model
{
    use HasFactory;
    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }
    public function accountseducations()
    {
        return $this->hasMany(AccEducation::class,'account_id');
    }
    public function accountsexperiences()
    {
        return $this->hasMany(AccExperience::class,'account_id');
    }
    public function accskills()
    {
        return $this->hasMany(AccSkill::class,'account_id');
    }
    public function acclanguage()
    {
        return $this->hasMany(AccLanguage::class,'account_id');
    }
    public function acccontact()
    {
        return $this->hasMany(AccContact::class,'account_id');
    }
    public function accproject()
    {
        return $this->hasMany(AccProject::class,'account_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function vacancyaccounts()
    {
        return $this->hasMany(VacanciesAccount::class,'account_id');
    }
}
