<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status'];

    function attributevalue()
    {
        // return $this->hasOne(ProductImage::class);
        return $this->hasMany(Attributesvalue::class,'attribute_id','id');
    }
}
