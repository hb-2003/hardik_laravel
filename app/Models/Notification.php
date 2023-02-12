<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'product_id', 'order_id', 'product_name','quantity','price', 'read_at'];



    function product()
    {
        // return $this->hasOne(ProductImage::class);
        return $this->hasMany(Product::class,'id','product_id');
    }
    function productimage()
    {
        // return $this->hasOne(ProductImage::class);
        return $this->hasMany(Products_images::class,'id','product_id');
    }
}

