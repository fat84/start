@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col-sm-8 push-sm-1 col-md-4 push-md-3 col-lg-4 push-lg-4">
            <div class="text-xs-center m-2">
                <div class="text-xs-center m-2">
                    <img src="{{asset('images/logo_startclik.png')}}" style="width: 300px">
                    <!-- <div class="icon-block rounded-circle">
                         <i class="material-icons md-36 text-muted">lock</i>
                     </div>-->
                </div>

            </div>
            <div class="card">
                <div class="card-header bg-white text-xs-center">
                    <h4 class="card-title">Registro</h4>
                    <p class="card-subtitle">Crear una Cuenta</p>
                </div>
                <div class="p-2">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <input type="text" name="name" class="form-control" placeholder="Nombres" value="{{ old('name') }}" required>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('apellidos') ? ' has-error' : '' }}">
                            <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" value="{{ old('apellidos') }}" required>
                            @if ($errors->has('apellidos'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('apellidos') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="tipo_documento">
                                <option>CEDULA</option>
                                <option>TARJETA IDENTIDAD</option>
                            </select>
                        </div>

                        <div class="form-group{{ $errors->has('apellidos') ? ' has-error' : '' }}">
                            <input type="text" name="documento" class="form-control" placeholder="Numero Documento" value="{{ old('documento') }}" required>
                            @if ($errors->has('documento'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('documento') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" name="email" class="form-control" placeholder="Correo Electronico" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="password" type="password" class="form-control" name="password" required placeholder="Contraseña">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input  id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirmar contraseña">
                        </div>
                        <div class="form-group text-xs-center">
                            <label class="custom-control custom-checkbox m-0">
                                <input type="checkbox" class="custom-control-input" checked>
                                <span class="custom-control-indicator"></span>
                                Acepto <a href="#">Terminos y Condiciones</a>
                            </label>
                        </div>
                        <p class="text-xs-center">
                            <button type="submit" class="btn btn-primary btn-block">
                                <span class="btn-block-text">Crear Cuenta</span>
                            </button>
                        </p>
                        <div class="text-xs-center">Ya tienes una cuenta? <a href="{{url('/login')}}">Inicia Sesión</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
