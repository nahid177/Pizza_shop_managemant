<?php

namespace App\Http\Controllers;

use App\Models\Takeout;
use Illuminate\Http\Request;

class TakeoutController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'order_id' => 'required|exists:order_info,order_id', // 🔥 updated
            'type_id'  => 'required|exists:types,id',
            'box'      => 'required|integer|min:1',
            'amount'   => 'required|numeric|min:0'
        ]);

        $takeout = Takeout::create($data);

        return response()->json([
            'success' => true,
            'data' => $takeout->load('order','type')
        ], 201);
    }

    public function index()
    {
        return Takeout::with('order','type')->get();
    }

    public function show($id)
    {
        return Takeout::with('order','type')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $takeout = Takeout::findOrFail($id);

        $data = $request->validate([
            'order_id' => 'required|exists:order_info,order_id', 
            'type_id'  => 'required|exists:types,id',
            'box'      => 'required|integer|min:1',
            'amount'   => 'required|numeric|min:0'
        ]);

        $takeout->update($data);

        return response()->json([
            'success' => true,
            'data' => $takeout
        ]);
    }

    public function destroy($id)
    {
        Takeout::findOrFail($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Deleted'
        ]);
    }
}