<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable =
        ['name'];

    public function users()
    {
//        1 role nhiều user
        return $this->hasMany('App/User');
    }
}
