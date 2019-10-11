<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = "modules";
    protected $fillable = ['id', 'nombre'];

    public function roles()
    {
        return $this->belongsToMany('App/Role');
    }

}
