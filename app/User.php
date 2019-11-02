<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $table = "users";

    protected $fillable = ['id', 'nombre', 'correo', 'cedula', 'telefono'];

    protected $hidden = ['password'];

    protected $casts = [];

    public $timestamps = true;

    public function companies()
    {
        return $this->belongsToMany('App\Company', 'user_company', 'user_id', 'company_id');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'user_role', 'user_id', 'role_id');
    }
}
