<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryManInfo extends Model
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