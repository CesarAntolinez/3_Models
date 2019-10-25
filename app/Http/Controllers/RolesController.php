<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        return view('User.Roles.Roles_list', ['roles' => Role::all()]);
    }
}
