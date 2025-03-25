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
            'description' => 'This is breakfast tea',
        ])->save();

        new Drink([
            'drink_type_id' => '1',
            'name' => 'Green Tea',
            'description' => 'Tea but green',
        ])->save();

        new Drink([
            'drink_type_id' => '2',
            'name' => 'Americano',
            'description' => 'Black coffee',
        ])->save();

        new Drink([
            'drink_type_id' => '2',
            'name' => 'Latte',
            'description' => 'Better than americano',
        ])->save();

        new Drink([
            'drink_type_id' => '2',
            'name' => 'Mocha',
            'description' => 'The best coffee',
        ])->save();

        new Drink([
            'drink_type_id' => '3',
            'name' => 'Chai Tea',
            'description' => 'Tea version of chai',
        ])->save();

        new Drink([
            'drink_type_id' => '3',
            'name' => 'Chai Latte',
            'description' => 'Latte version of chai',
        ])->save();
    }
}
