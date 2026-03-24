<?php

namespace App\Http\Controllers;

use App\Models\OrderInfo;
use Illuminate\Http\Request;

class OrderInfoController extends Controller
{
    public function store(Request $request){
        $data = $request->validate([
            'type_id'=>'required|exists:types,id',
            'customer_id'=>'required|exists:customers,id',
            'menu_id'=>'required|exists:pizza_infos,pizza_menu_number',
            'payment_type'=>'required|string',
            'payment_amount'=>'required|numeric'
        ]);

        $order = OrderInfo::create($data);

        return response()->json([
            'success'=>true,
            'message'=>'Order created',
            'data'=>$order->load('pizza','customer','type')
        ],201);
    }

    public function index(){
        return OrderInfo::with('pizza','customer','type')->get();
    }
}