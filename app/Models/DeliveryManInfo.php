<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliverymanInfo extends Model
{
    protected $table = 'deliverymaninfo'; 
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'password',
        'reset_password',
        'phone',
    ];
}