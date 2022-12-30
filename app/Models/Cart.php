<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'product_id', 'quantity', 'product_price', 'status', 'total'];

    function product()
    {
        // return $this->hasOne(ProductImage::class);
        return $this->hasMany(Product::class,'id','product_id');
    }

    function productimage()
    {
        // return $this->hasOne(ProductImage::class);
        return $this->hasMany(Products_images::class, 'product_id', 'product_id');
    }
}
