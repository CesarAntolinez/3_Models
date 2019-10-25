<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";
    protected $fillable = ['id', 'nombre'];
    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->belongsToMany('App/User');
    }

    public function modules()
    {
        return $this->belongsToMany('App/Module');
    }
}
