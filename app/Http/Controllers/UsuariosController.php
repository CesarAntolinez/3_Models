<?php

namespace App\Http\Controllers;

use App\Company;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index()
    {
        return view('User.Users.Users_list', ['users' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('User.Users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new User();
        $rsp = $request->all();

        $usuario->cedula = $rsp['cedula'];
        $usuario->nombre = $rsp['nombre'];
        $usuario->correo = $rsp['correo'];
        $usuario->telefono = $rsp['telefono'];
        $usuario->password = bcrypt($rsp['password']);

        $usuario->save();

        return Redirect('usuarios')->with('message','Guardado Satisfactoriamente !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::find($id);

        return view('User.Users.edit', ['usuario' => $usuario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = User::find($id);
        $rsp = $request->all();

        $usuario->cedula = $rsp['cedula'];
        $usuario->nombre = $rsp['nombre'];
        $usuario->correo = $rsp['correo'];
        $usuario->telefono = $rsp['telefono'];
        $usuario->password = bcrypt($rsp['password']);

        $usuario->save();

        return Redirect('usuarios')->with('message','Editado Satisfactoriamente !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return response()->json([ 'message' => 'Usuario Eliminado']);
    }

    /**
     * view for the roles of a user
     *
     * @param $id int ID of user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function roles($id)
    {
        $user = User::find($id);

        return view('User.Users.roles_list', ['user' => $user]);
    }

    /**
     * Delete relation of role and user
     *
     * @param $user_id
     * @param $role_id
     * @return void
     */
    public function roles_destroy($user_id, $role_id)
    {
        $user = User::find($user_id);
        $user->roles()->detach($role_id);

        return response()->json([ 'message' => 'Rol del usuario eliminado']);
    }

    /**
     * Agregar un rol a un usuario
     *
     * @param $user_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function roles_add($user_id)
    {
        $roles = Role::with('users')->whereDoesntHave('users', function($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();

        return view('User.Users.role_create', ['roles' => $roles->all(), 'user_id' => $user_id]);
    }

    /**
     * Agregar un rol a un usuario post
     *
     * @param Request $request
     * @param $user_id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function role_attach(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $user->roles()->attach($request->rol);
        $user->save();

        return Redirect('usuarios/roles/' . $user_id)->with('message','agregado Satisfactoriamente !');

    }

    /**
     * view for the companies of a user
     *
     * @param $id int ID of user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function companies($id)
    {
        $user = User::find($id);
        return view('User.Users.companies_list', ['user' => $user]);
    }

    /**
     * Delete relation of company and user
     *
     * @param $user_id
     * @param $company_id
     * @return void
     */
    public function companies_destroy($user_id, $company_id)
    {
        $user = User::find($user_id);
        $user->companies()->detach($company_id);

        return response()->json([ 'message' => 'Compañia del usuario eliminado']);
    }

    /**
     * Agregar un compañia a un usuario
     *
     * @param $user_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function companies_add($user_id)
    {
        $companies = Company::with('users')->whereDoesntHave('users', function($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();

        return view('User.Users.company_create', ['companies' => $companies->all(), 'user_id' => $user_id]);
    }

    /**
     * Agregar un compania a un usuario post
     *
     * @param Request $request
     * @param $user_id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function companies_attach(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $user->companies()->attach($request->company);
        $user->save();

        return Redirect('usuarios/companies/' . $user_id)->with('message','agregado Satisfactoriamente !');

    }


}
