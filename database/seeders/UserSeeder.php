<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        new User([
            'name' => 'Dee',
            'email' => 'dee@mail.com',
            'password' => 'password',
            'street_address' => '41 Great Castle St',
            'locality' => 'Mayfair',
            'region' => 'London',
            'post_code' => 'W1W 8LU',
        ])->save();

        new User([
            'name' => 'Chris',
            'email' => 'chris@mail.com',
            'password' => 'password',
            'street_address' => '10 North St',
            'locality' => 'York',
            'region' => 'North Yorkshire',
            'post_code' => 'YO1 6JD',
        ])->save();

        new User([
            'name' => 'Steve',
            'email' => 'steve@mail.com',
            'password' => 'password',
            'street_address' => '29 Beach Walk',
            'locality' => 'Whitstable',
            'region' => 'Kent',
            'post_code' => 'CT5 2BP',
        ])->save();
    }
}
