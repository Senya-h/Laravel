<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $fillable = ['name', 'categoryId', 'description', 'image', 'price', 'email', 'phone', 'location',];
}
