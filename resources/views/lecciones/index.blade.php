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
                <li class="breadcrumb-item active">Lecciones</li>
            </ol>
            <h1 class="page-heading h2">Lecciones</h1>
            <div class="row">
                <div class="col-md-12">



                    <a type="button" href="{{url('new_leccion')}}" class="btn btn-success">
                        <i class="material-icons btn__icon--left">done</i> Crear Nueva Leccion
                    </a>



                    <br>
                    <!-- Lessons -->
                    <div>

                        <br>
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Nombre dela Leccion</th>
                                <th>Lección</th>
                                <th>Descripcion</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Nombre dela Leccion</th>
                                <th>Lección</th>
                                <th>Descripcion</th>
                                <th>Opciones</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($leccion as $leccion)
                                <tr>
                                    <td>{{$leccion->titulo}}</td>
                                    <td>{{$leccion->nombre_materia}}</td>
                                    <td>{{$leccion->descripcion}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="leccion/{{$leccion->id}}/editar">Editar</a>
                                                <a class="dropdown-item" href="eliminar_leccion/{{$leccion->id}}">Eliminar</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>

        </div>
    </div>


@stop
