<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserContfroller extends Controller
{
    //

    public function index()
    {
        return view('users.index');
    }


    public function login()
    {
        $user = User::first();

        Auth::login($user);

        return redirect()->to('users/create-users')->with('message', 'Welcome ' . $user->name . ' Rak mconnecti daba  : ');
    }

    public function getUsers()
    {
        $users = User::get();
        return view('users.get-users')->with('users', $users);
    }


    public function create(Request $request)
    {

        // bhad ligne kanchouf wach l user ando lha9 i creer

        $this->authorize('create', User::class);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return back()->with('message', 'Welcome ' . $request->name . ' account is done chouf ton email : ' . $request->email);
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
