<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin sim'
        ]);
        Role::create([
            'name' => 'admin stnk'
        ]);
        Role::create([
            'name' => 'user'
        ]);
    }
}
