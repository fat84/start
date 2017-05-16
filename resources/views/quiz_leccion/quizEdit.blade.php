@extends('layouts.principal')
@section('script')
    <script src="{{asset('js/quiz.js')}}"></script>
@stop
@section('content')
    <div class="mdk-drawer-layout__content">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href={{url('app/public/')}}"">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{url('quiz')}}">Quiz Editar</a></li>
            <li class="breadcrumb-item active">Quiz Edición</li>
        </ol>
    </div>
    @if($message=Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            {{Session::get('message')}}
        </div>
    @endif
    <h1 class="page-heading h2">{{$quiz->titulo}} </h1>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Datos basicos</h4>
        </div>
        <div class="card-block">
            <form action="{{url('quiz_leccion_actualizar/'.$quiz->id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="col-md-6">
                  <div class="form-group row">
                      <label for="course_title" class="col-sm-3 col-form-label"><b style="color:red;">* </b><b>Quiz titulo</b>:</label>
                      <div class="col-sm-9 col-md-6">
                          <div class="input-group">
                              <span class="input-group-addon" id="sizing-addon2">#</span>
                              <input type="text" name="titulo" class="form-control" placeholder="Title" aria-describedby="sizing-addon2" value="{{$quiz->titulo}}">
                          </div>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="course_title" class="col-sm-3 col-form-label"><b style="color:red;">* </b><b>Lección</b>:</label>
                      <div class="col-sm-9 col-md-6">
                          <select class="custom-select form-control" name="leccion">
                              <option selected value="{{$quiz->leccion->id}}">{{$quiz->leccion->titulo}}</option>
                              @foreach($lecciones as $leccione)
                                  <option value="{{$leccione->id}}">{{$leccione->titulo}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="course_title" class="col-sm-3 col-form-label"><b style="color:red;">* </b><b>Imagen quiz:</b></label>
                      <div class="col-sm-9 col-md-4">
                          <p><img src="{{asset('img/usuario/'.$quiz->imagen)}}" alt="" width="150" class="rounded"></p>
                      </div>
                  </div>
              </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="course_title" class="col-sm-4 col-form-label"><b>Nueva imagen</b></label>
                        <div class="form-group col-sm-8 col-md-3">
                            <input type="file" class="form-control-file" name="imagen">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="course_title" class="col-sm-3 col-form-label"><b style="color:red;">* </b><b>Score</b>:</label>
                        <div class="col-sm-9 col-md-4">
                            <input type="number" name="score" required class="form-control" value="{{$quiz->score}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Guardar cambios lección</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Pregutas</h4>
        </div>
        <div class="card-header bg-white">
            <a href="#" data-toggle="modal" data-target="#editQuiz" class="btn btn-success">Agregar Preguntas <i class="material-icons">add</i></a>
        </div>

        <div class="nestable" id="nestable">
            <ul class="list-group list-group-fit nestable-list-plain mb-0">
                @foreach($preguntas as $pregunta)
                    <li class="list-group-item nestable-item">
                        <div class="media">
                            <div class="media-left media-middle">
                                <a href="#" class="btn btn-default nestable-handle"><i class="material-icons">menu</i></a>
                            </div>
                            <div class="media-body media-middle">
                                {{$pregunta->titulo}}
                            </div>
                            <div class="media-right text-xs-right">
                                <div style="width:100px">
                                    <a href="#" data-toggle="modal" data-target="#editQuiz{{$pregunta->id}}"  class="btn btn-primary btn-sm"><i class="material-icons">edit</i></a>
                                    <a href="{{url('eliminarPreguntaLeccion/'.$pregunta->id)}}"  class="btn btn-danger btn-sm"><i class="material-icons">delete</i></a>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
<?php
$contador = 1;
$contador2 = 1;
$contador3 = 1;
$contador4 = 1;
$contador5 = 1;
$contador6 = 1;
$contador7 = 1;
?>
    @foreach($preguntas as $pregunta)
    <div class="modal fade" id="editQuiz{{$pregunta->id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title">Editar Pregunta {{$pregunta->titulo}}</h5>
                </div>
                <div class="modal-body">
                    <form action="{{url('quiz_preguta_actualizar_leccion/'.$pregunta->id)}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="" class="col-form-label col-md-3">Titulo:</label>
                            <div class="col-md-9">
                                <input type="text" name="titulo_pregunta" value="{{$pregunta->titulo}}" required class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-form-label col-md-3">Tipo:</label>
                            <div class="col-md-4">
                                @if ($pregunta->tipo_pregunta == 1)
                                    <p>Pregunta tipo texto</p>
                                    <input name="tipo_respuesta" value="{{$pregunta->tipo_pregunta}}" hidden>
                                @else
                                    <p>Selección Multiple</p>
                                    <input name="tipo_respuesta" value="{{$pregunta->tipo_pregunta}}" hidden>
                            @endif
                             <!--   <select class="custom-control custom-select form-control" id="tipo_respuesta" name="tipo_respuesta" onchange="tipo_respuestas()" required>
                                    <option value="">Seleccione un tipo</option>
                                    <option value="1">Texto</option>
                                    <option value="2">Selección Multiple</option>
                                </select>-->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-form-label col-md-3">Respuestas:</label>
                            <div class="col-md-9">
                                @if ($pregunta->tipo_pregunta == 1)
                                    <p>Pregunta tipo texto</p>
                                @else
                                    @foreach(\App\Quiz_respuesta_leccion::where('quiz_pregunta_leccion_id','=',$pregunta->id)->get() as $respuesta)
                                        <div class="form-group">
                                            <label>{{$contador++}} respuesta</label>
                                            <input class="form-control" name="option{{$contador2++}}" placeholder="1 respuesta" value="{{$respuesta->respuesta}}">
                                            <input class="form-control" hidden name="numero{{$contador6++}}" placeholder="1 respuesta" value="{{$respuesta->id}}">
                                            @if ($respuesta->verdadera != null)
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" id="inlineCheckbox1" checked name="verdadero{{$contador3++}}" value="1">
                                                    ¿Verdadera?
                                                </label>
                                                @else
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" id="inlineCheckbox1" name="verdadero{{$contador3++}}" value="1">
                                                    ¿Verdadera?
                                                </label>
                                            @endif
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-form-label col-md-3">Pregunta Score:</label>
                            <div class="col-md-4">
                                <input id="touch-spin-2" value="{{$pregunta->score}}" required data-toggle="touch-spin" data-min="0" data-max="100" data-step="5" type="text" name="score" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="btn btn-success">Actalizar Pregunta</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach




    <div class="modal fade" id="editQuiz">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title">Agregar Pregunta</h5>
                </div>
                <div class="modal-body">
                    <form action="{{url('quiz_preguta_crear/'.$quiz->id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="" class="col-form-label col-md-3">Titulo:</label>
                            <div class="col-md-9">
                                <input type="text" name="titulo_pregunta" required class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-form-label col-md-3">Tipo:</label>
                            <div class="col-md-4">
                                <select class="custom-control custom-select form-control" id="tipo_respuesta" name="tipo_respuesta" onchange="tipo_respuestas()" required>
                                    <option value="">Seleccione un tipo</option>
                                    <option value="1">Texto</option>
                                    <option value="2">Selección Multiple</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-form-label col-md-3">Respuestas:</label>
                            <div class="col-md-9" id="respuestas">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-form-label col-md-3">Pregunta Score:</label>
                            <div class="col-md-4">
                                <input id="touch-spin-2" required data-toggle="touch-spin" data-min="0" data-max="100" data-step="5" type="text" name="score" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editQuiz2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title">Editar Pregunta</h5>
                </div>
                <div class="modal-body">
                    <form action="{{url('quiz_preguta_crear/'.$quiz->id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="" class="col-form-label col-md-3">Titulo:</label>
                            <div class="col-md-9">
                                <input type="text" name="titulo_pregunta" required class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-form-label col-md-3">Tipo:</label>
                            <div class="col-md-4">
                                <select class="custom-control custom-select form-control" id="tipo_respuesta" name="tipo_respuesta" onchange="tipo_respuestas()" required>
                                    <option value="">Seleccione un tipo</option>
                                    <option value="1">Texto</option>
                                    <option value="2">Selección Multiple</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-form-label col-md-3">Respuestas:</label>
                            <div class="col-md-9" id="respuestas">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-form-label col-md-3">Pregunta Score:</label>
                            <div class="col-md-4">
                                <input id="touch-spin-2" required data-toggle="touch-spin" data-min="0" data-max="100" data-step="5" type="text" name="score" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




@stop