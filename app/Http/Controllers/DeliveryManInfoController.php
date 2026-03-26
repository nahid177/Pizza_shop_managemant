<?php

namespace App\Http\Controllers;

use App\Models\DeliveryManInfo; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DeliveryManInfoController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:deliverymaninfo,email',
            'password' => 'required|string|min:6',
            'reset_password' => 'nullable|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        // Hash password
        $data['password'] = Hash::make($data['password']);

        $deliveryman = DeliverymanInfo::create($data);

        return response()->json([
            'success' => true,
            'data' => $deliveryman
        ], 201);
    }

    public function index()
    {
        return DeliverymanInfo::all();
    }

    public function show($id)
    {
        return DeliverymanInfo::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $deliveryman = DeliverymanInfo::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:deliverymaninfo,email,' . $id,
            'password' => 'nullable|string|min:6',
            'reset_password' => 'nullable|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        if(isset($data['password'])){
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $deliveryman->update($data);

        return response()->json([
            'success' => true,
            'data' => $deliveryman
        ]);
    }

    public function destroy($id)
    {
        DeliverymanInfo::findOrFail($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Deleted'
        ]);
    }
}