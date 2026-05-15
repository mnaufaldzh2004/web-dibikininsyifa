<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'order_code',
        'user_id',
        'ilustrator_id',
        'service_id', 
        'total_price',
        'status',
        'image', 
        'payment_date',
        'invoice_url',
        'created_at',
        'updated_at'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function ilustrator(){
        return $this->belongsTo(Ilustrator::class);
    }

    public function detailOrder(){
         return $this->hasMany(orderDetail::class, 'order_id');
    }
    
}
