<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable =
        ['phone', 'user_id','address','name'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
