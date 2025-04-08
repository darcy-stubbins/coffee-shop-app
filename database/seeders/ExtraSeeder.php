<?php

namespace Database\Seeders;

use App\Models\Extra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExtraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        new Extra([
            'name' => 'Cream and Marshmallows',
            'price' => '0.50',
        ])->save();

        new Extra([
            'name' => 'Chocolate Dusting',
            'price' => '0.10',
        ])->save();

        new Extra([
            'name' => 'Cinnamon Dusting',
            'price' => '0.10',
        ])->save();
    }
}
