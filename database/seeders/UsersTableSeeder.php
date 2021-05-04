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
            'username' => 'adminsim',
            'email' => 'Adminsim@gmail.com',
            'password' => bcrypt('password')
        ]);
        $adminstnk = User::create([
            'name' => 'Admin STNK',
            'username' => 'adminstnk',
            'email' => 'Adminstnk@gmail.com',
            'password' => bcrypt('password')
        ]);
        $user = User::create([
            'name' => 'User',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password')
        ]);

        $adminsim->assignRole('admin sim');
        $adminstnk->assignRole('admin stnk');
        $user->assignRole('user');
    }
}
