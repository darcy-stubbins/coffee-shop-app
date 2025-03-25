<?php

namespace Database\Seeders;

use App\Models\DrinkType;
use Illuminate\Database\Seeder;

class DrinkTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        new DrinkType([
            'name' => 'Tea',
            'description' => 'This is tea'
        ])->save();

        new DrinkType([
            'name' => 'Coffee',
            'description' => 'This is coffee'
        ])->save();

        new DrinkType([
            'name' => 'Chai',
            'description' => 'This is chai'
        ])->save();

        new DrinkType([
            'name' => 'Hot Chocolate',
            'description' => 'This is hot chocolate'
        ])->save();
    }
}
