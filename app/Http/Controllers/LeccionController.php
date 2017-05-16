<?php

namespace App\Http\Controllers;

use App\Leccion;
use App\Materia;
use Illuminate\Http\Request;
use DB;
use App\Categoria;
use PhpParser\Node\Stmt\Return_;

class LeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leccion = DB::table('lecciones')
            ->join('materia', 'lecciones.materia_id', '=', 'materia.id')
            ->select('lecciones.*', 'materia.nombre as nombre_materia')
            ->get();

        return view('lecciones.index', compact('leccion'));
    }
    public function newleccion()
    {
        $materia = Materia::all();
        $categorias = Categoria::all();
        return view('lecciones.crear', compact('materia', 'categorias'));
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
    public function store(Request $request)
    {
        $leccion = new Leccion;
        $leccion->titulo = $request->titulo;
        $leccion->descripcion = $request->descripcion;
        $leccion->contenido = $request->contenido;
        $leccion->materia_id = $request->materia_id;
        $leccion->save();
        return redirect('leccion')->with('message','Lección creada correctamente :)');
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
        $leccion = Leccion::find($id);
        $materia_id = $leccion->materia_id;
        $materia = Materia::find($materia_id);
        $materias = Materia::whereNotIn('id', [$materia_id])->get();
        return view('lecciones.editar',compact('leccion','materia','materias'));
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
        $leccion = Leccion::find($id);
        $leccion->titulo = $request->titulo;
        $leccion->materia_id = $request->materia_id;
        $leccion->descripcion = $request->descripcion;
        $leccion->contenido = $request->contenido;
        $leccion->save();
        return redirect('leccion')->with('message','Materia actulizada :)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $leccion = Leccion::find($id);
        $leccion->delete();
        // redirect
        return redirect('leccion')->with('message','Leccion eliminada correctamente :)');
    }
}
