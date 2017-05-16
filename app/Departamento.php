<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';
    protected $fillable = ['nombre','id'];

    public function ciudades(){
        return $this->hasMany('App\Ciudad','departamento_id','id');
    }
    public function user(){
        return $this->hasMany('App\User','departamento_id','id');
    }
}
