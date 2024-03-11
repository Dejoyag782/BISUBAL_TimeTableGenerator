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

        DB::table('users')->insert([
            'name' => 'Benjamin Omamalin',
            'email' => 'admin1@localhost',
            'role' => 'admin',
            'department' => 1,
            'designation' => 'dean',
            'password' => bcrypt('admin'),
        ]);

        DB::table('users')->insert([
            'name' => 'Catherine Leah Gabo',
            'email' => 'admin2@localhost',
            'role' => 'admin',
            'department' => 1,
            'designation' => 'chairperson',
            'password' => bcrypt('admin'),
        ]);

        DB::table('users')->insert([
            'name' => 'Jea Mae Tuico',
            'email' => 'admin3@localhost',
            'role' => 'admin',
            'designation' => 'chairperson',
            'password' => bcrypt('admin'),
        ]);

        DB::table('users')->insert([
            'name' => 'Jean F. Nebrea',
            'email' => 'admin4@localhost',
            'role' => 'admin',
            'designation' => 'campusdirector',
            'password' => bcrypt('admin'),
        ]);
    }
}
