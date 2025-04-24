<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\CSVService;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

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

    //create a users csv file 
    public function createUserCsv()
    {
        //getting the data from the csv file 
        $data = User::get()->toArray();

        $fileName = 'users.csv';
        $headers = Schema::getColumnListing('users'); //get the headers from the db table orders 

        //calling the createcsvfile function from services
        CSVService::createCsvFile($fileName, $data, $headers);

        //download the CSV file
        return Response::download(public_path($fileName))->deleteFileAfterSend(true);
    }
}
