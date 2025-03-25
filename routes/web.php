<?php

use App\Http\Controllers\DrinkController;
use App\Http\Controllers\DrinkTypeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Models\User;
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








Route::get('/test', function () {

    // Input: #??##?#??#???
    // Output: 9FE58J8RS2GBC (Random letters replacing ? and random numbers replacing #)

    $input = '??#???##?##?###';

    //split the string
    $explodedInput = str_split($input);

    $alphabet = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
    $numbers = str_split('123456789');


    foreach ($explodedInput as $index => $i) {
        if ($i == '?') {
            //replace with letter 
            $randomLetter = $alphabet[array_rand($alphabet)];
            $explodedInput[$index] = $randomLetter;
        } else {
            //replace with number 
            $randomNumber = $numbers[array_rand($numbers)];
            $explodedInput[$index] = $randomNumber;
        }
    }

    $answer = implode($explodedInput);

    $output = $answer;

    dd($output);
});
