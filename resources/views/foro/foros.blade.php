@extends('layouts.principal')
@section('content')
    <div class="mdk-drawer-layout__content">

        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">INICIO</a></li>
                <li class="breadcrumb-item active">Foros</li>
            </ol>
            <h1 class="page-heading">Foros</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="media">
                                <div class="media-body media-middle">
                                    <h4 class="card-title">General</h4>
                                    <p class="card-subtitle">Todos los temas no relacionados con el curso.</p>
                                </div>
                                <!-- <div class="media-right media-middle">
                                     <a href="#" class="btn btn-white btn-sm"><i class="material-icons">add</i></a>
                                 </div>-->
                            </div>
                        </div>
                        <ul class="list-group list-group-fit">
                            <li class="list-group-item forum-thread media">
                                <div class="media-left media-middle">
                                    <div class="forum-icon-wrapper">
                                    <!--  <a href="{{url('/forums/category/general')}}" class="forum-thread-icon">
                                                    <i class="material-icons">description</i>
                                                </a>
                                                <a href="#public-profile" class="forum-thread-user">
                                                    <img src="assets/images/people/50/guy-7.jpg" alt="" width="20" class="rounded-circle">
                                                </a>-->
                                    </div>
                                </div>
                                <div class="media-body media-middle">
                                    <a href="{{url('/foros/start/general')}}">Discusion General</a><br>
                                    <!--  <small>replied by <a href="#">Brian S.</a></small>-->
                                </div>
                                <!--<div class="media-right media-middle">
                                    <div style="width:80px;" class="text-xs-right">
                                        <small class="text-muted-light">5 min ago</small>
                                    </div>
                                </div>-->
                            </li>
                            <li class="list-group-item forum-thread media">
                                <div class="media-left media-middle">
                                    <div class="forum-icon-wrapper">
                                    <!--  <a href="{{url('/foros/start/general')}}" class="forum-thread-icon">
                                                    <i class="material-icons">description</i>
                                                </a>
                                                <a href="#public-profile" class="forum-thread-user">
                                                    <img src="assets/images/people/50/guy-7.jpg" alt="" width="20" class="rounded-circle">
                                                </a>-->
                                    </div>
                                </div>
                                <div class="media-body media-middle">
                                    <a href="{{url('/foros/start/soporte')}}">Soporte</a><br>
                                    <!--  <small>replied by <a href="#">Brian S.</a></small>-->
                                </div>
                                <!--<div class="media-right media-middle">
                                    <div style="width:80px;" class="text-xs-right">
                                        <small class="text-muted-light">5 min ago</small>
                                    </div>
                                </div>-->
                            </li>
                        </ul>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <div class="media">
                                <div class="media-body media-middle">
                                    <h4 class="card-title">Cursos</h4>
                                    <p class="card-subtitle">Temas relacionados con el curso.</p>
                                </div>
                                <!--   <div class="media-right media-middle">
                                       <a href="#" class="btn btn-white btn-sm"><i class="material-icons">add</i></a>
                                   </div>-->
                            </div>
                        </div>
                        <ul class="list-group list-group-fit">

                            <li class="list-group-item forum-thread">
                                <div class="media">
                                    <div class="media-left media-middle">
                                        <div class="forum-icon-wrapper">
                                            <!--    <a href="fixed-student-forum-thread.html" class="forum-thread-icon">
                                                    <i class="material-icons">description</i>
                                                </a>
                                                <a href="#public-profile" class="forum-thread-user">
                                                    <img src="assets/images/people/50/guy-7.jpg" alt="" width="20" class="rounded-circle">
                                                </a>-->
                                        </div>
                                    </div>
                                    <div class="media-body media-middle">
                                        <a href="fixed-student-forum-thread.html">Getting around AngularJS</a><br>
                                        <!-- <small>replied by <a href="fixed-student-profile.html">Adrian D.</a></small>-->
                                    </div>
                                    <!--  <div class="media-right media-middle">
                                          <div style="width:80px;" class="text-xs-right">
                                              <small class="text-muted-light">5 min ago</small>
                                          </div>
                                      </div>-->
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- <div class="col-md-4">
                      <div class="card">
                          <div class="card-block text-xs-center">
                              <div class="form-group">
                                  <input id="forumSearch" type="text" class="form-control" placeholder="Type to search">
                              </div>
                              <a href="#" class="btn btn-primary">Search <i class="material-icons">search</i></a>
                          </div>
                      </div>
                      <div class="card">
                          <div class="card-header">
                              <h4 class="card-title">Categories</h4>
                          </div>
                          <ul class="list-group list-group-fit">
                              <li class="list-group-item active">
                                  <a href="#">All Topics</a>
                              </li>
                              <li class="list-group-item">
                                  <a href="#">General</a>
                              </li>
                              <li class="list-group-item">
                                  <a href="#">Lessons</a>
                              </li>
                              <li class="list-group-item">
                                  <a href="#">Support</a>
                              </li>
                          </ul>
                      </div>
                  </div>-->
            </div>


        </div>


    </div>
@stop