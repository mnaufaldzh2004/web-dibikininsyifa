<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ilustrator extends Model
{
    protected $table = 'ilustrators';

    protected $fillable =  [
        'user_id',
        'portofolio_name',
        'portofolio_description',
        'image_portofolio'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
 }
