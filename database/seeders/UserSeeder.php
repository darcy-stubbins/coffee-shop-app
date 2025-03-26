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
            'password' => 'password'
        ])->save();

        new User([
            'name' => 'Chris',
            'email' => 'chris@mail.com',
            'password' => 'password'
        ])->save();

        new User([
            'name' => 'Steve',
            'email' => 'steve@mail.com',
            'password' => 'password'
        ])->save();
    }
}
