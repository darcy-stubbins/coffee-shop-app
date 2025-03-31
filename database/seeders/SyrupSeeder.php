<?php

namespace Database\Seeders;

use App\Models\Syrup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SyrupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        new Syrup([
            'name' => 'Caramel',
            'price' => '0.30',
        ])->save();

        new Syrup([
            'name' => 'Vanilla',
            'price' => '0.30',
        ])->save();

        new Syrup([
            'name' => 'Chocolate',
            'price' => '0.30',
        ])->save();

        new Syrup([
            'name' => 'Cinnamon',
            'price' => '0.30',
        ])->save();
    }
}
