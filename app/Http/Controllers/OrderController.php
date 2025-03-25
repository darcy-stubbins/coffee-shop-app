<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //create an order
    public function createOrder(Request $request)
    {
        $order = new Order();
        $order->user_id = '2';

        $drinks = $request->input('drinks');

        $order->save();

        //attach the drinks to the order that was just made
        foreach ($drinks as $drink) {
            $order->drinks()->attach($drink);
        }
    }

    //get an order by its id with its user, drinks
    public function getOrder()
    {
        $order = Order::where('id', '1')->with('user', 'drinks', 'drinks.drinkType')->get();

        dd($order->toArray());
    }

    //delete an order
    public function deleteOrder()
    {
        //
    }
}
