<?php

use App\Http\Controllers\PizzaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderInfoController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TakeoutController;

//pizzaInfoPost

Route::post('/pizzaInfoPost', [PizzaController::class, 'store']);               // Add new


//OrderInfoController

// orders
Route::post('/orders', [OrderInfoController::class, 'store']);
Route::get('/orders', [OrderInfoController::class, 'index']);



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

//takeouts

Route::get('/takeouts', [TakeoutController::class, 'index']);
Route::get('/takeouts/{id}', [TakeoutController::class, 'show']);
Route::post('/takeouts', [TakeoutController::class, 'store']);
Route::put('/takeouts/{id}', [TakeoutController::class, 'update']);
Route::delete('/takeouts/{id}', [TakeoutController::class, 'destroy']);