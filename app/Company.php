<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "companies";
    protected $fillable = ['id', 'nit', 'nombre', 'direccion'];
    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->belongsToMany('App/User');
    }
}
