<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialCurso extends Model
{
    //
    protected $table = 'material_apoyo_curso';
    protected $fillable = [
        'id', 'nombre', 'curso_id', 'created_at','updated_at','url'
    ];
    public function curso()
    {
        return $this->belongsTo('App\Curso','curso_id','id');
    }
}
