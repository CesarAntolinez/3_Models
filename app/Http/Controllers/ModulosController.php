<?php

namespace App\Http\Controllers;

use App\Module;
use Illuminate\Http\Request;

class ModulosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:module');
    }

    public function index()
    {
        return view('User.Modules.Modules_list', ['modules' => Module::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('User.Modules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rol = new Module();
        $rsp = $request->all();

        $rol->nombre = $rsp['nombre'];
        $rol->ruta = $rsp['ruta'];

        $rol->save();

        return Redirect('modules')->with('message','Guardado Satisfactoriamente !');
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
        $modulo = Module::find($id);

        return view('User.Modules.edit', ['modulo' => $modulo]);
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
        $rol = Module::find($id);
        $rsp = $request->all();

        $rol->nombre = $rsp['nombre'];
        $rol->ruta = $rsp['ruta'];

        $rol->save();

        return Redirect('modules')->with('message','Guardado Satisfactoriamente !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Module::find($id)->delete();
        return response()->json([ 'message' => 'modulo Eliminado']);
    }
}
