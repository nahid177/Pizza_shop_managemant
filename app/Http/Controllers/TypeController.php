<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index() { return Type::all(); }

    public function store(Request $request) {
        $data = $request->validate(['name'=>'required|string|unique:types,name']);
        $type = Type::create($data);
        return response()->json(['success'=>true,'message'=>'Type created','data'=>$type],201);
    }

    public function show($id) { return Type::findOrFail($id); }

    public function update(Request $request, $id){
        $type = Type::findOrFail($id);
        $data = $request->validate(['name'=>'required|string|unique:types,name,'.$id]);
        $type->update($data);
        return response()->json(['success'=>true,'message'=>'Type updated','data'=>$type]);
    }

    public function destroy($id){
        $type = Type::findOrFail($id);
        $type->delete();
        return response()->json(['success'=>true,'message'=>'Type deleted']);
    }
}