<?php

namespace App\Http\Controllers;

use App\Module;
use App\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        return view('User.Roles.Roles_list', ['roles' => Role::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('User.Roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rol = new Role();
        $rsp = $request->all();

        $rol->nombre = $rsp['nombre'];

        $rol->save();

        return Redirect('roles')->with('message','Guardado Satisfactoriamente !');
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
        $rol = Role::find($id);

        return view('User.Roles.edit', ['rol' => $rol]);
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
        $rol = Role::find($id);
        $rsp = $request->all();

        $rol->nombre = $rsp['nombre'];

        $rol->save();

        return Redirect('roles')->with('message','Guardado Satisfactoriamente !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::find($id)->delete();
        return response()->json([ 'message' => 'Rol Eliminado']);
    }

    /**
     * view for the modules of a role
     *
     * @param $id int ID of user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function modules($id)
    {
        $rol = Role::find($id);
        return view('User.Roles.Modules_list', ['rol' => $rol]);
    }

    /**
     * Delete relation of modules and role
     *
     * @param $role_id
     * @param $module_id
     * @return void
     */
    public function modules_destroy($role_id, $module_id)
    {
        $rol = Role::find($role_id);
        $rol->modules()->detach($module_id);

        return response()->json([ 'message' => 'Modulo del rol eliminado']);
    }

    /**
     * Agregar un modulo a un rol
     *
     * @param $user_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function modules_add($role_id)
    {
        $modules = Module::with('roles')->whereDoesntHave('roles', function($query) use ($role_id) {
            $query->where('role_id', $role_id);
        })->get();

        return view('User.Roles.module_create', ['modules' => $modules->all(), 'role_id' => $role_id]);
    }

    /**
     * Agregar un modulo a un rol post
     *
     * @param Request $request
     * @param $role_id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function modules_attach(Request $request, $role_id)
    {
        $role = Role::find($role_id);
        $role->modules()->attach($request->module);
        $role->save();

        return Redirect('roles/modules/' . $role_id)->with('message','agregado Satisfactoriamente !');

    }
}
