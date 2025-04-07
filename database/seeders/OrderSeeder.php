<?php

namespace Database\Seeders;

use App\Models\Drink;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Syrup;
use App\Models\User;
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

            $userId = User::all();

            $order = new Order([
                'user_id' => $userId->random()->id,
            ]);

            $order->save();

            $orderLineCount = 0;

            $drinks = Drink::all();
            $syrups = Syrup::all();

            while ($orderLineCount <= rand(1, 10)) {
                $drinkId = $drinks->random()->id;

                $syrupId = null;

                if ($drinkId == 3 || $drinkId == 4 || $drinkId == 5) {
                    $syrupId = $syrups->random()->id;
                }

                $orderLine = new OrderLine([
                    'order_id' => $order->id,
                    'drink_id' => $drinkId,
                    'syrup_id' => $syrupId,
                ]);
                $orderLine->save();
                $orderLineCount++;
            }

            $orderCount++;
        }
    }
}
