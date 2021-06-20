<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminsim = User::create([
            'name' => 'Admin SIM',
            'nik' => NULL,
            'username' => 'adminsim',
            'email' => 'Adminsim@gmail.com',
            'password' => bcrypt('password')
        ]);
        $adminstnk = User::create([
            'name' => 'Admin STNK',
            'nik' => NULL,
            'username' => 'adminstnk',
            'email' => 'Adminstnk@gmail.com',
            'password' => bcrypt('password')
        ]);

        // $user = User::create([
        //     'name' => 'User1',
        //     'nik' => 123456783,
        //     'username' => 'user1',
        //     'email' => 'user1@gmail.com',
        //     'password' => bcrypt('password')
        // ]);

        // $user = User::create([
        //     'name' => 'User2',
        //     'nik' => 123455789,
        //     'username' => 'user2',
        //     'email' => 'user2@gmail.com',
        //     'password' => bcrypt('password')
        // ]);

        // $user = User::create([
        //     'name' => 'User3',
        //     'nik' => 1234689,
        //     'username' => 'user3',
        //     'email' => 'user3@gmail.com',
        //     'password' => bcrypt('password')
        // ]);

        // $user = User::create([
        //     'name' => 'User4',
        //     'nik' => 1244689,
        //     'username' => 'user4',
        //     'email' => 'user4@gmail.com',
        //     'password' => bcrypt('password')
        // ]);

        $user = User::create([
            'name' => 'User',
            'nik' => 1254689,
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password')
        ]);

        $adminsim->assignRole('admin sim');
        $adminstnk->assignRole('admin stnk');
        $user->assignRole('user');
    }
}
