<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =
        ['name','image','category_id','price'];

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function comments(){

        return $this->hasMany(' App\Models\Comment');

    }
}
