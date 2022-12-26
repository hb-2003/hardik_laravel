<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
    use HasFactory;
    protected $fillable = ['orders_id', 'products_id', 'products_name', 'products_price','products_image', 'final_price', 'products_tax', 'products_quantity'];
}
