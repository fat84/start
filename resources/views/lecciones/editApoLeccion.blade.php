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
                <li class="breadcrumb-item"><a href="{{url('app/public/')}}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{url('subirmaterialdeapoyo_leccion')}}">Material de Apoyo</a></li>
                <li class="breadcrumb-item active">Editar Material para Lecciones</li>
            </ol>

            <div class="media">
                <div class="media-body">
                    <h1 class="page-heading h2">
                        Editar Material para Lecciones
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-block">

                            <form id="formu" name="formu" action="{{url('editando_material_leccion/'.$material->id)}}" method="post" class="form-horizontal" accept-charset="UTF-8" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group col-md-6">
                                    <label for="nombre"><b style="color:red;">* </b><b>Nombre del material</b></label>
                                    <input required name="nombre" type="text" class="form-control" value="{{$material->nombre}}">
                                    <label for="nombre"><b style="color:red;">* </b><b>Archivo Actual</b></label>
                                    <a href="{{url('archivos/materialapoyo/'.$material->url)}}" download="">{{$material->nombre}}</a>

                                    <label for="imagen"><b style="color:red;">* </b><b>Sustituir Archivo</b></label>
                                    <input type="file" class="form-control" name="archivo" id="archivo">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="curso_id"><b style="color:red;">* </b><b>Leccion Asignada</b></label>

                                    <select name="leccion" class="custom-select form-control">

                                        <option selected value="{{$material->leccion_id}}">{{$leccion->titulo}}</option>
                                        @foreach($lecciones as $leccion)
                                            <option value="{{$leccion->id}}">{{$leccion->titulo}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <br>
                                <div class="col-md-12">
                                    <div class="media-right media-middle">
                                        <input class="btn btn-success" type="submit" value="Editar">
                                    </div>
                                    <div class="media-right media-middle">
                                        <a class="btn btn-success" type="submit" href="{{ url('subirmaterialdeapoyo_leccion')}}">Volver</a>
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
