<?php

namespace App\Http\Controllers;

use App\Carrito;
use App\Categoria;
use App\Curso;
use Illuminate\Http\Request;
use Cart;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cart = Cart::content() ;
        return view('carrito.index', compact('cart '));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$duplicates = Cart::instance('shopping')->search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->curso_id;
        });*/
        $curso = Curso::find($request->curso_id);
        $categoria = Categoria::find($curso->categoria_id);
        $cart = Cart::add(['id' => $curso->id, 'name' => $curso->nombre, 'qty' => 1, 'price' => $curso->precio,
            'options' => ['categoria_id'=>$categoria->id,'categoria_nombre'=>$categoria->nombre,'img'=>$curso->imagen]]);
        Cart::associate($cart->rowId, \App\Curso::class);

        return redirect('carrito')->with('message','Curso añadido correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return redirect('carrito')->with('message','Curso eliminado del carrito!');
    }

    public function compras(){
        return view('carrito.compras');
    }
}
