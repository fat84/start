<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Curso;
use App\MaterialModulo;
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

    //Metodos para la carga de material de apoyo



    public function materialApoyoCrear(){
        $modulos = Modulo::all();
        $materiales_apoyo = MaterialModulo::All();
        return view('modulo.apoyoModulo',compact('modulos','materiales_apoyo'));
    }
    public function guardarmaterial(Request $request){

        $material = new MaterialModulo();
        $material->nombre = $request->nombre;
        $material->modulo_id = $request->modulo;
        $archivo = $request->file('archivo');
        $file_route = time() . '_' . $archivo->getClientOriginalName();
        Storage::disk('material')->put($file_route, file_get_contents($archivo->getRealPath()));
        $material->url = $file_route;
        $material->save();
        return redirect('subirmaterialdeapoyo_modulo')->with('message','Archivo anexado correctamente');

    }

    public function editarmaterial($id){
        $material = MaterialModulo::find($id);
        $modulo = Modulo::find($material->modulo_id);
        $modulos = Modulo::whereNotIn('id', [$modulo->id])->get();
        return view('modulo.editApoModulo',compact('material','modulo','modulos'));

    }

    public function updatematerial(Request $request,$id){

        $material = MaterialModulo::find($id);
        $material->nombre = $request->nombre;
        $material->modulo_id = $request->modulo;
        $archivoAnterio = $material->url;
        if ($request->file('archivo') == '') {
            $material->url = $archivoAnterio;
        } else {
            $archivo = $request->file('archivo');
            $file_route = time() . '_' . $archivo->getClientOriginalName();
            Storage::disk('material')->put($file_route, file_get_contents($archivo->getRealPath()));
            $material->url = $file_route;
        }
        $material->save();
        return redirect('material_modulo/'.$id.'/editar')->with('message','Material actualizado correctamente');

    }

    public function destroymaterial($id){
        $material = MaterialModulo::find($id);
        $material->delete();
        return redirect('subirmaterialdeapoyo_modulo')->with('message','Material eliminado');
    }
}
