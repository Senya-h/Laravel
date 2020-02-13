<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $fillable = ['name', 'categoryId', 'description', 'img', 'price', 'email', 'phone', 'location',];
}
