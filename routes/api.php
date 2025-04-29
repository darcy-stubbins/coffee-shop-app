<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//order controller 
Route::post('/create-order', [OrderController::class, 'createOrder']);
Route::post('/edit-order', [OrderController::class, 'editOrder']);
Route::post('/delete-order', [OrderController::class, 'deleteOrder']);

//user controller
Route::post('/create-user', [UserController::class, 'createUser']);
Route::post('/edit-user', [UserController::class, 'editUser']);
Route::post('/delete-user', [UserController::class, 'deleteUser']);
