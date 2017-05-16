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
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        {{Session::get('message')}}
                    </div>
                @endif
                @if($message=Session::has('status'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        {{Session::get('status')}}
                    </div>
                @endif
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('miperfil')}}">Mi Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{url('seguridad')}}">Seguridad</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pagos" data-toggle="tab">Pagos</a>
                        </li>
                    </ul>

                    <div class="p-2 tab-content">
                        <div class="tab-pane active" id="seguridad">
                            <h5>Seguridad</h5>
                            <form action="actualizarPass" method="post">
                                {{csrf_field()}}
                                <fieldset class="form-group{{ $errors->has('passwordActual') ? ' has-error' : '' }}">
                                    <label for="exampleInputPassword1">Contraseña Actual</label>
                                    <input type="password" class="form-control" id="passwordActual" name="mypassword" placeholder="Contraseña Actual">
                                    @if ($errors->has('mypassword'))
                                        <span class="help-block" style="color: red;">
                                        <strong>{{ $errors->first('mypassword') }}</strong>
                                    </span>
                                    @endif
                                </fieldset>
                                <fieldset class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="exampleInputPassword1">Nueva Contraseña</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Nueva ccontraseña">

                                    @if ($errors->has('password'))
                                        <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="exampleInputPassword1">Confirmar Nueva contraseña</label>
                                    <input  id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Nueva ccontraseña">
                                </fieldset>
                                <button type="submit" class="btn btn-success">Actualizar contraseña</button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
