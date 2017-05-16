<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz_respuesta_leccion extends Model
{
    protected $table = 'quiz_respuesta_leccion';
    protected $fillable = [
        'respuesta', 'quiz_pregunta_leccion_id', 'verdadera', 'created_at','updated_at'
    ];

    public function departamentos(){
        return $this->belongsTo('App\Quiz_pregunta_leccion','quiz_pregunta_leccion_id','id');
    }
}
