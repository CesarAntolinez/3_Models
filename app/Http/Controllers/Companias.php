<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class Companias extends Controller
{
    public function index()
    {
        return view('User.Companies.Companies_list', ['companies' => Company::all()]);
    }
}
