<?php

namespace App\Http\Controllers;

use App\Ciudad;
use App\Departamento;
use App\Http\Requests\AdministradorRequest;
use App\User;
use Illuminate\Http\Request;
use Redirect;
use Auth;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $usuario = new User;
        $usuario->name = $request->name;
        $usuario->apellidos = $request->apellidos;
        $usuario->tipo_documento = $request->tipo_documento;
        $usuario->documento = $request->documento;
        $usuario->direccion = $request->direccion;
        $usuario->telefono = $request->telefono;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->rol = 'usuario';
        $usuario->ciudad_id = $request->ciudad;
        $usuario->save();
        return redirect('usuarios')->with('message','Usuario Creado correctamnete');

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
        $usuario = User::find($id);
        return view('administrador.usuarioEdit',compact('usuario','departamento','ciudad'));
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
        //$administador->fill($request->all());
        $usuario->name = $request->name;
        $usuario->apellidos = $request->apellidos;
        $usuario->tipo_documento = $request->tipo_documento;
        $usuario->documento = $request->documento;
        $usuario->direccion = $request->direccion;
        $usuario->telefono = $request->telefono;
        $usuario->email = $request->email;
        if ($request->password == ''){
            $usuario->password = $usuario->password;
        }else{
            $usuario->password = bcrypt($request->password);
        }
        $usuario->save();

        return redirect('usuario/'.$id.'/edit')->with('message','Usuario Actualizado correctamente');
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
        return redirect('usuarios')->with('message', 'Usuarios Eliminado correctamente');
    }
}
