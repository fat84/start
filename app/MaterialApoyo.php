<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialApoyo extends Model
{
    protected $table = 'material_apoyo';
    protected $fillable = [
        'id', 'nombre', 'material_id', 'created_at','updated_at','url'
    ];
    public function materia()
    {
        return $this->belongsTo('App\Materia','materia_id','id');
    }
}
