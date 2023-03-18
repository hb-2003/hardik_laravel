<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;
    
    protected $fillable = ['manufacturer_name', 'manufacturer_image', 'status'];
    
    function categorie()
    {
        // return $this->hasOne(ProductImage::class);
        return $this->hasMany(Categorie::class,'manufacturers_id','id');
    }
}
