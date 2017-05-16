<?php

namespace App\Http\Controllers;

use App\Ciudad;
use App\Departamento;
use App\Http\Requests\AdministradorRequest;
use App\User;
use Illuminate\Http\Request;
use Redirect;
use Auth;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdministradorRequest $request)
    {
        $instructor = new User;
        $instructor->name = $request->name;
        $instructor->apellidos = $request->apellidos;
        $instructor->tipo_documento = $request->tipo_documento;
        $instructor->documento = $request->documento;
        $instructor->direccion = $request->direccion;
        $instructor->telefono = $request->telefono;
        $instructor->email = $request->email;
        $instructor->password = bcrypt($request->password);
        $instructor->rol = 'instructor';
        $instructor->ciudad_id = $request->ciudad;
        $instructor->save();
        return redirect('instructores')->with('message','Instructor Creado correctamnete');
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
        $instructor = User::find($id);
        return view('administrador.instructorEdit',compact('instructor','departamento','ciudad'));
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
        $instructor = User::find($id);
        //$administador->fill($request->all());
        $instructor->name = $request->name;
        $instructor->apellidos = $request->apellidos;
        $instructor->tipo_documento = $request->tipo_documento;
        $instructor->documento = $request->documento;
        $instructor->direccion = $request->direccion;
        $instructor->telefono = $request->telefono;
        $instructor->email = $request->email;
        if ($request->password == ''){
            $instructor->password = $instructor->password;
        }else{
            $instructor->password = bcrypt($request->password);
        }
        $instructor->save();

        return redirect('instructor/'.$id.'/edit')->with('message','Instructor Actualizado correctamente');
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
        return redirect('instructores')->with('message', 'Administrador Eliminado correctamente');
    }
}
