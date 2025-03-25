<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //get the user
    public function getUser()
    {
        $user = User::where('name', 'dee')->get();

        dd($user);
    }
}
