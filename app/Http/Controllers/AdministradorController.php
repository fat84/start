<?php

namespace App\Http\Controllers;

use App\Ciudad;
use App\Departamento;
use App\Http\Requests\AdministradorRequest;
use App\User;
use Illuminate\Http\Request;
use Redirect;
use Auth;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $administradores = User::where('rol','=','administrador')->get();
        $departamento = Departamento::All();
        return view('administrador.administradores',compact('administradores','departamento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdministradorRequest $request)
    {
        $administrador = new User;
        $administrador->name = $request->name;
        $administrador->apellidos = $request->apellidos;
        $administrador->tipo_documento = $request->tipo_documento;
        $administrador->documento = $request->documento;
        $administrador->direccion = $request->direccion;
        $administrador->telefono = $request->telefono;
        $administrador->email = $request->email;
        $administrador->password = bcrypt($request->password);
        $administrador->rol = 'administrador';
        $administrador->ciudad_id = $request->ciudad;
        $administrador->save();
        return redirect('administrador')->with('message','Administrador Creado correctamnete');

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
        $departamento = Departamento::All();
        $ciudad = Ciudad::All();
        $administrador = User::find($id);
        return view('administrador.edit',compact('administrador','departamento','ciudad'));
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

        $administrador = User::find($id);
        //$administador->fill($request->all());
        $administrador->name = $request->name;
        $administrador->apellidos = $request->apellidos;
        $administrador->tipo_documento = $request->tipo_documento;
        $administrador->documento = $request->documento;
        $administrador->direccion = $request->direccion;
        $administrador->telefono = $request->telefono;
        $administrador->email = $request->email;
        if ($request->password == ''){
            $administrador->password = $administrador->password;
        }else{
            $administrador->password = bcrypt($request->password);
        }
        $administrador->save();

        return redirect('administrador/'.$id.'/edit')->with('message','Administrador Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('administrador')->with('message', 'Administrador Eliminado correctamente');
    }

    public function instructor(){
        $instructores = User::where('rol','=','instructor')->get();
        $departamento = Departamento::All();
        return view('administrador.instructores',compact('instructores','departamento'));
    }
    public function empresas(){
        $empresas = User::where('rol','=','empresa')->get();
        $departamento = Departamento::All();
        return view('administrador.empresas',compact('empresas','departamento'));
    }
    public function usuario(){
        $usuarios = User::where('rol','=','usuario')->get();
        $departamento = Departamento::All();
        return view('administrador.usuarios',compact('usuarios','departamento'));
    }
}
