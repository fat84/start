<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.page');
});

Route::get('/dashboard', function () {
    if(Auth::check() && Auth::user()->rol == 'usuario'){
        return view('usuario.index');
    }elseif (Auth::check() && Auth::user()->rol == 'instructor'){
        return view('instructor.index');
    }elseif (Auth::check() && Auth::user()->rol == 'administrador'){
        return view('administrador.index');
    }elseif (Auth::check() && Auth::user()->rol == 'empresa'){
        return view('empresa.index');
    }
    else{
        return view('auth.login');
    }

});

Auth::routes();

Route::get('/home', 'HomeController@index');

//vistas de usuario
Route::get('cursos/{nombre}/{id}','CursoController@perfilCursoUsuario');


//ciudad
Route::get('/home/{departamento_id}', ['uses' => 'HomeController@buscar_ciudades', 'as' => 'load.cities']);

//EDITAR DATOS CADA USUARIO
Route::get('miperfil','UsuarioController@index');
Route::post('ActualizarPerfil/{id}','UsuarioController@update');
Route::get('seguridad','UsuarioController@ActualizarPass');
Route::post('actualizarPass','UsuarioController@pass');

//Curso
Route::get('curso','CursoController@index');
Route::get('new_curso','CursoController@newcurso');

//Administrador
//crear instructores
Route::get('instructores','AdministradorController@instructor');
Route::get('empresas','AdministradorController@empresas');
Route::get('usuarios','AdministradorController@usuario');
Route::resource('administrador','AdministradorController');


//Instructor
Route::resource('instructor','InstructorController');

//empresas
Route::resource('empresa','EmpresaController');
//USUARIO
Route::resource('usuario','EstudianteController');
Route::get('miscursos','CursoController@miscursos');

//Categorias
Route::resource('categorias','CategoriaController');
Auth::routes();

Route::get('/home', 'HomeController@index');


//Curso
Route::get('curso','CursoController@index');
Route::get('perfil_curso/{id}','CursoController@perfil');
Route::get('new_curso','CursoController@newcurso');
Route::post('guardar_curso','CursoController@store');
Route::get('curso/{id}/editar','CursoController@edit');
Route::post('editando_curso/{id}','CursoController@update');
Route::get('eliminar_curso/{id}','CursoController@destroy');


//Modulo
Route::get('modulo','ModuloController@index');
Route::get('new_modulo','ModuloController@newmodulo');
Route::post('guardar_modulo','ModuloController@store');
Route::get('modulo/{id}/editar','ModuloController@edit');
Route::post('editando_modulo/{id}','ModuloController@update');
Route::get('eliminar_modulo/{id}','ModuloController@destroy');

//Materias
Route::get('materia','MateriaController@index');
Route::get('new_materia','MateriaController@newmateria');
Route::post('guardar_materia','MateriaController@store');
Route::get('materia/{id}/editar','MateriaController@edit');
Route::post('editando_materia/{id}','MateriaController@update');
Route::get('eliminar_materia/{id}','MateriaController@destroy');

//Material de apoyo, se asocia con la materias
Route::get('subirmaterialdeapoyo','MateriaController@materialApoyoCrear');
Route::post('guardar_materialApoyo','MateriaController@guardarmaterial');
Route::get('material/{id}/editar','MateriaController@editarmaterial');
Route::post('editando_material/{id}','MateriaController@updatematerial');
Route::get('eliminar_material/{id}','MateriaController@destroymaterila');
//Lecciones
Route::get('leccion','LeccionController@index');
Route::get('new_leccion','LeccionController@newleccion');
Route::post('guardar_leccion','LeccionController@store');
Route::get('leccion/{id}/editar','LeccionController@edit');
Route::post('editando_leccion/{id}','LeccionController@update');
Route::get('eliminar_leccion/{id}','LeccionController@destroy');

//foro
Route::get('crear_foro','ForoController@create');
Route::get('foros','ForoController@index');
//Route::get('foros/curso/{slug}','ForoController@vista');
Route::get('/foros/start/{slug}','ForoController@start');
Route::post('/foros/agregarcomentario','ForoController@agregarcomentario');

//quiz
Route::get('nuevoquiz','QuizController@create');
Route::get('quiz','QuizController@index');
Route::get('quizEdit/{id}','QuizController@edit');
Route::post('crearQuiz','QuizController@store');


/*
 * Quiz leccion
 */

Route::get('quiz_leccion','QuizController@indexQuizLeccion');
Route::get('quiz_leccion_crear','QuizController@createQuizLeccion');
Route::post('quiz_leccion_guardar','QuizController@storeQuizLeccion');
Route::get('quiz_leccion_editar/{id}','QuizController@editQuizLeccion');
Route::post('quiz_leccion_actualizar/{id}','QuizController@updateQuizLeccion');

//pregunta leccion
Route::post('quiz_preguta_crear/{id}','QuizController@guardarPregunta');
Route::post('quiz_preguta_actualizar_leccion/{id}','QuizController@quizpreguntaleccionactualzar');
//Route::post('quiz_preguta_informaion','QuizController@quiz_preguta_informaion');
Route::get('eliminarPreguntaLeccion/{id}','QuizController@eliminarPreguntaLeccion');






//compra paypal
Route::get('payment', array(
    'as' => 'payment',
    'uses' => 'PaypalController@postPayment',
));

Route::get('payment/status', array(
    'as' => 'payment.status',
    'uses' => 'PaypalController@getPaymentStatus',
));

//CARRITO DE COMPRAS
Route::post('addcarrito','CarritoController@store');
Route::get('carrito','CarritoController@index');
Route::resource('cart','CarritoController');
//Route::get('payment/status','CarritoController@compras');