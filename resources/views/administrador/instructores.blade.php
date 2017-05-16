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

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-block">
                                <h3>Crear Instructor</h3>
                                {!! Form::open(['route'=>'instructor.store','method'=>'POST']) !!}
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
                                    <div class="col-md-6">
                                        <div class="form-group xs-pt-10">
                                            <label>Nombres</label>
                                            <input type="text" placeholder="Nombre" name="name" class="form-control" value="{{ old('name') }}" >
                                        </div>
                                        <div class="form-group xs-pt-10">
                                            <label>Apellidos</label>
                                            <input type="text" placeholder="Apellidos" name="apellidos" class="form-control" value="{{ old('apellidos') }}" >
                                        </div>
                                        <div class="form-group">
                                            <label>Tipo Documento</label>
                                            <select class="form-control" name="tipo_documento">
                                                <option>Cedula ciudadania</option>
                                                <option>Cedula extranjera</option>
                                                <option>Nit</option>
                                            </select>
                                        </div>
                                        <div class="form-group xs-pt-10">
                                            <label>Documento</label>
                                            <input type="text" placeholder="Numero documento" name="documento" value="{{ old('documento') }}"  class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Departamento</label>
                                            <select class="form-control" name="departamento" id="departamento"
                                                    onchange="LoadCities(this.value)">
                                                <option>Seleccione un departamento</option>
                                                @foreach($departamento as $departamentos)
                                                    <option value="{{$departamentos->id}}">{{$departamentos->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <script>
                                            function LoadCities(departamento_id) {
                                                //alert(departamento_id);
                                                $.get('home/' + departamento_id, function (respuesta) {
                                                    //console.log(respuesta);
                                                    $("#ciudad").empty();
                                                    $("#ciudad").append(new Option("Seleccione una Ciudad"));
                                                    $.each(respuesta, function (index, value) {
                                                        //console.log(value.nombre);
                                                        $("#ciudad").append(new Option(value.nombre, value.id));
                                                    });
                                                });
                                            }
                                        </script>
                                        <div class="form-group">
                                            <label>Ciudad</label>
                                            <select class="form-control" name="ciudad" id="ciudad">
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group xs-pt-10">
                                            <label>Dirección</label>
                                            <input type="text" placeholder="Dirección" name="direccion" value="{{ old('direccion') }}"  class="form-control">
                                        </div>
                                        <div class="form-group xs-pt-10">
                                            <label>Telefono</label>
                                            <input type="text" placeholder="Telefono" value="{{ old('telefono1') }}"  name="telefono" class="form-control">
                                        </div>
                                        <div class="form-group xs-pt-10">
                                            <label>Correo eléctronico</label>
                                            <input type="text" placeholder="Correo electronico" value="{{ old('email') }}"  name="email" class="form-control">
                                        </div>
                                        <div class="form-group xs-pt-10">
                                            <label>Contraseña</label>
                                            <input type="password" placeholder="Contraseña" name="password" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-space">Crear Instructor</button>
                                    </div>
                                    <div>
                                        <div></div>
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
                                            <th>Apellidos</th>
                                            <th>Email</th>
                                            <th>Telefono</th>
                                            <th>Acción</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Creado</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Email</th>
                                            <th>Telefono</th>
                                            <th>Acción</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($instructores as $instructor)
                                            <tr>
                                                <td>{{$instructor->id}}</td>
                                                <td>{{$instructor->created_at}}</td>
                                                <td>{{$instructor->name}}</td>
                                                <td>{{$instructor->apellidos}}</td>
                                                <td>{{$instructor->email}}</td>
                                                <td>{{$instructor->telefono}}</td>
                                                <td>
                                                    {!! link_to_route('instructor.edit', $title = 'Editar', $parameters = $instructor->id, $attributes = ['class'=>'btn btn-primary block']) !!}
                                                    <br><br>
                                                    {!!Form::open(['route'=>['instructor.destroy',$instructor->id],'method'=>'DELETE'])!!}
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