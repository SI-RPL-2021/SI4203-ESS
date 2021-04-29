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
        User::create([
            'name' => 'Admin SIM',
            'email' => 'Adminsim@gmail.com',
            'password' => bcrypt('password'),
            'level' => 'admin sim'
        ]);
        User::create([
            'name' => 'Admin STNK',
            'email' => 'Adminstnk@gmail.com',
            'password' => bcrypt('password'),
            'level' => 'admin stnk'
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
            'level' => 'user'
        ]);
    }
}
