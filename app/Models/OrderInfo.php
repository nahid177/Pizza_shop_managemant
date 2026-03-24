<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderInfo extends Model
{
    protected $table = 'order_info';
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'type_id', 'customer_id', 'menu_id', 'payment_type', 'payment_amount'
    ];

    public function pizza()
    {
        return $this->belongsTo(Pizza::class, 'menu_id', 'pizza_menu_number');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
}