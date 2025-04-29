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
        $user->street_address = $request->input('street_address');
        $user->locality = $request->input('locality');
        $user->region = $request->input('region');
        $user->post_code = $request->input('post_code');

        $user->save();
    }

    //get the user
    public function getUser()
    {
        $user = User::where('name', 'dee')->get();

        dd($user);
    }

    //edit a users details 
    public function editUser(Request $request)
    {
        $userId = $request->input('user_id');
        $user = User::find($userId);

        $updatedName = $request->input('updated_name') ?? $user->name;
        $updatedEmail = $request->input('updated_email') ?? $user->email;
        $updatedPassword = $request->input('updated_password') ?? $user->password;
        $updatedStreetAddress = $request->input('updated_street_address') ?? $user->street_address;
        $updatedLocality = $request->input('updated_locality') ?? $user->locality;
        $updatedRegion = $request->input('updated_region') ?? $user->region;
        $updatedPostCode = $request->input('updated_post_code') ?? $user->post_code;


        $user->update([
            'name' => $updatedName,
            'email' => $updatedEmail,
            'password' => $updatedPassword,
            'street_address' => $updatedStreetAddress,
            'locality' => $updatedLocality,
            'region' => $updatedRegion,
            'post_code' => $updatedPostCode,
        ]);

        $user->save();
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
