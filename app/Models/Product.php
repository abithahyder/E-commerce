<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillables = [
        'title',
        'description',
        'product_image',
        'product_category',
        'quantity',
        'actual_prize',
        'seller_prize',
        'discount',
    ];

    public function productcategory()
    {
        return $this->belongsTo(ProductCategory::class,'product_category');
    }
}
