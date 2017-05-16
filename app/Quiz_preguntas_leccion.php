<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz_preguntas_leccion extends Model
{
    protected $table = 'quiz_leccion_pregunta';
    protected $fillable = [
        'titulo', 'quiz_leccion_id', 'tipo_pregunta', 'created_at','updated_at','score','deleted_at'
    ];
    public function respuesta(){
        return $this->hasMany('App\Quiz_respuesta_leccion','quiz_pregunta_leccion_id','id');
    }
}
