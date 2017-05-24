<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'subtotal', 'shipping', 'user_id',  'created_at','updated_at','id'
    ];

    public function orderitems(){
        return $this->hasMany('App\OrderItem','order_id','id');
    }
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
