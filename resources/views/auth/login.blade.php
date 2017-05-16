@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col-sm-8 push-sm-1 col-md-4 push-md-4 col-lg-4 push-lg-4">
            <div class="text-xs-center m-2">
                <img src="{{asset('images/logo_startclik.png')}}" style="width: 300px">
               <!-- <div class="icon-block rounded-circle">
                    <i class="material-icons md-36 text-muted">lock</i>
                </div>-->
            </div>

            <div class="card bg-transparent">
                <div class="card-header bg-white text-xs-center">
                    <h4 class="card-title">Login</h4>
                    <p class="card-subtitle">Accede a tu cuenta</p>
                </div>
                <div class="p-2">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Correo Electronico">
                            @if ($errors->has('email'))
                                <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="password" type="password" placeholder="Contraseña" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordar
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <button type="submit" class="btn  btn-primary btn-block">
                                <span class="btn-block-text">Iniciar Sesión</span>
                            </button>
                        </div>
                        <div class="text-xs-center">
                            <a href="{{ route('password.request') }}"><small>Olvidaste la contraseña?</small></a>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-xs-center bg-white">
                    No tienes una cuenta? <a href="{{url('/register')}}">Registrate</a>
                </div>
            </div>
        </div>
    </div>





@endsection
