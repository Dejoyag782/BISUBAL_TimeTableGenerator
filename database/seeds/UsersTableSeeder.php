<?php

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
        DB::table('users')->insert([
            'name' => 'SuperAdministrator',
            'email' => 'superadmin@localhost',
            'role' => 'superad',
            'designation' => 'admin',
            'password' => bcrypt('superadmin'),
        ]);

        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@localhost',
            'role' => 'admin',
            'designation' => 'admin',
            'password' => bcrypt('admin'),
        ]);
    }
}
