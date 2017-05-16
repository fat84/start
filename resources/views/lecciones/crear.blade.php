@extends('layouts.principal')

@section('content')
    <div class="mdk-drawer-layout__content">
        <div class="container-fluid">
            @if($message=Session::has('message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    {{Session::get('message')}}
                </div>
            @endif
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                <li class="breadcrumb-item"><a href="materia">Leccion</a></li>
                <li class="breadcrumb-item active">Crear leccion</li>
            </ol>

            <div class="media">
                <div class="media-body">
                    <h1 class="page-heading h2">
                        Crear Leccion
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Información Basica</h4>
                        </div>
                        <div class="card-block">

                            <form id="formu" name="formu" action="guardar_leccion" method="post" class="form-horizontal" accept-charset="UTF-8" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group col-md-6">
                                    <label for="nombre"><b style="color:red;">* </b><b>Titulo de la Leccion</b></label>
                                    <input required name="titulo" type="text" class="form-control" placeholder="Digite el nombre de la Leccion">
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="materia_id"><b style="color:red;">* </b><b>Materia al que pertenece</b></label>

                                    <select name="materia_id" class="custom-select form-control">
                                        <option selected disabled>Seleccione una Materia</option>
                                        @foreach($materia as $materia)

                                            <option value="{{$materia->id}}">{{$materia->nombre}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contenido"><b style="color:red;">* </b><b>Contenido</b></label>
                                    <textarea required name="contenido" id="contenido" rows="3" style="resize: none;" class="form-control" placeholder="Digita un breve descripcion de la leccion"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="descripcion"><b style="color:red;">* </b><b>Descripcion</b></label>
                                    <textarea required name="descripcion" rows="3" style="resize: none;height: 350px" class="form-control" placeholder="Digita un breve descripcion de la leccion"></textarea>
                                </div>

                                <script>
                                    $(document).ready(function() {
                                        $('#contenido').summernote({
                                            lang: 'es-ES',
                                            height: 300,                 // set editor height
                                            minHeight: null,             // set minimum height of editor
                                            maxHeight: null,             // set maximum height of editor
                                            focus: true                  // set focus to editable area after initializing summernote
                                        });
                                    });
                                </script>

                                <br>
                                <div class="col-md-12">
                                    <div class="media-right media-middle">
                                        <input class="btn btn-success" type="submit" value="Guardar">
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
    </div>


@stop
