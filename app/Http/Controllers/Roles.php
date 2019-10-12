<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class Roles extends Controller
{
    public function index()
    {
        return view('User.Roles.Roles_list', ['roles' => Role::all()]);
    }
}
