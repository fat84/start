@extends('layouts.principal')
@section('content')
    <div class="mdk-drawer-layout__content">


                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Cursos</a></li>
                        <li class="breadcrumb-item active"><a href="#">{{$curso->nombre}}</a></li>
                    </ol>
                    <h1 class="page-heading h2">{{$curso->nombre}}</h1>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <img align="center" src="{{asset('img/usuario/'.$curso->imagen)}}"
                                     style="width: 100%">
                                @if($curso->video_promo != '')
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item"
                                                src="{{asset('video/curso/'.$curso->video_promo)}}"
                                                allowfullscreen=""></iframe>
                                    </div>
                                @endif

                                <div class="card-block"  style="max-height: 500px;overflow: scroll">
                                    <?=$curso->descripcion?>
                                </div>
                            </div>


                        </div>





                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-block text-xs-center">
                                    <p>
                                        <form method="post" action="{{url('/addcarrito')}}">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-success btn-block btn--col">
                                                Comprar Curso
                                                <strong>$ {{number_format($curso->precio)}} COP</strong>
                                            </button>
                                            <input name="curso_id" hidden value="{{$curso->id}}">
                                        </form>
                                    </p>


                                    <!-- Lessons -->
                                    <h3>Modulos</h3>
                                    <ul class="card list-group list-group-fit">
                                        @foreach($modulo as $modulo)
                                            <li class="list-group-item">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <div class="text-muted">1.</div>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="text-muted-light">{{$modulo->nombre}}</div>
                                                    </div>
                                                    <div class="media-right">
                                                        <small class="text-muted-light">2:03</small>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                   <!-- <p class="text-muted-light">or</p>
                                    <a href="fixed-student-cart.html" class="btn btn-white btn-block">
                                        Purchase this course
                                        for $25
                                    </a>-->
                                </div>
                            </div>












                            <!--<div class="card">
                                <div class="card-header bg-white">
                                    <div class="media">
                                        <div class="media-left media-middle">
                                            <img src="assets/images/people/110/guy-6.jpg" alt="About Adrian" width="50" class="rounded-circle">
                                        </div>
                                        <div class="media-body media-middle">
                                            <h4 class="card-title"><a href="fixed-student-profile.html">Adrian Demian</a></h4>
                                            <p class="card-subtitle">Instructor</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <p>Having over 12 years exp. Adrian is one of the lead UI designers in the industry Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, aut.</p>
                                    <a href="" class="btn btn-default">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="" class="btn btn-default">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="" class="btn btn-default"><i class="fa fa-github"></i></a>
                                </div>
                            </div>
                            <div class="card">
                                <ul class="list-group list-group-fit">
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-left">
                                                <i class="material-icons text-muted-light">assessment</i>
                                            </div>
                                            <div class="media-body media-middle">
                                                Beginner
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-left">
                                                <i class="material-icons text-muted-light">schedule</i>
                                            </div>
                                            <div class="media-body media-middle">
                                                2 <small class="text-muted">hrs</small> &nbsp; 26 <small class="text-muted">min</small>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Ratings</h4>
                                </div>
                                <div class="card-block">
                                    <div class="rating">
                                        <i class="material-icons">star</i>
                                        <i class="material-icons">star</i>
                                        <i class="material-icons">star</i>
                                        <i class="material-icons">star</i>
                                        <i class="material-icons">star_border</i>
                                    </div>
                                    <small class="text-muted">20 ratings</small>
                                </div>
                            </div>-->
                        </div>
                    </div>











    </div>
@stop