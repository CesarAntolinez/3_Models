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
//Roles
Route::resource('roles', 'RolesController');
Route::get('/roles/modules/{id}', [
    'as' => 'roles.modules',
    'uses' => 'RolesController@modules'
]);
Route::delete('/roles/modules/{role_id}/{module_id}', 'RolesController@modules_destroy');
Route::get('/roles/modules/{id}/add', [
    'as' => 'roles.modules.add',
    'uses' => 'RolesController@modules_add'
]);
Route::post('/roles/modules/{role_id}', [
    'as' => 'roles.modules.attach',
    'uses' => 'RolesController@modules_attach'
]);

// Rutas para usuario
Route::resource('usuarios', 'UsuariosController');
Route::get('/usuarios/roles/{id}', [
    'as' => 'usuarios.roles',
    'uses' => 'UsuariosController@roles'
]);
Route::delete('/usuarios/roles/{user_id}/{role_id}', 'UsuariosController@roles_destroy');
Route::get('/usuarios/roles/{id}/add', [
    'as' => 'usuarios.roles.add',
    'uses' => 'UsuariosController@roles_add'
]);
Route::post('/usuarios/roles/{user_id}', [
    'as' => 'usuarios.roles.attach',
    'uses' => 'UsuariosController@role_attach'
]);
Route::get('/usuarios/companies/{id}', [
    'as' => 'usuarios.companies',
    'uses' => 'UsuariosController@companies'
]);
Route::delete('/usuarios/companies/{user_id}/{role_id}', 'UsuariosController@companies_destroy');
Route::get('/usuarios/companies/{id}/add', [
    'as' => 'usuarios.companies.add',
    'uses' => 'UsuariosController@companies_add'
]);
Route::post('/usuarios/companies/{user_id}', [
    'as' => 'usuarios.companies.attach',
    'uses' => 'UsuariosController@companies_attach'
]);


Route::resource('modules', 'ModulosController');
//Route::put('/modules', 'ModulosController@update');
