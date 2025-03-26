<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //create a user
    public function createUser(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();
    }

    //get the user
    public function getUser()
    {
        $user = User::where('name', 'dee')->get();

        dd($user);
    }

    //delete a user
    public function deleteUser(Request $request)
    {
        $userId = $request->input('id');

        $user = User::find($userId);

        $user->delete();
    }
}
