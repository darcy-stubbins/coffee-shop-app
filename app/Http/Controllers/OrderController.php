<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //create an order
    public function createOrder(Request $request)
    {
        $order = new Order();

        $userId = $request->input('id');
        $order->user_id = $userId;

        $drinks = $request->input('drinks');

        $order->save();

        //attach the drinks to the order that was just made
        foreach ($drinks as $drink) {
            $order->drinks()->attach($drink);
        }
    }

    //get an order by its id with its user, drinks, drink types, and the total sum of the drinks prices
    public function getOrder()
    {
        $orderId = 1;

        $order = Order::where('id', $orderId)->with('user', 'drinks', 'drinks.drinkType')->first();

        //getting total sum of drink prices 
        $totalPrice = 0;

        foreach ($order->drinks as $drink) {
            $totalPrice = $totalPrice + $drink->price;
        }

        //format the number into currency
        $orderTotal = '£' . number_format($totalPrice, 2);

        dd($order->toArray(), $orderTotal);
    }

    //delete an order
    public function deleteOrder(Request $request)
    {
        $orderId = $request->input('id');

        $order = Order::find($orderId);
        //detach the drinks to delete the row in the pivot table drink_order
        $order->drinks()->detach();

        $order->delete();
    }
}
