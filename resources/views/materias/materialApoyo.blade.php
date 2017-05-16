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
                <li class="breadcrumb-item"><a href="subirmaterialdeapoyo">material de apoyo</a></li>
                <li class="breadcrumb-item active">Subir material de apoyo</li>
            </ol>

            <div class="media">
                <div class="media-body">
                    <h1 class="page-heading h2">
                        Subir materia de apoyo
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

                            <form id="formu" name="formu" action="guardar_materialApoyo" method="post" class="form-horizontal" accept-charset="UTF-8" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group col-md-6">
                                    <label for="nombre"><b style="color:red;">* </b><b>Nombre</b></label>
                                    <input required name="nombre" type="text" class="form-control" placeholder="Digite el nombre del material de apoyo">

                                    <label for="imagen"><b style="color:red;">* </b><b>Archivo</b></label>
                                    <input type="file" class="form-control" name="archivo" id="archivo">
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="empresa_id"><b style="color:red;">* </b><b>Materia al que pertenece</b></label>

                                    <select name="materia" class="custom-select form-control">
                                        <option selected disabled>Seleccione una Materia</option>
                                        @foreach($materias as $materia)
                                            <option value="{{$materia->id}}">{{$materia->nombre}}</option>
                                        @endforeach
                                    </select>

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
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Material de apoyo</h4>
                        </div>
                        <div class="card-block">
                            <div>

                                <br>
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Materia</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Materia</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($materiales_apoyo as $material_apoyo)
                                        <tr>
                                            <td><a href="{{url('archivos/materialapoyo/'.$material_apoyo->url)}}" download="">{{$material_apoyo->nombre}}</a></td>
                                            <td>{{$material_apoyo->materia->nombre}}</td>
                                             <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="material/{{$material_apoyo->id}}/editar">Editar</a>
                                                        <a class="dropdown-item" href="eliminar_material/{{$material_apoyo->id}}">Eliminar</a>
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
    </div>


@stop
