@extends('layouts.principal')
@section('content')
    <div class="mdk-drawer-layout__content">
        @if($message=Session::has('message'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                {{Session::get('message')}}
            </div>
        @endif

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href={{url('app/public/')}}"">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{url('quiz')}}">Quiz</a></li>
            <li class="breadcrumb-item active">Quizes</li>
        </ol>

        <div class="media">
            <div class="media-body media-middle">
                <h1 class="page-heading h2">Quizes</h1>
            </div>
            <div class="media-right media-middle">
                <a href="nuevoquiz" class="btn btn-success">Nuevo Quiz <i class="material-icons btn__icon--right">add</i></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="card-columns">
                   @foreach($quiz as $quiz)
                    <div class="card">
                        <div class="card-block media">
                            <div class="media-left media-middle">
                                <a href="#">
                                    <img src="{{asset('img/usuario/'.$quiz->imagen)}}" alt="Card image cap" width="80" class="rounded">
                                </a>
                            </div>
                            <div class="media-body media-middle">
                                <h4 class="card-title mb-0"><a href="fixed-instructor-review-quiz.html">{{$quiz->titulo}}</a></h4>
                                <!--<small class="text-muted">25 Completados</small>-->
                            </div>
                        </div>
                        <div class="card-footer text-xs-center">
                            <a href="#" class="btn btn-primary btn-sm float-xs-left"><i class="material-icons btn__icon--left">playlist_add_check</i> Completados <span class="tag text-primary bg-white btn__icon--right">0</span></a>
                            <a href="quizEdit/{{$quiz->id}}" class="btn btn-default btn-sm float-xs-right"><i class="material-icons btn__icon--left">edit</i> Editar </a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>


    </div>
@stop