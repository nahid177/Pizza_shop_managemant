<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Get all payments
    public function index() {
        return Payment::with('customer')->get();
    }

    // Create a new payment
    public function store(Request $request) {
        $data = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'amount' => 'required|numeric',
            'payment_type' => 'required|string',
            'status' => 'sometimes|string'
        ]);

        $payment = Payment::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Payment recorded',
            'data' => $payment
        ], 201);
    }

    // Get a single payment
    public function show($id) {
        return Payment::with('customer')->findOrFail($id);
    }

    // Update a payment
    public function update(Request $request, $id) {
        $payment = Payment::findOrFail($id);

        $data = $request->validate([
            'amount' => 'sometimes|numeric',
            'payment_type' => 'sometimes|string',
            'status' => 'sometimes|string'
        ]);

        $payment->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Payment updated',
            'data' => $payment
        ]);
    }

    // Delete a payment
    public function destroy($id) {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Payment deleted'
        ]);
    }
}