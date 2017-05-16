@extends('layouts.principal')
@section('content')

    <div class="mdk-drawer-layout mdk-js-drawer-layout" push has-scrolling-region>
        <div class="mdk-drawer-layout__content">


            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{url('foros')}}">Foros</a></li>
                <li class="breadcrumb-item active">{{$foro[0]->title}}</li>

            </ol>

            @if($message=Session::has('message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    {{Session::get('message')}}
                </div>
            @endif

            <div class="media page-heading">
                <div class="media-body media-middle">
                    <h1 class="h2">Foro de {{$foro[0]->title}}</h1>
                    <p class="text-muted small">Por {{$foro[0]->user->name}} {{$foro[0]->user->apellidos}}
                        | {{$foro[0]->created_at}}</p>
                </div>
                <div class="media-right">
                    <a href="#" class="btn btn-white btn-circle"><i class="material-icons">comment</i></a>
                </div>
            </div>

            <?php
            $post = \DevDojo\Chatter\Models\Post::where('chatter_discussion_id', '=', $foro[0]->id)->get();
            ?>

            @foreach($post as $post)
                <div class="media">
                    <div class="media-left text-xs-center">
                        <img src="{{asset('img/usuario/'.$post->user->avatar)}}" alt="" class="rounded-circle"
                             width="40">
                    </div>
                    <div class="media-body">
                        <div class="card card-block">
                            <p><a href="student-profile.html">{{$post->user->name}} {{$post->user->apellidos}}</a>
                                <small class="text-muted">{{$post->created_at}}</small>
                                <small><i class="material-icons">edit</i></small>
                                <small><i class="material-icons">delete</i></small>
                            </p>
                            <p><?= $post->body; ?></p>
                            <!-- <a href="#" class="btn btn-sm btn-white">
                                 <i class="material-icons btn__icon--left">reply</i> Responder
                             </a>-->
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="card" id="agregarcomentario">
                <div class="card-header">
                    <h4 class="card-title">Comentar</h4>
                </div>
                <form action="/foros/agregarcomentario" method="post">
                    {{ csrf_field() }}
                    <textarea id="summernote" name="body"></textarea>
                    <input name="discussion" value="{{$foro[0]->id}}" hidden="">
                    <input name="slug" value="{{$foro[0]->slug}}" hidden="">
                    <div class="card-block text-xs-right">
                        <button class="btn btn-primary" type="submit">Agregar comentario</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
@stop