@extends('layouts.principal')

@section('content')
    <div class="mdk-drawer-layout__content">
        <div class="container-fluid">

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="app/public/">Inicio</a></li>
                <li class="breadcrumb-item"><a href="curso">Cursos</a></li>
                <li class="breadcrumb-item active">Crear Curso</li>
            </ol>

            <div class="media">
                <div class="media-body">
                    <h1 class="page-heading h2">
                        Crear nuevo Curso
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Información Basica</h4>
                        </div>
                        <div class="card-block">

                            <form id="formu" name="formu" action="guardar_curso" method="post" class="form-horizontal" accept-charset="UTF-8" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group col-md-6">
                                    <label for="nombre"><b style="color:red;">* </b><b>Nombre del Curso</b></label>
                                    <input required name="nombre" value="{{old('nombre')}}" type="text" class="form-control" placeholder="Digite el nombre del curso">
                                    @if ($errors->has('nombre'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="imagen"><b style="color:red;">* </b><b>Imagen</b></label>
                                    <input type="file" required class="form-control" name="imagen" id="file" accept="image/*">
                                    @if ($errors->has('imagen'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('imagen') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="categoria_id"><b style="color:red;">* </b><b>Categoria</b></label>

                                    <select name="categoria_id" required class="custom-select form-control">
                                        <option selected disabled value="">Seleccione una categoria</option>
                                        @foreach($categorias as $cate)
                                            <option value="{{$cate->id}}">{{$cate->nombre}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group col-md-6">
                                    <label for="empresa_id"><b style="color:red;">* </b><b>Empresa Asignada</b></label>

                                    <select name="empresa_id" class="custom-select form-control" required>
                                        <option selected disabled value="">Seleccione una empresa</option>
                                        @foreach($empresas as $empre)
                                            <option value="{{$empre->id}}">{{$empre->razon_social}}</option>
                                        @endforeach
                                    </select>

                                </div>


                                <div class="form-group col-md-6">
                                    <label for="descripcion"><b style="color:red;">* </b><b>Descripcion</b></label>
                                    <textarea required name="descripcion" id="descripcion" rows="3"  style="resize: none;" class="form-control" placeholder="Digita un breve descripcion del curso">{{old('descripcion')}}</textarea>
                                    @if ($errors->has('descripcion'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <script>
                                    $(document).ready(function() {
                                        $('#descripcion').summernote({
                                            lang: 'es-ES',
                                            height: 300,                 // set editor height
                                            minHeight: null,             // set minimum height of editor
                                            maxHeight: null,             // set maximum height of editor
                                            focus: true                  // set focus to editable area after initializing summernote
                                        });
                                    });
                                </script>

                                <div class="form-group col-md-6">
                                    <label for="video_promo"><b>&nbsp;Video Promocional</b></label>
                                    <input name="video_promo" type="file" class="form-control" id="file" accept="video/*">
                                    <div class="form-group">
                                        <label><b style="color:red;">*</b><b>Precio</b></label>
                                        <input class="form-control" required type="number" placeholder="$" name="precio" value="{{old('precio')}}">
                                        @if ($errors->has('precio'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('precio') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                </div>
                                <br>
                                <div class="col-md-12">
                                    <div class="media-right media-middle">
                                        <input class="btn btn-success" type="submit" value="Guardar">
                                    </div>
                                    <div class="media-right media-middle">
                                        <a class="btn btn-success" type="submit" href="{{url('curso')}}">Volver</a>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@stop
