<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

//create an order 
Route::post('/create-order', [OrderController::class, 'createOrder']);

//delete an order
Route::post('/delete-order', [OrderController::class, 'deleteOrder']);
