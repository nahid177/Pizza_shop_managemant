<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() { return Customer::all(); }

    public function store(Request $request){
        $data = $request->validate([
            'name'=>'required|string',
            'address'=>'nullable|string',
            'phone'=>'nullable|string'
        ]);
        $customer = Customer::create($data);
        return response()->json(['success'=>true,'message'=>'Customer created','data'=>$customer],201);
    }

    public function show($id){ return Customer::findOrFail($id); }

    public function update(Request $request, $id){
        $customer = Customer::findOrFail($id);
        $data = $request->validate([
            'name'=>'sometimes|string',
            'address'=>'sometimes|string',
            'phone'=>'sometimes|string'
        ]);
        $customer->update($data);
        return response()->json(['success'=>true,'message'=>'Customer updated','data'=>$customer]);
    }

    public function destroy($id){
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return response()->json(['success'=>true,'message'=>'Customer deleted']);
    }
}