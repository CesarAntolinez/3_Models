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
//Route::get('/companias', 'CompaniasController@index');
//Route::get('/roles', 'RolesController@index');
//Route::get('/usuarios', 'UsuariosController@index');
//Route::get('/modules', 'ModulosController@index');

Route::resource('companias', 'CompaniasController');
Route::resource('roles', 'RolesController');
Route::resource('usuarios', 'UsuariosController');
Route::resource('modules', 'ModulosController');
