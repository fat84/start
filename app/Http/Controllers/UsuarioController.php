<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Redirect;
use Storage;
use Illuminate\Support\Facades\Input;
use Session;
use Hash;
use Validator;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usuario.perfil');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario_id = Auth::user()->id;
        $usuario = User::find($usuario_id);
        $usuario->name = $request->name;
        $usuario->apellidos = $request->apellidos;
        $usuario->tipo_documento = $request->tipo_documento;
        $usuario->documento = $request->documento;
        $usuario->direccion = $request->direccion;
        $usuario->telefono = $request->telefono;
        $usuario->sitio_web = $request->sitio_web;
        $usuario->biografia = $request->biografia;

        $imagenAnterior = Auth::user()->avatar;
        if ($request->file('avatar') == '') {
            $usuario->avatar = $imagenAnterior;
        } else {
            $img = $request->file('avatar');
            $file_route = time() . '_' . $img->getClientOriginalName();
            Storage::disk('img')->put($file_route, file_get_contents($img->getRealPath()));
            $usuario->avatar = $file_route;
        }

        $usuario->save();

        return redirect('miperfil')->with('message','Perfil Actualizado :)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ActualizarPass(){
        return view('usuario.seguridad');
    }

    public function pass(Request $request)
    {
        $rules = [
            'mypassword' => 'required',
            'password' => 'required|confirmed|min:6|max:18',
        ];

        $messages = [
            'mypassword.required' => 'El campo es requerido',
            'password.required' => 'El campo es requerido',
            'password.confirmed' => 'Los contraseñas no coinciden',
            'password.min' => 'El mínimo permitido son 6 caracteres',
            'password.max' => 'El máximo permitido son 18 caracteres',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('seguridad')->withErrors($validator);
        }
        else{
            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('email', '=', Auth::user()->email)
                    ->update(['password' => bcrypt($request->password)]);
                return redirect('seguridad')->with('status', 'Contraseña cambiado con éxito');
            }
            else
            {
                return redirect('seguridad')->with('message', 'Credenciales incorrectas');
            }
        }


       /* $passwordActual = bcrypt($request->passwordActual);
        $password = bcrypt($request->password);
        $usuario_id = Auth::user()->id;
        $passwordBase = bcrypt(Auth::user()->password);
        $mensaje = "";
        $newPassword = User::find($usuario_id);
        if ($passwordActual == $passwordBase){
            $newPassword->password = $password;
            $mensaje = 'Contraseña Actualizada correctamente';
        }else{

        }
        $newPassword->save();

        return back()->with('message','');*/


    }
}
