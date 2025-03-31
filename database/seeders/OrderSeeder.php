<?php

namespace Database\Seeders;

use App\Models\Drink;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Syrup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderCount = 0;

        //adding a new order while there is currently less than 10
        while ($orderCount < 10) {
            $order = new Order([
                'user_id' => '1',
            ]);

            $order->save();

            $orderLineCount = 0;

            $drinks = Drink::all();
            $syrups = Syrup::all();

            while ($orderLineCount <= rand(1, 10)) {
                $orderLine = new OrderLine([
                    'order_id' => $order->id,
                    'drink_id' => $drinks->random()->id,
                    'syrup_id' => $syrups->random()->id,
                ]);
                $orderLine->save();
                $orderLineCount++;
            }

            $orderCount++;
        }
    }
}
