<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Account;
use App\Models\AccDuty;
class AccExperience extends Model
{
    use HasFactory;
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
   
   
    public function appduty()
    {
        return $this->hasMany(AccDuty::class,'accounts_experiences_id');
    }
   
   
}
