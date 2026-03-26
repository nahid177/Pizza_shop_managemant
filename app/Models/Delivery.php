<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = [
        'order_id',
        'type_id',
        'box',
        'amount',
        'address',
        'miles'
    ];

    public function order()
    {
        return $this->belongsTo(\App\Models\OrderInfo::class, 'order_id', 'order_id');
    }

    public function type()
    {
        return $this->belongsTo(\App\Models\Type::class);
    }
}