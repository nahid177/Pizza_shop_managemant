<?php

use App\Http\Controllers\PizzaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderInfoController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TakeoutController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DeliveryManInfoController;
use App\Http\Controllers\UserController;


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


//Deliveries

Route::get('/deliveries', [DeliveryController::class, 'index']);       
Route::get('/deliveries/{id}', [DeliveryController::class, 'show']);   
Route::post('/deliveries', [DeliveryController::class, 'store']);      
Route::put('/deliveries/{id}', [DeliveryController::class, 'update']); 
Route::delete('/deliveries/{id}', [DeliveryController::class, 'destroy']);



//Deliverymen Info

Route::get('/deliverymen', [DeliveryManInfoController::class, 'index']);
Route::get('/deliverymen/{id}', [DeliveryManInfoController::class, 'show']);
Route::post('/deliverymen', [DeliveryManInfoController::class, 'store']);
Route::put('/deliverymen/{id}', [DeliveryManInfoController::class, 'update']);
Route::delete('/deliverymen/{id}', [DeliveryManInfoController::class, 'destroy']);

//user

Route::post('/user/register', [UserController::class, 'register']);
Route::post('/user/login', [UserController::class, 'login']);
Route::post('/user/forgot-password', [UserController::class, 'forgotPassword']);
Route::post('/user/reset-password', [UserController::class, 'resetPassword']);