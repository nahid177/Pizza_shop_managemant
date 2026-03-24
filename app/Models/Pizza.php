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

    // Optional relation to Shop table
    public function shop()
    {
        return $this->belongsTo(Shop::class, 'pizza_menu_number');
    }
}