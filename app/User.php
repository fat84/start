<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','apellidos','telefono','sitio_web','biografia','avatar','created_at','tipo_documento',
        'documento','departamento_id','ciudad_id'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function ciudad (){
        return $this->belongsTo('App\Ciudad','ciudad_id','id');
    }
    public function departamento() {
        return $this->belongsTo('App\Departamento','departamento_id','id');
    }
}
