<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudades';
    protected $fillable = ['nombre', 'departamento_id'];

    public function departamentos(){
        return $this->belongsTo('App\Departamento','departamento_id','id');
    }
    public function user(){
        return $this->hasMany('App\User','ciudad_id','id');
    }
}
