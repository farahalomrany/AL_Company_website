<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ServicesTechnology;
class Technology extends Model
{
    use HasFactory;
    public function ServicesTechnology()
    {
        return $this->hasMany(ServicesTechnology::class);
    }
}

