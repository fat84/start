@extends('layouts.principal')

@section('content')
    <div class="mdk-drawer-layout__content">

        @if($message=Session::has('message'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                {{Session::get('message')}}
            </div>
        @endif
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('app/public/')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{url('leccion')}}">Leccion</a></li>
            <li class="breadcrumb-item active">Editar Leccion</li>
        </ol>

        <div class="media">
            <div class="media-body">
                <h1 class="page-heading h2">
                    Editar Leccion
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">

                        <form id="formu" name="formu" action="{{url('editando_leccion/'.$leccion->id)}}" method="post"
                              class="form-horizontal" accept-charset="UTF-8" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group col-md-6">
                                <label for="nombre"><b style="color:red;">* </b><b>Nombre de la leccion</b></label>
                                <input required name="titulo" type="text" class="form-control"
                                       value="{{$leccion->titulo}}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="curso_id"><b style="color:red;">* </b><b>Materia Asignada</b></label>

                                <select name="materia_id" class="custom-select form-control">
                                    <option selected value="{{$leccion->materia_id}}">{{$materia->nombre}}</option>
                                    @foreach($materias as $materias)
                                        <option value="{{$materias->id}}">{{$materias->nombre}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group col-md-12">
                                <label for="descripcion"><b style="color:red;">* </b><b>Descripcion</b></label>
                                <textarea style="height: 150px" required name="descripcion"
                                          class="form-control">{{$leccion->descripcion}}</textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="contenido"><b style="color:red;">* </b><b>Contenido</b></label>
                                <textarea style="height: 300px" required name="contenido" id="contenido"
                                          class="form-control">{{$leccion->contenido}}</textarea>
                            </div>


                            <script>
                                $(document).ready(function () {
                                    $('#contenido').summernote({
                                        lang: 'es-ES',
                                        height: 500,                 // set editor height
                                        minHeight: null,             // set minimum height of editor
                                        maxHeight: null,             // set maximum height of editor
                                        focus: true                  // set focus to editable area after initializing summernote
                                    });
                                });
                            </script>
                            <br>
                            <div class="col-md-12">
                                <div class="media-right media-middle">
                                    <input class="btn btn-success" type="submit" value="Editar">
                                </div>
                                <div class="media-right media-middle">
                                    <a class="btn btn-success" type="submit" href="{{ url()->previous() }}">Volver</a>
                                </div>

                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>


    </div>


@stop
