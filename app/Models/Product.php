<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products_images;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'attributes_id',
        'attributes_set',
        'products_name',
        'products_quantity',
        'products_price',
        'Products_categorie',
        'sale_price',
        'products_weight',
        'products_weight_unit',
        'products_status',
        'is_current',
        'manufacturers_id',
        'products_type',
        'products_min_order',
        'products_max_stock',
        'colour_id ',

    ];
    function productimage() {
        // return $this->hasOne(ProductImage::class);
        return $this->hasMany(Products_images::class);
    }
    function productreview() {
        // return $this->hasOne(ProductImage::class);
        return $this->hasMany(Review::class ,'product_id','id' );
    }
}
