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
                <li class="breadcrumb-item"><a href="{{url('materia')}}">Materias</a></li>
                <li class="breadcrumb-item active">Editar Materias</li>
            </ol>

            <div class="media">
                <div class="media-body">
                    <h1 class="page-heading h2">
                        Editar Materias
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-block">

                            <form id="formu" name="formu" action="{{url('editando_materia/'.$materia->id)}}" method="post" class="form-horizontal" accept-charset="UTF-8" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group col-md-6">
                                    <label for="nombre"><b style="color:red;">* </b><b>Nombre del Modulo</b></label>
                                    <input required name="nombre" type="text" class="form-control" value="{{$materia->nombre}}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="curso_id"><b style="color:red;">* </b><b>Modulo Asignado</b></label>

                                    <select name="modulo_id" class="custom-select form-control">

                                        <option selected value="{{$materia->modulo_id}}">{{$modulo->nombre}}</option>
                                        @foreach($modulos as $modulos)
                                            <option value="{{$modulos->id}}">{{$modulos->nombre}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group col-md-6">
                                    <label for="descripcion"><b style="color:red;">* </b><b>Descripcion</b></label>
                                    <textarea style="height: 300px" required name="descripcion" class="form-control">{{$materia->descripcion}}</textarea>
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
    </div>


@stop
