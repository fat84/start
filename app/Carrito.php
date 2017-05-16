<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = 'carrito';
    protected $fillable = ['id','curso_id','user_id','created_at','updated_at','estado'];
}
