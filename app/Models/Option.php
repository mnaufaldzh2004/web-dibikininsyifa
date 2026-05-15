<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = 'additional_options';
    protected $fillable = [
        'option_name',
        'additional_price'
    ];


    public function detailOrders(){
        return $this->hasMany(orderDetail::class);
    }
}
