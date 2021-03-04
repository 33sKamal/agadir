<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = User::factory()->count(100)->create();



        // for ($i = 0; $i < 100; $i++) {

        //     User::create([
        //         'name' => 'User name '.$i,
        //         'email' => 'user'.$i.'@gmail.com',
        //         'password' => 'root',
        //     ]);
        // }
    }
}
