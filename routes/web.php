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

    Route::get('/', [UserContfroller::class, 'index'])->middleware('have-number-akhouya');

    Route::get('/create-users', function () {
        return view('users.create-users');
    });

    Route::get('/login', [UserContfroller::class, 'login']);

    Route::post('/create-users', [UserContfroller::class, 'create']);

    Route::get('/get-users', [UserContfroller::class, 'getUsers']);

    Route::get('/delete-users/{id}', [UserContfroller::class, 'deleteUser']);

    Route::get('/profile', function () {
        return view('users.profile');
    });

    Route::get('/singup', function () {
        return view('users.singup');
    });
});
