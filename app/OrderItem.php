<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';
    protected $fillable = [
        'price', 'quantity', 'curso_id','order_id'
    ];

    public function order(){
        return $this->belongsTo('App\Order','order_id','id');
    }
}
