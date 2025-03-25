<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use Illuminate\Http\Request;

class DrinkController extends Controller
{
    //get all the drinks 
    public function getDrinks()
    {
        $drinks = Drink::all()->pluck('name');

        dd($drinks->toArray());
    }

    //get a specific drink 
    public function getSpecificDrinks()
    {
        $specificDrink = Drink::where('name', 'latte')->pluck('name');

        dd($specificDrink);
    }

    //get every drink except green tea 
    public function filteredDrinks()
    {
        $filteredDrinks = Drink::where('name', '!=', 'mocha')->pluck('name');

        dd($filteredDrinks->toArray());
    }

    //get the drink latte and its drink type 
    public function getDrinkWithType()
    {
        $latte = Drink::where('name', 'latte')->with('drinkType')->get();

        dd($latte->toArray());
    }
}
