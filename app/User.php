<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";

    protected $fillable = ['id', 'nombre', 'correo', 'cedula', 'telefono'];

    protected $hidden = ['password'];

    protected $casts = [];

    public function companies()
    {
        return $this->belongsToMany('App/Company');
    }

    public function roles()
    {
        return $this->belongsToMany('App/Role');
    }
}
