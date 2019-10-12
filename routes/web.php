<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('template.content');
});
Route::get('/companias', 'Companias@index');
Route::get('/roles', 'Roles@index');
Route::get('/usuarios', 'Users@index');
Route::get('/modules', 'Modules@index');
