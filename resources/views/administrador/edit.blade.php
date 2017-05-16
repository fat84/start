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
                                Editar Administrador
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-block">
                                {!! Form::model($administrador,['route'=>['administrador.update',$administrador->id],'method'=>'PUT']) !!}
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
                                        <label for="exampleInputEmail1">Nombres</label>
                                        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombres']) !!}
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">Apellidos</label>
                                        {!! Form::text('apellidos',null,['class'=>'form-control','placeholder'=>'Apellidos']) !!}
                                    </fieldset>
                                    <div class="form-group">
                                        <label>Tipo Documento</label>
                                        {!! Form::select('tipo_documento', [
                                          'Cedula ciudadania' => 'Cedula ciudadania',
                                          'Cedula extranjera' => 'Cedula extranjera',
                                          'Nit' => 'Nit',],null,['class' => 'form-control']
                                                              ) !!}
                                    </div>
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">Documento</label>
                                        {!! Form::text('documento',null,['class'=>'form-control','placeholder'=>'Documento']) !!}
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">Correo Electronico</label>
                                        {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'Correo electronico']) !!}
                                    </fieldset>

                                </div>
                              <div class="col-lg-6">

                                  <fieldset class="form-group">
                                      <label for="exampleInputEmail1">Direccion</label>
                                      {!! Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Direccion']) !!}
                                  </fieldset>
                                  <fieldset class="form-group">
                                      <label for="exampleInputEmail1">Telefono</label>
                                      {!! Form::text('telefono',null,['class'=>'form-control','placeholder'=>'Telefono']) !!}
                                  </fieldset>
                                  <fieldset class="form-group">
                                      <label for="exampleInputEmail1">Contraseña</label>
                                      <input type="password" class="form-control" name="password" placeholder="Contraseña">
                                  </fieldset>
                                  <button type="submit" class="btn btn-primary btn-space">Actualizar Administrador</button>
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