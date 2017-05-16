<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz_leccion extends Model
{
    protected $table = 'quiz_leccion';
    protected $fillable = [
        'titulo', 'leccion_id', 'imagen', 'created_at','updated_at','score','deleted_at'
    ];

    public function leccion(){
        return $this->belongsTo('App\Leccion','leccion_id','id');
    }
}
