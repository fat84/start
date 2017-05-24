<?php

namespace App\Http\Controllers;

use App\Leccion;
use App\Materia;
use App\MaterialLeccion;
use Illuminate\Http\Request;
use DB;
use App\Categoria;
use PhpParser\Node\Stmt\Return_;
use Auth;
use Redirect;
use Storage;
use Illuminate\Support\Facades\Input;
use Session;
use Hash;
use Validator;
use Cart;

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

    //Metodos para la carga de material de apoyo



    public function materialApoyoCrear(){
        $lecciones = Leccion::all();
        $materiales_apoyo = MaterialLeccion::All();
        return view('lecciones.apoyoLeccion',compact('lecciones','materiales_apoyo'));
    }
    public function guardarmaterial(Request $request){

        $material = new MaterialLeccion();
        $material->nombre = $request->nombre;
        $material->leccion_id = $request->leccion;
        $archivo = $request->file('archivo');
        $file_route = time() . '_' . $archivo->getClientOriginalName();
        Storage::disk('material')->put($file_route, file_get_contents($archivo->getRealPath()));
        $material->url = $file_route;
        $material->save();
        return redirect('subirmaterialdeapoyo_leccion')->with('message','Archivo anexado correctamente');

    }

    public function editarmaterial($id){
        $material = MaterialLeccion::find($id);
        $leccion = Leccion::find($material->leccion_id);
        $lecciones = Leccion::whereNotIn('id', [$leccion->id])->get();
        return view('lecciones.editApoLeccion',compact('material','leccion','lecciones'));

    }

    public function updatematerial(Request $request,$id){

        $material = MaterialLeccion::find($id);
        $material->nombre = $request->nombre;
        $material->leccion_id = $request->leccion;
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
        return redirect('material_leccion/'.$id.'/editar')->with('message','Material actualizado correctamente');

    }

    public function destroymaterial($id){
        $material = MaterialLeccion::find($id);
        $material->delete();
        return redirect('subirmaterialdeapoyo_leccion')->with('message','Material eliminado');
    }
}
