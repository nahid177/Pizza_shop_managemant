<?php

use App\Http\Controllers\PizzaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderInfoController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\CustomerController;


//pizzaInfoPost

Route::post('/pizzaInfoPost', [PizzaController::class, 'store']);               // Add new


//OrderInfoController

Route::post('/order', [OrderInfoController::class, 'store']);                  // Add new

// customers
Route::get('/customers', [CustomerController::class, 'index']);               // List all
Route::post('/customers', [CustomerController::class, 'store']);             // Add new
Route::get('/customers/{id}', [CustomerController::class, 'show']);         // Get one
Route::put('/customers/{id}', [CustomerController::class, 'update']);      // Update
Route::delete('/customers/{id}', [CustomerController::class, 'destroy']); // Delete


//types

Route::get('/types', [TypeController::class, 'index']);                  // List all
Route::post('/types', [TypeController::class, 'store']);                // Create
Route::get('/types/{id}', [TypeController::class, 'show']);            // Show single
Route::put('/types/{id}', [TypeController::class, 'update']);         // Update
Route::delete('/types/{id}', [TypeController::class, 'destroy']);    // Delete