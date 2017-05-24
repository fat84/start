<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialModulo extends Model
{
    //
    protected $table = 'material_apoyo_modulo';
    protected $fillable = [
        'id', 'nombre', 'modulo_id', 'created_at','updated_at','url'
    ];
    public function modulo()
    {
        return $this->belongsTo('App\Modulo','modulo_id','id');
    }
}
