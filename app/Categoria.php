<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    protected $fillable = ['nombre','id','created_at','updated_at'];

    public function cursos(){
        return $this->hasMany('App\Curso','categoria_id','id');
    }
}
