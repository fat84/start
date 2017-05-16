<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leccion extends Model
{
    protected $table = 'lecciones';
    protected $fillable = [
        'titulo', 'descripcion', 'contenido', 'created_at','updated_at','materia_id'
    ];

    public function quiz_leccion(){
        return $this->hasMany('App\Quiz_leccion','leccion_id','id');
    }

    public function materia(){
        return $this->belongsTo('App\Materia','materia_id','id');
    }
}
