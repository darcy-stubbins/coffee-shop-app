<?php

namespace Database\Seeders;

use App\Models\Drink;
use App\Models\Extra;
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
            $extras = Extra::all();

            while ($orderLineCount <= rand(1, 10)) {

                $drinkId = $drinks->random()->id;

                //only add syrups to certain drinks otherwise syrupId is null
                $syrupId = null;

                if ($drinkId == 3 || $drinkId == 4 || $drinkId == 5) {
                    $syrupId = $syrups->random()->id;
                }

                //only add extras to certain drinks otherwise extraId is null
                $extraId = null;

                if ($drinkId == 8 || $drinkId == 9) {
                    $extraId = 1;
                } else if ($drinkId == 7) {
                    $extraId = 3;
                } else if ($drinkId == 5) {
                    $extraId = 2;
                }

                $orderLine = new OrderLine([
                    'order_id' => $order->id,
                    'drink_id' => $drinkId,
                    'syrup_id' => $syrupId,
                    'extra_id' => $extraId,
                ]);
                $orderLine->save();
                $orderLineCount++;
            }

            $orderCount++;
        }
    }
}
