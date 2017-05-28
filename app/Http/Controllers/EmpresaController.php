<?php

namespace App\Http\Controllers;

use App\Ciudad;
use App\Departamento;
use App\Http\Requests\AdministradorRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $cursos = DB::table('suscripcion')
            ->join('cursos', 'suscripcion.curso', 'cursos.id')
            ->selectRaw('cursos.nombre as nombre, cursos.precio as precio, cursos.id as id, COUNT(suscripcion.user_id) as contador')
            ->groupBy('cursos.id')
            ->where('cursos.empresa_id', '=', Auth::user()->id)
            ->get();

        $contadorCurso = DB::table('cursos')->where('empresa_id', '=', Auth::user()->id)->count();

        $inscritos = DB::table('suscripcion')
            ->join('cursos', 'suscripcion.curso', 'cursos.id')
            ->join('users', 'suscripcion.user_id', 'users.id')
            ->selectRaw('users.name as nombre, users.apellidos as apellidos, users.documento as documento, users.tipo_documento as tipo_documento')
            ->where('cursos.empresa_id', '=', Auth::user()->id)
            ->get();

        $contadorIns = DB::table('suscripcion')
            ->join('cursos', 'suscripcion.curso', 'cursos.id')
            ->join('users', 'suscripcion.user_id', 'users.id')
            ->where('cursos.empresa_id', '=', Auth::user()->id)
            ->count();

        $recibido = DB::table('suscripcion')
            ->join('cursos', 'suscripcion.curso', 'cursos.id')
            ->join('users', 'suscripcion.user_id', 'users.id')
            ->selectRaw('sum(suscripcion.pago) as dinero')
            ->where('cursos.empresa_id', '=', Auth::user()->id)
            ->get();



        return view('empresa.index',compact('contadorCurso','cursos', 'inscritos', 'contadorIns', 'recibido'));
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

    public function cursos_empresa()
    {
        $cursos = DB::table('cursos')->where('empresa_id', '=', Auth::user()->id)->get();

        $contadorCurso = DB::table('cursos')->where('empresa_id', '=', Auth::user()->id)->count();


        return view('empresa.index',compact('contadorCurso','cursos'));
    }
}
