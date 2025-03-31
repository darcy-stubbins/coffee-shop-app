<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Syrup extends Model
{
    public function drinks()
    {
        return $this->belongsToMany(Drink::class, 'order_lines');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_lines');
    }
}
