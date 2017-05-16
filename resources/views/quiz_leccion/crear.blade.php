@extends('layouts.principal')
@section('content')
    <div class="mdk-drawer-layout__content">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href={{url('/')}}"">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{url('quiz')}}">Quiz Editar</a></li>
            <li class="breadcrumb-item active">Quiz Edición</li>
        </ol>
    </div>
    <h1 class="page-heading h2">Creación de Quiz</h1>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Datos Basicos</h4>
        </div>
        <div class="card-block">
            <form action="quiz_leccion_guardar" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="course_title" class="col-sm-3 col-form-label"><b style="color:red;">* </b><b>Quiz Titulo</b>:</label>
                    <div class="col-sm-9 col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">#</span>
                            <input required type="text" name="titulo" class="form-control" placeholder="Titulo" aria-describedby="sizing-addon2" value="">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="course_title" class="col-sm-3 col-form-label"><b style="color:red;">* </b><b>Lección</b>:</label>
                    <div class="col-sm-9 col-md-4">
                        <select name="leccion_id" class="form-control">
                            <option value="">Selecciona una Leccion</option>
                            @foreach($lecciones as $lecciones)
                                <option value="{{$lecciones->id}}">{{$lecciones->titulo}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="course_title" class="col-sm-3 col-form-label"><b style="color:red;">* </b><b>Quiz Imagen</b>:</label>
                    <div class="col-sm-9 col-md-4">
                        <input type="file" name="imagen" required class="form-control-file">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="course_title" class="col-sm-3 col-form-label"><b style="color:red;">* </b><b>Score</b>:</label>
                    <div class="col-sm-9 col-md-4">
                        <input type="number" name="score" required class="form-control">
                    </div>
                </div>

                <button type="submit" class="btn btn-block btn-success">Crear quiz</button>
            </form>
        </div>
    </div>














@stop