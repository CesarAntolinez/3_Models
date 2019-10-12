<?php

namespace App\Http\Controllers;
use App\Module;
use Illuminate\Http\Request;

class Modules extends Controller
{
    public function index()
    {
        return view('User.Modules.Modules_list', ['modules' => Module::all()]);
    }
}
