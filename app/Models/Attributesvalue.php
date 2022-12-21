<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attributesvalue    extends Model
{
    use HasFactory;
    protected $fillable = ['attribute_id','name', 'status'];
}
