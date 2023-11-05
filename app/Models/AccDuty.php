<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class AccDuty extends Model
{
    use HasFactory;
    public function accountsexperience()
    {
        return $this->belongsTo(AccExperience::class);
    }
}
