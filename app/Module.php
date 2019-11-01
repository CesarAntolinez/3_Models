<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use SoftDeletes;
    protected $table = "modules";

    protected $fillable = ['id', 'nombre'];

    public $timestamps = true;

    public function roles()
    {
        return $this->belongsToMany('App/Role', 'model_role', 'module_id', 'role_id');
    }

}
