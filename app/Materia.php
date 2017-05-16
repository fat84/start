<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'materia';
    protected $fillable = [
        'nombre', 'modulo_id', 'descripcion', 'created_at','updated_at'
    ];

    public function leccion (){
        return $this->hasMany('App\Leccion','materia_id','id');
    }
    public function modulo(){
        return $this->belongsTo('App\Modulo','modulo_id','id');
    }

    public function material(){
        return $this->hasMany('App\MaterialApoyo','materia_id','id');
    }
}
