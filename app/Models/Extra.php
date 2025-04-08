<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_lines');
    }
}
