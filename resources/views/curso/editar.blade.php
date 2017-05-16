@extends('layouts.principal')
@section('content')
    <div class="mdk-drawer-layout__content">
        <div class="container-fluid">

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('app/public/')}}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{url('curso')}}">Cursos</a></li>
                <li class="breadcrumb-item active">Editar Curso</li>
            </ol>

            <div class="media">
                <div class="media-body">
                    <h1 class="page-heading h2">
                        Editar Curso
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                            <div class="card-block">

                            <form id="formu" name="formu" action="{{url('editando_curso/'.$curso->id)}}" method="post" class="form-horizontal" accept-charset="UTF-8" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group col-md-6">
                                    <label for="nombre"><b style="color:red;">* </b><b>Nombre del Curso</b></label>
                                    <input required name="nombre" type="text" class="form-control" value="{{$curso->nombre}}">
                                </div>

                                <div class="form-group col-md-6">

                                    <label for="video_promo" class="col-sm-3 col-form-label">Video Actual</label>
                                    <video src="{{asset('video/curso/'.$curso->video_promo)}}" controls style="width: 200px"></video>

                                    <label for="video_promo" class="col-sm-3 col-form-label">Video Promocional</label>
                                    <div class="col-sm-9">
                                                    <input name="video_promo" type="file" class="form-control" id="file" accept="video/*">
                                                    <!--<span class="custom-file-control"></span>-->

                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="categoria_id"><b style="color:red;">* </b><b>Categoria</b></label>

                                    <select name="categoria_id" class="custom-select form-control">

                                        <option selected value="{{$curso->categoria_id}}">{{$nom_cate->nombre}}</option>
                                        @foreach($categorias as $categoria)
                                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group col-md-6">
                                    <label for="empresa_id"><b style="color:red;">* </b><b>Empresa</b></label>

                                    <select name="empresa_id" class="custom-select form-control">

                                        <option selected value="{{$curso->empresa_id}}">{{$nom_emp->razon_social}}</option>
                                        @foreach($empresas as $empre)
                                            <option value="{{$empre->id}}">{{$empre->razon_social}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group col-md-6">
                                    <label for="descripcion"><b style="color:red;">* </b><b>Descripcion</b></label>
                                    <textarea id="descripcion" name="descripcion" style="height: 220px" class="form-control">{{$curso->descripcion}}</textarea>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#descripcion').summernote({
                                            lang: 'es-ES',
                                            height: 300,                 // set editor height
                                            minHeight: null,             // set minimum height of editor
                                            maxHeight: null,             // set maximum height of editor
                                            focus: true                  // set focus to editable area after initializing summernote
                                        });
                                    });
                                </script>

                                <div class="form-group col-md-6">
                                    <label for="avatar" class="col-sm-3 col-form-label">Avatar</label>
                                    <div class="col-sm-9">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="icon-block rounded">
                                                    <img src="{{asset('img/usuario/'.$curso->imagen)}}" style="width: 60px">
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
                                    <div class="form-group">
                                        <label><b style="color:red;">* </b><b>Precio</b></label>
                                        <input class="form-control" name="precio" value="{{$curso->precio}}">
                                    </div>
                                </div>


                                <br>
                                <div class="col-md-12">
                                    <div class="media-right media-middle">
                                        <input class="btn btn-success" type="submit" value="Editar">
                                    </div>
                                    <div class="media-right media-middle">
                                        <a class="btn btn-success" type="submit" href="{{url('curso')}}">Volver</a>
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
