<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Curso;
use App\User;
use App\Modulo;
use Illuminate\Http\Request;
use Auth;
use DB;
use Redirect;
use Storage;
use Illuminate\Support\Facades\Input;
use Session;
use Hash;
use Validator;

class ModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modulos = DB::table('modulos')
            ->join('cursos', 'modulos.curso_id', '=', 'cursos.id')
            ->select('modulos.*', 'cursos.nombre as nombre_curso')
            ->get();

        return view('modulo.index', compact('modulos'));
    }

    public function newmodulo()
    {
        $cursos = Curso::all();

        $categorias = Categoria::all();
        return view('modulo.crear', compact('cursos', 'categorias'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $modulo = new Modulo();
        $modulo->nombre = $request->nombre;
        $modulo->curso_id = $request->curso_id;
        $modulo->descripcion = $request->descripcion;

        $img = $request->file('imagen');
        if ($img == '') {
            $modulo->imagen = '';
        } else {
            $file_route = time() . '_' . $img->getClientOriginalName();
            Storage::disk('img2')->put($file_route, file_get_contents($img->getRealPath()));
            $modulo->imagen = $file_route;
        }
        $modulo->save();
        return redirect('modulo');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $modulo = Modulo::find($id);
        $nombre = $modulo->curso_id;
        $nom_curso = Curso::find($nombre);
        $cursos = Curso::whereNotIn('id', [$nombre])->get();
        return view('modulo.editar')
            ->with('modulo', $modulo)
            ->with('nom_curso', $nom_curso)
            ->with('cursos', $cursos);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $modulo = Modulo::find($id);

        $modulo->nombre = $request->nombre;
        $modulo->curso_id = $request->curso_id;
        $modulo->descripcion = $request->descripcion;

        $imagenAnterior = $modulo->imagen;
        if ($request->file('imagen') == '') {
            $modulo->imagen = $imagenAnterior;
        } else {
            $img = $request->file('imagen');
            $file_route = time() . '_' . $img->getClientOriginalName();
            Storage::disk('img2')->put($file_route, file_get_contents($img->getRealPath()));
            $modulo->imagen = $file_route;
        }
        $modulo->save();

        return redirect('modulo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $modulo = Modulo::find($id);
        $modulo->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the nerd!');
        return Redirect::to('modulo');
    }
}
