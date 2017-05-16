<?php

namespace App\Http\Controllers;

use App\Ciudad;
use App\Departamento;
use App\Http\Requests\AdministradorRequest;
use App\User;
use Illuminate\Http\Request;
use Redirect;
use Auth;
use App\Http\Requests\EmpresaRequest;

class EmpresaController extends Controller
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
    public function store(EmpresaRequest $request)
    {
        $empresa = new User;
        $empresa->razon_social = $request->razon_social;
        $empresa->tipo_documento = $request->tipo_documento;
        $empresa->documento = $request->documento;
        $empresa->direccion = $request->direccion;
        $empresa->telefono = $request->telefono;
        $empresa->email = $request->email;
        $empresa->password = bcrypt($request->password);
        $empresa->rol = 'empresa';
        $empresa->ciudad_id = $request->ciudad;
        $empresa->save();
        return redirect('empresas')->with('message','Empresa Creada correctamnete');
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
        $empresa = User::find($id);
        return view('administrador.empresaEdit',compact('empresa','departamento','ciudad'));
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
        $empresa = User::find($id);
        //$administador->fill($request->all());
        $empresa->name = $request->name;
        $empresa->apellidos = $request->apellidos;
        $empresa->tipo_documento = $request->tipo_documento;
        $empresa->documento = $request->documento;
        $empresa->direccion = $request->direccion;
        $empresa->telefono = $request->telefono;
        $empresa->email = $request->email;
        if ($request->password == ''){
            $empresa->password = $empresa->password;
        }else{
            $empresa->password = bcrypt($request->password);
        }
        $empresa->save();

        return redirect('empresa/'.$id.'/edit')->with('message','Empresa Actualizado correctamente');
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
        return redirect('empresas')->with('message', 'Empresa Eliminado correctamente');
    }
}
