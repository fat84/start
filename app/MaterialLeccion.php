<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialLeccion extends Model
{
    //
    protected $table = 'material_apoyo_leccion';
    protected $fillable = [
        'id', 'nombre', 'leccion_id', 'created_at','updated_at','url'
    ];
    public function leccion()
    {
        return $this->belongsTo('App\Leccion','leccion_id','id');
    }
}
