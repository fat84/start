@extends('layouts.principal')
@section('content')
    <div class="mdk-drawer-layout__content">


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
                                <h3>Bienvenido, {{Auth::user()->name}} {{Auth::user()->apellidos}}</h3>
                                <span style="text-transform: uppercase;">{{Auth::user()->rol}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-block">

                                <div class="card-columns">

                                   <?php
                                    $cursos = \App\Curso::All();
                                    ?>
                                       @foreach($cursos as $curso)
                                           <div class="card">
                                               <div class="card-header bg-white text-xs-center">
                                                   <h4 class="card-title"><a
                                                               href="{{url('cursos/'.str_replace(' ', '',$curso->nombre).'/'.$curso->id)}}">{{$curso->nombre}}</a>
                                                   </h4>
                                               </div>
                                               <a  href="{{url('cursos/'.str_replace(' ', '',$curso->nombre).'/'.$curso->id)}}">
                                                   <img src="{{asset('img/usuario/'.$curso->imagen)}}" alt="Card image cap"
                                                        style="width:100%;">
                                               </a>
                                               <div class="card-block">
                                                   <small class="text-muted">{{$curso->categoria->nombre}}</small>
                                                   <br>
                                                   @if(strlen($curso->descripcion) > 20)
                                                    <?=substr($curso->descripcion,0,1000)."..."?>
                                                   @endif
                                                   <span class="tag tag-primary"></span>
                                               </div>
                                               <style>
                                                   .precio:hover{
                                                       background-color: #0a9fe2;
                                                       color: white;
                                                   }
                                               </style>
                                               <a class="precio" href="{{url('cursos/'.str_replace(' ', '',$curso->nombre).'/'.$curso->id)}}">
                                                   <div class="card-footer precio" style="text-align: center">
                                                       <h5>$ {{number_format($curso->precio)}} COP</h5>
                                                   </div>
                                               </a>
                                           </div>
                                       @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




    </div>
@stop