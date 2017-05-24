<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Curso;
use App\Http\Requests\CursoRequest;
use App\Modulo;
use App\Order;
use App\OrderItem;
use App\User;
use DevDojo\Chatter\Models\Category;
use DevDojo\Chatter\Models\Discussion;
use DevDojo\Chatter\Models\Post;
use Illuminate\Http\Request;
use Auth;
use DB;
use Redirect;
use Storage;
use Illuminate\Support\Facades\Input;
use Session;
use Hash;
use Validator;
use Cart;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos= Curso::all();
        $cursos = DB::table('cursos')
            ->join('categoria', 'cursos.categoria_id', '=', 'categoria.id')
            ->select('cursos.*', 'categoria.nombre as nombre_cate')
            ->get();

        return view('curso.index', compact('cursos'));
    }

    public function newcurso()
    {
        $empresas= DB::table('users')
            ->where('rol', 'empresa')
            ->get();

        $categorias= Categoria::all();
        return view('curso.crear', compact('empresas', 'categorias'));
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

    public function perfil($id)
    {
        //

        $curso= Curso::find($id);
        $modulos = DB::table('modulos')
            ->where('curso_id', $id)
            ->get();
        return view('curso.perfil')
            ->with('curso', $curso)
            ->with('modulos', $modulos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CursoRequest $request)
    {


        $categoria_foro = new Category;
        $categoria_foro->name = $request->nombre;
        $categoria_foro->slug = str_replace(' ', '-', $request->nombre);
        $categoria_foro->color = '#9B59B6';
        $categoria_foro->save();

        $discusion_foro = new Discussion;
        $discusion_foro->chatter_category_id = $categoria_foro->id;
        $discusion_foro->title = $request->nombre;
        $discusion_foro->user_id = Auth::user()->id;
        $discusion_foro->slug = str_replace(' ', '-', $request->nombre);
        $discusion_foro->save();

        $post_foro = new Post;
        $post_foro->chatter_discussion_id = $discusion_foro->id;
        $post_foro->user_id = Auth::user()->id;
        $post_foro->body = '<h1>Bienvenido al foro del curso '.$request->nombre.'</h1>';
        $post_foro->save();

        $curso = new Curso();
        $curso->nombre = $request->nombre;
        $curso->categoria_id = $request->categoria_id;
        $curso->descripcion = $request->descripcion;

        //Codigo para guardar las imagenes
        if ($request->file('imagen') == '') {
            $curso->imagen = null;
        } else {
            $img = $request->file('imagen');
            $file_route = time() . '_' . $img->getClientOriginalName();
            Storage::disk('img')->put($file_route, file_get_contents($img->getRealPath()));
            $curso->imagen = $file_route;
        }
        if ($request->file('video_promo') == '') {
            $curso->video_promo = null;
        } else {
            $video = $request->file('video_promo');
            $file_route = time() . '_' . $video->getClientOriginalName();
            Storage::disk('video')->put($file_route, file_get_contents($video->getRealPath()));
            $curso->video_promo = $file_route;
        }
        $curso->precio = $request->precio;
        $curso->empresa_id = $request->empresa_id;
        $curso->foro_id = $discusion_foro->id;
        $curso->save();
        return redirect('curso')->with('message','Curso creado correctamente');

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
        $curso= Curso::find($id);

        $nombre = $curso->empresa_id;

        $nom_emp= User::find($nombre);

        $empresas= User::where('rol', 'empresa')->whereNotIn('id', [$nombre])->get();

        $cate = $curso->categoria_id;

        $nom_cate= Categoria::find($cate);

        $categorias= Categoria::whereNotIn('id', [$cate])->get();

        return view('curso.editar')
            ->with('curso', $curso)
            ->with('nom_emp', $nom_emp)
            ->with('empresas', $empresas)
            ->with('nom_cate', $nom_cate)
            ->with('categorias', $categorias);
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
        $usuario_id = Auth::user()->id;
        $curso = Curso::find($id);
        $curso->nombre = $request->nombre;
        $curso->categoria_id = $request->categoria_id;
        $curso->descripcion = $request->descripcion;

        //Codigo para guardar las imagenes
        $imagenAnterior = $curso->imagen;
        if ($request->file('imagen') == '') {
            $curso->imagen = $imagenAnterior;
        } else {
            $img = $request->file('imagen');
            $file_route = time() . '_' . $img->getClientOriginalName();
            Storage::disk('img')->put($file_route, file_get_contents($img->getRealPath()));
            $curso->imagen = $file_route;
        }

        $videoAnterior = $curso->video_promo;
        if ($request->file('video_promo') == '') {
            $curso->video_promo = $videoAnterior;
        } else {
            $video = $request->file('video_promo');
            $file_route = time() . '_' . $video->getClientOriginalName();
            Storage::disk('video')->put($file_route, file_get_contents($video->getRealPath()));
            $curso->video_promo = $file_route;
        }
        $curso->precio = $request->precio;
        $curso->empresa_id = $request->empresa_id;
        $curso->save();

        return redirect('curso')->with('message','Curso Editado correctamente');
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
        $curso = Curso::find($id);
        $curso->delete();
        return redirect('curso')->with('message','Curso Eliminado correctamente');
    }


    public function perfilCursoUsuario(Request $request,$nombre,$id){

        $curso = Curso::find($id);
        $modulo = Modulo::where('curso_id','=',$id)->get();
        return view('usuario.perfilCurso', compact('curso','modulo'));
    }


    public function miscursos(){
       $suscripcion = Order::where('user_id','=',Auth::user()->id)->get();
        return view('usuario.miscursos',compact('suscripcion'));
    }

}
