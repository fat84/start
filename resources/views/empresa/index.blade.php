@extends('layouts.principal')
@section('content')
    <div class="mdk-drawer-layout__content">


        <!--   <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="fixed-student-dashboard.html">Home</a></li>
               <li class="breadcrumb-item active">Edit Account</li>
           </ol>-->
        @if($message=Session::has('message'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                {{Session::get('message')}}
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <h3>Bienvenido, {{Auth::user()->name}} {{Auth::user()->apellidos}}</h3>
                        <span style="text-transform: uppercase;">{{Auth::user()->rol}}</span>
                    </div>
                </div>
            </div>

            <div class="col-md-12">

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-block">
                          <center>

                    <h3>CURSOS</h3><h4>{{$contadorCurso}}</h4>
                          </center>

                        </div>

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-block">
                            <center>
                                <h3>INSCRITOS</h3>
                                <h4>{{$contadorIns}}</h4>
                            </center>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-block">
                            <center>
                                <h3>DINERO</h3>
                                @foreach($recibido as $reci)
                                <h4>$ {{number_format($reci->dinero, 0, ',', '.')}}</h4>
                                    @endforeach
                            </center>
                        </div>
                    </div>
                </div>




            </div>

            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Lista de Cursos con # de Inscritos</h4>
                    </div>
                    <div class="card-block">
                        <div>

                            <br>
                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Nombre Curso</th>
                                    <th>Precio</th>
                                    <th>Inscritos</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Nombre Curso</th>
                                    <th>Precio</th>
                                    <th>Inscritos</th>
                                    <th>Opciones</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($cursos as $curso)
                                    <tr>
                                        <td><a>{{$curso->nombre}}</a></td>
                                        <td>$ {{number_format($curso->precio, 0, ',', '.')}}</td>
                                        <td>{{$curso->contador}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="material_curso/{{$curso->id}}/editar">Lista de Inscritos</a>
                                                    <a class="dropdown-item" href="eliminar_material_curso/{{$curso->id}}">Informe de Suscripciones</a>
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
    </div>
@stop
