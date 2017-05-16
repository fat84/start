<?php

namespace App\Http\Controllers;

use DevDojo\Chatter\Models\Discussion;
use DevDojo\Chatter\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ForoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('foro.foros');
    }

    public function vista($slug){

    }

    public function start(Request $request ,$slug){
        $foro = Discussion::where('slug','=',$slug)->get();
        return view('foro.index',compact('foro'));
    }

    public function agregarcomentario(Request $request){

        $post = new Post;
        $post->chatter_discussion_id = $request->discussion;
        $post->body = $request->body;
        $post->user_id = Auth::user()->id;
        $post->save();
        $foro = Discussion::find($request->discussion);
        return redirect('foros/start/'.$request->slug)->with('message','Comentario publicado :)');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('foro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
