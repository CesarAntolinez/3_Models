<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $table = "roles";

    protected $fillable = ['id', 'nombre'];

    public $timestamps = true;

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_role', 'role_id', 'user_id');
    }

    public function modules()
    {
        return $this->belongsToMany('App\Module', 'model_role', 'role_id', 'module_id');
    }
}
