<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DrinkTypeSeeder::class,
        ]);

        $this->call([
            UserSeeder::class,
        ]);

        $this->call([
            DrinkSeeder::class,
        ]);

        $this->call([
            SyrupSeeder::class,
        ]);

        $this->call([
            OrderSeeder::class,
        ]);
    }
}
