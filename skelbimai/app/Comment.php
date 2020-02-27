<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['ads_id', 'userId', 'name', 'comment'];

    public function ads() {
        return $this->belongsTo(Ads::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
