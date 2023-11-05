<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Service;
class ProductsService extends Model
{
    use HasFactory;
    public function product()
    {
        return $this->belongsTo(Product::class , 'product_id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class , 'service_id');
    }
}
