<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function drinks()
    {
        return $this->belongsToMany(Drink::class, 'order_lines');
    }

    public function syrups()
    {
        return $this->belongsToMany(Syrup::class, 'order_lines');
    }

    public function orderLines()
    {
        return $this->hasMany(OrderLine::class);
    }
}
