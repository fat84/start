<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{

    protected $table = 'cursos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'categoria_id', 'descripcion','imagen','video_promo','created_at','updated_at','empresa_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function categoria()
    {
        return $this->belongsTo('App\Categoria','categoria_id','id');
    }

    public function modulo(){
        return $this->hasMany('App\Modulo','curso_id','id');
    }

}
