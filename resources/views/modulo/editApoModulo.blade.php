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
                <li class="breadcrumb-item"><a href="{{url('subirmaterialdeapoyo_modulo')}}">Material de Apoyo</a></li>
                <li class="breadcrumb-item active">Editar Material para Modulos</li>
            </ol>

            <div class="media">
                <div class="media-body">
                    <h1 class="page-heading h2">
                        Editar Material para Modulos
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-block">

                            <form id="formu" name="formu" action="{{url('editando_material_modulo/'.$material->id)}}" method="post" class="form-horizontal" accept-charset="UTF-8" enctype="multipart/form-data">
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
                                    <label for="curso_id"><b style="color:red;">* </b><b>Modulo Asignado</b></label>

                                    <select name="modulo" class="custom-select form-control">

                                        <option selected value="{{$material->modulo_id}}">{{$modulo->nombre}}</option>
                                        @foreach($modulos as $modulo)
                                            <option value="{{$modulo->id}}">{{$modulo->nombre}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <br>
                                <div class="col-md-12">
                                    <div class="media-right media-middle">
                                        <input class="btn btn-success" type="submit" value="Editar">
                                    </div>
                                    <div class="media-right media-middle">
                                        <a class="btn btn-success" type="submit" href="{{ url('subirmaterialdeapoyo_modulo') }}">Volver</a>
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
