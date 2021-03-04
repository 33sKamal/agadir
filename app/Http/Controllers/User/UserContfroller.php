<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserContfroller extends Controller
{
    //

    public function index()
    {
        return view('users.index');
    }

    public function getUsers()
    {
        $users = User::get();
        return view('users.get-users')->with('users',$users);

    }


    public function deleteUser($id)
    {

        // 1 we validate data 

        // we do our calcul depending on our logic 

        User::destroy($id);
        // 3 we insert in the databaase


        // 4 redirect to user with message success or fail

        sleep(1);

        return $this->getUsers();


    }
}
