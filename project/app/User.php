<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // các trường có thể tác động
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //liên kết model
    public function comments()
    {

        return $this->hasMany('App\Models\Comment');

    }


    public function role()
    {
        // đi theo thằng Role
        return $this->belongsTo('App\Models\Role');
    }

    public function phone()
    {
        return $this->hasOne('App\Models\Phone');
    }


    public function bill()
    {
        return $this->hasOne('App\Models\Bill');
    }

}
