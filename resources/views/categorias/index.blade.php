@extends('layouts.principal')
@section('content')
    <div class="mdk-drawer-layout__content">
        <div class="container-fluid">
            <div class="container">
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
                                <h3>Crear Categorias</h3>
                                {!! Form::open(['route'=>'categorias.store','method'=>'POST']) !!}
                                {{ csrf_field() }}
                                @if(count($errors) > 0)
                                    <div class="alert alert-danger sing-box" role="alert">
                                        <ul>
                                            @foreach($errors->all() as $errors)
                                                <li>{!! $errors !!}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group xs-pt-10">
                                            <label>Nombre Categoria</label>
                                            <input type="text" placeholder="Nombre" name="nombre" class="form-control" value="{{ old('nombre') }}" >
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-space">Crear Categoria</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-block">
                                <div>

                                    <br>
                                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Creado</th>
                                            <th>Nombre</th>
                                            <th>Acción</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Creado</th>
                                            <th>Nombre</th>
                                            <th>Acción</th>

                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($categorias as $categorias)
                                            <tr>
                                                <td>{{$categorias->id}}</td>
                                                <td>{{$categorias->created_at}}</td>
                                                <td>{{$categorias->nombre}}</td>
                                                <td>
                                                    {!! link_to_route('categorias.edit', $title = 'Editar', $parameters = $categorias->id, $attributes = ['class'=>'btn btn-primary block']) !!}
                                                    <br><br>
                                                    {!!Form::open(['route'=>['categorias.destroy',$categorias->id],'method'=>'DELETE'])!!}
                                                    {!! Form::submit('Eliminar',['class'=>'btn btn-danger block']) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>







            </div>
        </div>
    </div>
@stop