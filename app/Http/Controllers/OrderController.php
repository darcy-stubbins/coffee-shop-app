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

    //get an order by its id with its user, drinks, drink types, syrups and extras, and the total sum of the drinks prices
    public function getOrder()
    {
        $orderId = 3;

        $order = Order::where('id', $orderId)->with('user', 'orderLines.drink', 'orderLines.drink.drinkType', 'orderLines.syrup', 'orderLines.extra')->first();

        //getting total sum of drink prices with the prices of the syrups
        $totalPrice = 0;

        //calculate drink price
        foreach ($order->drinks as $drink) {
            $totalPrice = $totalPrice + $drink->price;
        }

        //calculate syrup price 
        foreach ($order->syrups as $syrup) {
            $totalPrice = $totalPrice + $syrup->price;
        }

        //calculate extra price 
        foreach ($order->extras as $extra) {
            $totalPrice = $totalPrice + $extra->price;
        }

        //format the price number into currency
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
