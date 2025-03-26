<?php

use App\Http\Controllers\DrinkController;
use App\Http\Controllers\DrinkTypeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//drinktype controller 
Route::get('/get-drink-types', [DrinkTypeController::class, 'getDrinkTypes']);
Route::get('/get-specific-drink-types', [DrinkTypeController::class, 'getSpecificDrinkType']);
Route::get('/get-filtered-drink-types', [DrinkTypeController::class, 'getFilteredDrinkType']);
Route::get('/get-type-with-drinks', [DrinkTypeController::class, 'getTypeWithDrinks']);

//drink controller 
Route::get('/get-drinks', [DrinkController::class, 'getDrinks']);
Route::get('/get-specific-drinks', [DrinkController::class, 'getSpecificDrinks']);
Route::get('/get-filtered-drinks', [DrinkController::class, 'filteredDrinks']);
Route::get('/get-drink-with-type', [DrinkController::class, 'getDrinkWithType']);

//user controller 
Route::get('/get-user', [UserController::class, 'getUser']);

//order controller 
Route::get('/get-order', [OrderController::class, 'getOrder']);
