<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InforFooter extends Model
{
    protected $fillable =
        ['text','address','phone','email','linkFacebook','linkInstargam','linkTwitter','linkGoogle'];
}
