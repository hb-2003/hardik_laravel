<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addresse extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'first_name', 'last_name', 'address', 'suburb','postcode', 'city', 'state', 'country','type'];
}
