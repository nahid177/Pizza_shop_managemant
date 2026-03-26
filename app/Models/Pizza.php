<?php  

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $fillable = [
        'name',
        'size',
        'price',
        'toppings',
        'pizza_menu_number' // new field
    ];

    protected $casts = [
        'size' => 'array',
        'price' => 'array',
        'toppings' => 'array',
    ];

    public function orders()
    {
        return $this->hasMany(OrderInfo::class, 'menu_id');
    }
}