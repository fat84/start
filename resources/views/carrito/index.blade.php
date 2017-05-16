@extends('layouts.principal')
@section('content')
    <div class="mdk-drawer-layout__content">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
            <li class="breadcrumb-item active">Carrito de compras</li>
        </ol>

        @if($message=Session::has('message'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                {{Session::get('message')}}
            </div>
        @endif


                @if (sizeof(Cart::content()) > 0)
            <a href="{{url('/')}}" class="mb-1 btn btn-white">Regresar a Cursos</a>
            <div class="card">
                <table class="table mb-0">
                    <thead>
                    <tr>
                        <th>Detalles</th>
                        <th width="100" class="text-xs-center">Cantidad</th>
                        <th width="100" class="right">Total</th>
                        <th width="10"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(Cart::content() as $carrito)
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="media-left hidden-sm-down">
                                        <img src="assets/images/nodejs.png" alt="" width="80" class="rounded">
                                    </div>
                                    <div class="media-body media-middle">
                                        <p class="mb-0">
                                            <a href="{{url('/cursos/'.str_replace(' ', '',$carrito->name).'/'.$carrito->id)}}">{{$carrito->name}}</a>
                                        </p>
                                        <small class="text-muted">{{$carrito->options->categoria_nombre}}</small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-xs-center">1</td>
                            <td class="right">${{number_format($carrito->price)}}</td>
                            <td class="text-xs-center">
                                <form action="{{ url('cart', [$carrito->rowId]) }}" method="POST" class="side-by-side">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" class="btn btn-danger btn-sm" value="Quitar">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-4 offset-md-8 text-md-right">
                            <div class="row">
                                <div class="col-xs-6"><strong>Subtotal</strong></div>
                                <div class="col-xs-6 text-xs-right">
                                    ${{Cart::subtotal()}}
                                </div>
                            </div>
                           <!-- <div class="row">
                                <div class="col-xs-6"><strong>Discount</strong></div>
                                <div class="col-xs-6 text-xs-right">
                                    <span class="text-danger">20%</span>
                                </div>
                            </div>-->
                            <div class="row">
                                <div class="col-xs-6"><strong>Total</strong></div>
                                <div class="col-xs-6 text-xs-right">
                                    ${{Cart::total()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-xs-right bg-white">
                    <a href="{{ route('payment') }}"  class="btn btn-primary">
                        Pagar ahora <i class="material-icons btn__icon--right">credit_card</i>
                    </a>
                </div>
            </div>

        @else
            Aun no hay nada
        @endif



    </div>
@stop