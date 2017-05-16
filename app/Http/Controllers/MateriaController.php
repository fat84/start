<?php

namespace App\Http\Controllers;

use App\Materia;
use App\MaterialApoyo;
use App\Modulo;
use Illuminate\Http\Request;
use DB;
use App\Categoria;
use App\Curso;
use Storage;


class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materias = DB::table('materia')
            ->join('modulos', 'materia.modulo_id', '=', 'modulos.id')
            ->select('materia.*', 'modulos.nombre as nombre_modulo')
            ->get();

        return view('materias.index', compact('materias'));
    }
    public function newmateria()
    {
        $modulo = Modulo::all();
        $categorias = Categoria::all();
        return view('materias.crear', compact('modulo', 'categorias'));
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
        $materia = new Materia;
        $materia->nombre = $request->nombre;
        $materia->modulo_id = $request->modulo_id;
        $materia->descripcion = $request->descripcion;
        $materia->save();
        return redirect('materia')->with('message','Materia creada correctamente');
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
        //
        $materia = Materia::find($id);
        $modulo_id = $materia->modulo_id;
        $modulo = Modulo::find($modulo_id);
        $modulos = Modulo::whereNotIn('id', [$modulo_id])->get();
        return view('materias.editar',compact('materia','modulo','modulos'));
            /*->with('modulo', $modulo)
            ->with('nom_curso', $nom_curso)
            ->with('cursos', $cursos);*/
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
        $materia = Materia::find($id);
        $materia->nombre = $request->nombre;
        $materia->modulo_id = $request->modulo_id;
        $materia->descripcion = $request->descripcion;

        $materia->save();

        return redirect('materia')->with('message','Materia actulizada :)');
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
        $materia = Materia::find($id);
        $materia->delete();

        // redirect
        return redirect('materia')->with('message','Materia eliminada correctamente :)');
    }

    public function materialApoyoCrear(){
        $materias = Materia::all();
        $materiales_apoyo = MaterialApoyo::All();
        return view('materias.materialApoyo',compact('materias','materiales_apoyo'));
    }
    public function guardarmaterial(Request $request){

        $material = new MaterialApoyo;
        $material->nombre = $request->nombre;
        $material->materia_id = $request->materia;
        $archivo = $request->file('archivo');
        $file_route = time() . '_' . $archivo->getClientOriginalName();
        Storage::disk('material')->put($file_route, file_get_contents($archivo->getRealPath()));
        $material->url = $file_route;
        $material->save();
        return redirect('subirmaterialdeapoyo')->with('message','Archivo anexado correctamentr');

    }

    public function editarmaterial($id){
        $material = MaterialApoyo::find($id);
        $materia = Materia::find($material->materia_id);
        $materias = Materia::whereNotIn('id', [$materia])->get();
        return view('materias.materialEdit',compact('material','materia','materias'));

    }

    public function updatematerial(Request $request,$id){

        $material = MaterialApoyo::find($id);
        $material->nombre = $request->nombre;
        $material->materia_id = $request->materia;
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
       return redirect('material/'.$id.'/editar')->with('message','Material actualizado correctamente');

    }

    public function destroymaterila($id){
        $material = MaterialApoyo::find($id);
        $material->delete();
        return redirect('subirmaterialdeapoyo')->with('message','Material eliminado');
    }
}
