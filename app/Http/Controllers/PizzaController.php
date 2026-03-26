<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{
    public function store(Request $request)
    {
        // Validate input
        $data = $request->validate([
            'name' => 'required|string',
            'size' => 'required|array',
            'price' => 'required|array',
            'toppings' => 'required|array',
            'pizza_menu_number' => 'nullable|integer', // Add validation
            // or 'nullable|exists:orders_info,id' if referencing shops table
        ]);

        // Save to database
        $pizza = Pizza::create($data);

        // Return JSON response
        return response()->json([
            'success' => true,
            'message' => 'Pizza successfully created!',
            'data' => $pizza
        ], 201);
    }
}