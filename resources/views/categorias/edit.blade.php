@extends('layouts.principal')
@section('content')
    <div class="mdk-drawer-layout__content">
        <div class="container-fluid">
            <div class="container">

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
                                Editar Categoria
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-block">
                                {!! Form::model($categorias,['route'=>['categorias.update',$categorias->id],'method'=>'PUT']) !!}
                                {{ csrf_field() }}
                                @if(count($errors) > 0)
                                    <div class="alert alert-danger sing-box" role="alert">
                                        <ul>
                                            @foreach($errors->all() as $errors)
                                                <li>{!! $errors !!}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="col-lg-6">
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">Nombre Categoria</label>
                                        {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombres']) !!}
                                    </fieldset>
                                    <button type="submit" class="btn btn-primary btn-space">Actualizar Categoria</button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop