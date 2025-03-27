<?php

namespace Database\Seeders;

use App\Models\Drink;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = 0;

        //adding a new order while there is currently less than 10
        while ($count < 10) {
            $order = new Order([
                'user_id' => '1',
            ]);

            $order->save();

            //adding random drinks in a random quantity to $drinks
            $drinks = [];
            while (count($drinks) < rand(1, 5)) {
                $drinks[] = rand(1, 7);
            }

            //attach the drinks to the order
            foreach ($drinks as $drink) {
                $order->drinks()->attach($drink);
            }
            $count++;
        }
    }
}
