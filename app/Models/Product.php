<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductsGallery;
use App\Models\ProductsService;
class Product extends Model
{
    use HasFactory;
    public function servicesproducts()
    {
        return $this->hasMany(ProductsService::class , 'product_id');
    }
    public function productsgalleries()
    {
        return $this->hasMany(ProductsGallery::class);
    }
}
