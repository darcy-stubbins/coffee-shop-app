<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use App\Models\DrinkType;
use Illuminate\Http\Request;

class DrinkTypeController extends Controller
{
    //get all the drink types 
    public function getDrinkTypes()
    {
        $drinkTypes = DrinkType::all()->pluck('name');

        dd($drinkTypes->toArray());
    }

    //get a specific drink type 
    public function getSpecificDrinkType()
    {
        $specificDrinkType = DrinkType::where('name', 'chai')->pluck('name');

        dd($specificDrinkType);
    }

    //get every drink type except coffee 
    public function getFilteredDrinkType()
    {
        $filteredDrinkType = DrinkType::where('name', '!=', 'coffee')->pluck('name');

        dd($filteredDrinkType);
    }

    //get the drink type coffee with its drinks
    public function getTypeWithDrinks()
    {
        $coffee = DrinkType::where('name', 'coffee')->with('drinks')->get();

        dd($coffee->toArray());
    }
}
