@extends('layouts.principal')

@section('content')
    <div class="mdk-drawer-layout__content">


        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href={{url('app/public/')}}"">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{url('curso')}}">Cursos</a></li>
            <li class="breadcrumb-item active">Perfil Curso</li>
        </ol>

        <div class="media">
            <div class="media-body">
                <h1 class="page-heading h2">
                    {{$curso->nombre}}
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Información basica del Curso: {{$curso->nombre}}</h4>
                    </div>
                    <div class="card-block">

                        <div class="form-group">
                            <div align="center" class="col-md-12">
                                <img align="center" src="{{asset('img/usuario/'.$curso->imagen)}}"
                                     style="width: 200px">
                            </div>
                            <div class="col-md-12" style="max-height: 600px;overflow: scroll">
                                <strong>Descripción:</strong> <span><?= $curso->descripcion; ?></span>
                            </div>


                        </div>

                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="embed-responsive embed-responsive-16by9">
                        <video align="center" src="{{asset('video/curso/'.$curso->video_promo)}}" style=""></video>
                    </div>
                    <div class="card-block" align="center">
                        <label><b>Video Promocional</b></label>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Datos Adicionales</h4>
                    </div>

                    <form class="form-horizontal card-block">
                        <div class="form-group row">
                            <label for="select" class="col-sm-6 col-form-label"><b>Categoria: </b></label>
                            <label for="select" class="col-sm-6 col-form-label">{{$curso->nombre}}</label>
                        </div>
                        <!--  <div class="form-group row">
                              <label for="duration" class="col-sm-6 col-form-label">Duration</label>
                              <div class="col-sm-6">
                                  <input type="text" class="form-control" placeholder="No. of Days" value="10">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="start" class="col-sm-6 col-form-label">Start Date</label>
                              <div class="col-sm-6">
                                  <input class="datepicker form-control" type="text" value="01/28/2016"/>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="end" class="col-sm-6 col-form-label">End Date</label>
                              <div class="col-sm-6">
                                  <input class="datepicker form-control" type="text" value="01/28/2016"/>
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="details">Completion Badge</label>
                              <div>
                                  <div data-toggle="buttons">
                                      <label class="btn btn-white btn-circle active">
                                          <input type="radio" name="options" id="option1" autocomplete="off" checked>
                                          <i class="material-icons">person</i>
                                      </label>
                                      <label class="btn btn-white btn-circle">
                                          <input type="radio" name="options" id="option2" autocomplete="off">
                                          <i class="material-icons">star</i>
                                      </label>
                                      <label class="btn btn-white btn-circle">
                                          <input type="radio" name="options" id="option3" autocomplete="off">
                                          <i class="material-icons">shop</i>
                                      </label>
                                      <label class="btn btn-white btn-circle">
                                          <input type="radio" name="options" id="option3" autocomplete="off">
                                          <i class="material-icons">monetization_on</i>
                                      </label>
                                      <label class="btn btn-white btn-circle">
                                          <input type="radio" name="options" id="option3" autocomplete="off">
                                          <i class="material-icons">enhanced_encryption</i>
                                      </label>
                                  </div>
                              </div>
                          </div>-->
                    </form>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Modulos</h4>
                    </div>
                    <div class="card-block">
                        <br>
                        <p><a href="{{url('new_modulo')}}" class="btn btn-primary">Agregar Modulo <i
                                        class="material-icons">add</i></a></p>
                        <br>
                        <div class="">
                            <ul style="list-style-type: none;">
                                @foreach($modulos as $modulo)
                                    <li class="">

                                        <div class="">
                                            <div class="media-left media-middle">
                                                <img align="center" src="{{asset('img/modulo/'.$modulo->imagen)}}"
                                                     width="100" class="rounded">
                                            </div>
                                            <div class="media-body media-middle">
                                                <h5 class="card-title h6 mb-0">
                                                    <a href="{{url('modulo/'.$modulo->id.'/editar')}}">{{$modulo->nombre}}</a>
                                                </h5>
                                                <small class="text-muted">{{$modulo->descripcion}}</small>
                                                <br>

                                                <small class="text-muted">Fecha de
                                                    Creación: <?php $date = $curso->created_at;
                                                    echo $date->format('d/m/Y');?></small>
                                            </div>
                                        </div>

                                    </li>
                                    <br>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


@stop
