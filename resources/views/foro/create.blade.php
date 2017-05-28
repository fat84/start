@extends('layouts.principal')
@section('content')

    <div class="mdk-drawer-layout mdk-js-drawer-layout" push has-scrolling-region>
        <div class="mdk-drawer-layout__content">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{url('foros')}}">Crear foro</a></li>

            </ol>
        </div>
    </div>

            @if($message=Session::has('message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    {{Session::get('message')}}
                </div>
            @endif


            <h1 class="page-heading h2">Creación de Foro</h1>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Datos Basicos</h4>
                </div>
                <div class="card-block">
                    <form action="crear_foro_general" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="course_title" class="col-sm-3 col-form-label"><b style="color:red;">* </b><b>Nombre del foro</b>:</label>
                            <div class="col-sm-9 col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2">#</span>
                                    <input required type="text" name="titulo" class="form-control" placeholder="Titulo" aria-describedby="sizing-addon2" value="">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-block btn-success">Crear foro</button>
                    </form>
                </div>
            </div>
@stop