<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    //
    protected $table = 'modulos';
    protected $fillable = [
        'nombre', 'curso_id', 'descripcion', 'imagen', 'created_at','updated_at','empresa_id'
    ];
    public function materia(){
        return $this->hasMany('App\Materia','modulo_id','id');
    }
    public function curso(){
        return $this->belongsTo('App\Curso','curso_id','id');
    }

}
