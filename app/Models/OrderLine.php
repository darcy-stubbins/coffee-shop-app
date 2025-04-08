<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    public function drink()
    {
        return $this->belongsTo(Drink::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function syrup()
    {
        return $this->belongsTo(Syrup::class);
    }

    public function extra()
    {
        return $this->belongsTo(Syrup::class);
    }
}
