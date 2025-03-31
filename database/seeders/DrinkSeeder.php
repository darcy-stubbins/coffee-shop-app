<?php

namespace Database\Seeders;

use App\Models\Drink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DrinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        new Drink([
            'drink_type_id' => '1',
            'name' => 'Breakfast Tea',
            'price' => '01.00',
        ])->save();

        new Drink([
            'drink_type_id' => '1',
            'name' => 'Green Tea',
            'price' => '1.20',
        ])->save();

        new Drink([
            'drink_type_id' => '2',
            'name' => 'Americano',
            'price' => '1.50',
        ])->save();

        new Drink([
            'drink_type_id' => '2',
            'name' => 'Latte',
            'price' => '2.00',
        ])->save();

        new Drink([
            'drink_type_id' => '2',
            'name' => 'Mocha',
            'price' => '2.50',
        ])->save();

        new Drink([
            'drink_type_id' => '3',
            'name' => 'Chai Tea',
            'price' => '1.20',
        ])->save();

        new Drink([
            'drink_type_id' => '3',
            'name' => 'Chai Latte',
            'price' => '2.50',
        ])->save();
    }
}
