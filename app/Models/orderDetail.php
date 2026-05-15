<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orderDetail extends Model
{
    
    protected $table = 'details_order';

    protected $fillable = [
        'order_id',
        'additional_option_id',
        'subtotal',
        'created_at',
        'updated_at'
    ];


    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function additional_option(){
        return $this->belongsTo(Option::class);
    }
}
