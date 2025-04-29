<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderLine;
use App\Services\CSVService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Schema;

class OrderController extends Controller
{
    //create an order
    public function createOrder(Request $request)
    {
        $myArray = OrderLine::all()->toArray();

        $order = new Order();

        $userId = $request->input('user_id');
        $order->user_id = $userId;

        $order->save();

        $drinks = $request->input('drinks');
        $syrups = $request->input('syrups');
        $extras = $request->input('extras');

        //create a new orderline for each drink on the order that was just made
        foreach ($drinks as $index => $drink) {

            $orderLine = new OrderLine();
            $orderLine->drink_id = $drink;
            $orderLine->order_id = $order->id;
            $orderLine->syrup_id = $syrups[$index] ?? null;
            $orderLine->extra_id = $extras[$index] ?? null;

            $orderLine->save();
        }
    }

    //get an order by its id with its user, drinks, drink types, syrups and extras, and the total sum of the drinks prices
    public function getOrder($id)
    {
        $orderId = $id;

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

    //edit an orders details 
    public function editOrder()
    {
        //
    }

    //delete an order
    public function deleteOrder(Request $request)
    {
        $orderId = $request->input('order_id');

        $order = Order::find($orderId);
        //detach the drinks to delete the row in the pivot table drink_order
        $order->drinks()->detach();

        $order->delete();
    }

    //create an order csv file 
    public function createOrderCsv()
    {
        //getting the data from the csv file 
        $data = OrderLine::get()->toArray();

        $fileName = 'orders.csv';
        $headers = Schema::getColumnListing('order_lines'); //get the headers from the db table orders 

        //calling the createcsvfile function from services
        CSVService::createCsvFile($fileName, $data, $headers);

        //download the CSV file
        return Response::download(public_path($fileName))->deleteFileAfterSend(true);
    }
}
