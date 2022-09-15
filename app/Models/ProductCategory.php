<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $fillables = [
        'Product_category_name',
        'cid'
    ];

    public function product(){
        return $this->hasMany(Product::class);
    }
}