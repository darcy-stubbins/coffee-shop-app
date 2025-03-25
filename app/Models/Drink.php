<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    public function drinkType()
    {
        return $this->belongsTo(DrinkType::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
