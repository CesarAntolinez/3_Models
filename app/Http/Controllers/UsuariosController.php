<?php

namespace App\Http\Controllers;

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

    public function roles($id)
    {
        $user = User::find($id);
        return view('User.Users.roles.list', ['roles' => $user->roles]);
    }
}
