@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col-sm-8 push-sm-1 col-md-4 push-md-4 col-lg-4 push-lg-4">
            <div class="text-xs-center m-2">
                <img src="{{asset('img/logoStart.png')}}" style="width: 300px">
                <!-- <div class="icon-block rounded-circle">
                     <i class="material-icons md-36 text-muted">lock</i>
                 </div>-->
            </div>
            <div class="card bg-transparent">
                <div class="card-header bg-white text-xs-center">
                    <h4 class="card-title">Recuperación de contraseña</h4>
                    <p class="card-subtitle"></p>
                </div>
                <div class="p-2">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class=" control-label">E-Mail Address</label>

                            <div class="">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
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
