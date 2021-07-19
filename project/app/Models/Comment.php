<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable =
        ['name','idProduct','content','user_id'];

    public function product() {
        return $this->belongsTo('App\Models\Product');
    }
    public function user() {
        return $this->belongsTo('App\User');
    }
}
