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
                <li class="breadcrumb-item"><a href="{{url('modulo')}}">Modulos</a></li>
                <li class="breadcrumb-item active">Editar Modulo</li>
            </ol>

            <div class="media">
                <div class="media-body">
                    <h1 class="page-heading h2">
                        Editar Modulo
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                            <div class="card-block">

                            <form id="formu" name="formu" action="{{url('editando_modulo/'.$modulo->id)}}" method="post" class="form-horizontal" accept-charset="UTF-8" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group col-md-6">
                                    <label for="nombre"><b style="color:red;">* </b><b>Nombre del Modulo</b></label>
                                    <input required name="nombre" type="text" class="form-control" value="{{$modulo->nombre}}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="curso_id"><b style="color:red;">* </b><b>Curso Asignada</b></label>

                                    <select name="curso_id" class="custom-select form-control">

                                        <option selected value="{{$modulo->curso_id}}">{{$nom_curso->nombre}}</option>
                                        @foreach($cursos as $curso)
                                            <option value="{{$curso->id}}">{{$curso->nombre}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group col-md-6">
                                    <label for="descripcion"><b style="color:red;">* </b><b>Descripcion</b></label>
                                    <textarea style="height: 300px" required name="descripcion" id="contenido" class="form-control">{{$modulo->descripcion}}</textarea>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#contenido').summernote({
                                            lang: 'es-ES',
                                            height: 300,                 // set editor height
                                            minHeight: null,             // set minimum height of editor
                                            maxHeight: null,             // set maximum height of editor
                                            focus: true   ,
                                            shortcuts: false     // set focus to editable area after initializing summernote
                                        });
                                    });
                                </script>

                                <div class="form-group col-md-6">
                                    <label for="imagen" class="col-sm-3 col-form-label">Imagen</label>
                                    <div class="col-sm-9">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="icon-block rounded">
                                                    <img src="{{asset('img/modulo/'.$modulo->imagen)}}" style="width: 60px">
                                                </div>
                                            </div>
                                            <div class="media-body media-middle">
                                                <label class="custom-file m-0">
                                                    <input type="file" name="imagen" id="file" accept="image/*">
                                                    <!--<span class="custom-file-control"></span>-->
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
