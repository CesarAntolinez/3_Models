<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class Users extends Controller
{
    public function index()
    {
        return view('User.Users.Users_list', ['users' => User::all()]);
    }
}
