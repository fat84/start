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
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        {{Session::get('message')}}
                    </div>
                @endif
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{url('miperfil')}}">Mi Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('seguridad')}}">Seguridad</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pagos" data-toggle="tab">Pagos</a>
                        </li>
                    </ul>

                    <div class="p-2 tab-content">
                        <div class="tab-pane active" id="perfil">
                            <form action="ActualizarPerfil/{{Auth::user()->id}}" method="post" class="form-horizontal"
                                  accept-charset="UTF-8" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label for="avatar" class="col-sm-3 col-form-label">Avatar</label>
                                    <div class="col-sm-9">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="icon-block rounded">
                                                    <img src="{{asset('img/usuario/'.Auth::user()->avatar)}}"
                                                         style="width: 60px">
                                                </div>
                                            </div>
                                            <div class="media-body media-middle">
                                                <label class="custom-file m-0">
                                                    <input type="file" name="avatar" id="file">
                                                    <!--<span class="custom-file-control"></span>-->
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Nombres</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" name="name" class="form-control" placeholder="Nombre"
                                                       value="{{Auth::user()->name}}">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="apellidos" class="form-control"
                                                       placeholder="Apellidos" value="{{Auth::user()->apellidos}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Documento</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select class="form-control" name="tipo_documento">
                                                    <option selected>{{Auth::user()->tipo_documento}}</option>
                                                    <option>CEDULA</option>
                                                    <option>TARETA IDENTIDAD</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="documento" disabled class="form-control"
                                                       placeholder="Documento"
                                                       value="{{Auth::user()->documento}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">Correo Electronico</label>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">
                <i class="material-icons md-18 text-muted">mail</i>
              </span>
                                            <input type="text" class="form-control" placeholder="Email Address"
                                                   value="{{Auth::user()->email}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="website" class="col-sm-3 col-form-label">Telefono</label>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="input-group">
              <span class="input-group-addon" id="basic-addon2">
                <i class="material-icons md-18 text-muted">contact_phone</i>
              </span>
                                            <input name="telefono" type="text" class="form-control" placeholder="566588"
                                                   value="{{Auth::user()->telefono}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="website" class="col-sm-3 col-form-label">Dirección</label>
                                    <div class="col-sm-6">
                                        <div class="input-group">
              <span class="input-group-addon" id="basic-addon2">
                <i class="material-icons md-18 text-muted">map</i>
              </span>
                                            <input name="direccion" type="text" class="form-control"
                                                   placeholder="Av 12 #12-12"
                                                   value="{{Auth::user()->direccion}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="website" class="col-sm-3 col-form-label">Website</label>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="input-group">
              <span class="input-group-addon" id="basic-addon2">
                <i class="material-icons md-18 text-muted">language</i>
              </span>
                                            <input type="text" name="sitio_web" class="form-control" placeholder="www."
                                                   value="{{Auth::user()->sitio_web}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-8 offset-sm-3">
                                        <div class="media">
                                            <div class="media-left">
                                                <button type="submit" class="btn btn-success">Guardar Cambios</button>
                                            </div>
                                            <div class="media-body media-middle pl-1">
                                                <label class="custom-control custom-checkbox m-0">
                                                    <input type="checkbox" class="custom-control-input" checked>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Recibir Contenido</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>


                        <div class="tab-pane" id="pagos">
                            <form action="#" class="form-horizontal">
                                <div class="form-group row">
                                    <label for="name_on_invoice" class="col-sm-3 col-form-label">Name on Invoice</label>
                                    <div class="col-sm-6 col-md-4">
                                        <input type="text" class="form-control" value="Adrian Demian">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-6 col-md-4">
                                        <input type="text" class="form-control"
                                               value="Sunny Street, 21, Miami, Florida">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="country" class="col-sm-3 col-form-label">Country</label>
                                    <div class="col-sm-6 col-md-4">
                                        <select class="custom-control custom-select form-control">
                                            <option value="1" selected>USA</option>
                                            <option value="2">India</option>
                                            <option value="3">United Kingdom</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-4 offset-sm-3">
                                        <a href="#" class="btn btn-success"> Update Billing</a>
                                    </div>
                                </div>
                            </form>
                            <div class="card mt-2">
                                <div class="card-header bg-white">
                                    <div class="media">
                                        <div class="media-body media-middle">
                                            <h4 class="card-title">Payment Info</h4>
                                        </div>
                                        <div class="media-right media-middle">
                                            <a href="#" class="btn btn-primary-outline"><i
                                                        class="material-icons">add</i></a>
                                        </div>
                                    </div>
                                </div>
                                <ul class="card-footer p-0 list-group list-group-fit">
                                    <li class="list-group-item active">
                                        <div class="media">
                                            <div class="media-left">
                                                <span class="btn btn-primary btn-circle"><i class="material-icons">credit_card</i></span>
                                            </div>
                                            <div class="media-body media-middle">
                                                <p class="mb-0">**** **** **** 2422</p>
                                                <small>Updated on 12/02/2016</small>
                                            </div>
                                            <div class="media-right media-middle">
                                                <a href="#" class="btn btn-primary btn-sm">
                                                    <i class="material-icons btn__icon--left">edit</i> EDIT
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-left">
                                                <span class="btn btn-white btn-circle"><i class="material-icons">credit_card</i></span>
                                            </div>
                                            <div class="media-body media-middle">
                                                <p class="mb-0">**** **** **** 6321</p>
                                                <small class="text-muted">Updated on 11/01/2016</small>
                                            </div>
                                            <div class="media-right media-middle">
                                                <a href="#" class="btn btn-white btn-sm">
                                                    <i class="material-icons btn__icon--left">edit</i> EDIT
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
