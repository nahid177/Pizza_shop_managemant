<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'order_id' => 'required|exists:order_info,order_id',
            'type_id' => 'required|exists:types,id',
            'deliveryman_id' => 'required|exists:deliverymaninfo,user_id',
            'box' => 'required|integer|min:1',
            'amount' => 'required|numeric|min:0',
            'address' => 'required|string|max:255',
            'miles' => 'required|numeric|min:0',
        ]);

        $delivery = Delivery::create($data);

        return response()->json([
            'success' => true,
            'data' => $delivery->load('order','type','deliveryman')
        ], 201);
    }

    public function index()
    {
        return Delivery::with('order','type','deliveryman')->get();
    }

    public function show($id)
    {
        return Delivery::with('order','type','deliveryman')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $delivery = Delivery::findOrFail($id);

        $data = $request->validate([
            'order_id' => 'required|exists:order_info,order_id',
            'type_id' => 'required|exists:types,id',
            'deliveryman_id' => 'required|exists:deliverymaninfo,user_id',
            'box' => 'required|integer|min:1',
            'amount' => 'required|numeric|min:0',
            'address' => 'required|string|max:255',
            'miles' => 'required|numeric|min:0',
        ]);

        $delivery->update($data);

        return response()->json([
            'success' => true,
            'data' => $delivery->load('order','type','deliveryman')
        ]);
    }

    public function destroy($id)
    {
        Delivery::findOrFail($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Deleted'
        ]);
    }
}