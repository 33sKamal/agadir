<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserContfroller;



Route::get('/', function () {
    return view('welcome');
});


Route::post('/users', function (Request $request) {

    $fullname = $request->fullname;
    $age = $request->age;

    $message = "";

    if ($age == 30 && $fullname == "simo") {
        $message = 'mmken dkhel l app';
    } else {
        $message = 'age incorect ??';
    }

    dd(
        $message
    );
});


Route::prefix('users')->group(function () {

    // Route::get('/', function () {
    //     return view('users.index');
    // });


    Route::get('/', [UserContfroller::class, 'index']);


    Route::get('/create-users', function () {
        return view('users.create-users');
    });

    // hna kancrew a user
    Route::post('/create-users', function (Request $request) {

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return back()->with('message', 'Welcome ' . $request->name . ' account is done chouf ton email : ' . $request->email);
    });


    // hadi bach njib les users
    // Route::get('/get-users', function () {

    //     $users = User::get();

    //     return view('users.get-users')->with('users',$users);
    // });



    Route::get('/get-users', [UserContfroller::class, 'getUsers']);

    // hadi bach njib les users
    // Route::get('/delete-users/{id}', function ($id) {

    //     User::destroy($id);

    //     dd(
    //         'User has been deleted'
    //     );


    // });

    Route::get('/delete-users/{id}', [UserContfroller::class, 'deleteUser']);

    Route::get('/profile', function () {
        return view('users.profile');
    });


    Route::get('/login', function () {
        return view('users.login');
    });

    Route::get('/singup', function () {
        return view('users.singup');
    });
});
