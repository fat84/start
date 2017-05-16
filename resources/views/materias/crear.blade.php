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
                <li class="breadcrumb-item"><a href="app/public/">Inicio</a></li>
                <li class="breadcrumb-item"><a href="materia">materias</a></li>
                <li class="breadcrumb-item active">Crear materia</li>
            </ol>

            <div class="media">
                <div class="media-body">
                    <h1 class="page-heading h2">
                        Crear Materia
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

                            <form id="formu" name="formu" action="guardar_materia" method="post" class="form-horizontal" accept-charset="UTF-8" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group col-md-6">
                                    <label for="nombre"><b style="color:red;">* </b><b>Nombre de la Materia</b></label>
                                    <input required name="nombre" type="text" class="form-control" placeholder="Digite el nombre de la materia">
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="empresa_id"><b style="color:red;">* </b><b>Modulo al que pertenece</b></label>

                                    <select name="modulo_id" class="custom-select form-control">
                                        <option selected disabled>Seleccione una modulo</option>
                                        @foreach($modulo as $modulo)

                                            <option value="{{$modulo->id}}">{{$modulo->nombre}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="descripcion"><b style="color:red;">* </b><b>Descripcion</b></label>
                                    <textarea required name="descripcion" rows="3" style="resize: none;height: 300px" class="form-control" placeholder="Digita un breve descripcion de la materia"></textarea>
                                </div>


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
