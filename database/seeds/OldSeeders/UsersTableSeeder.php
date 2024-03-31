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
            'activated' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@localhost',
            'role' => 'admin',
            'designation' => 'admin',
            'password' => bcrypt('admin'),
        ]);

        DB::table('users')->insert([
            'name' => 'Benjamin N. Omamalin',
            'email' => 'admin1@localhost',
            'role' => 'admin',
            'department' => 1,
            'designation' => 'dean',
            'password' => bcrypt('admin'),
        ]);

        DB::table('users')->insert([
            'name' => 'Catherine Leah G. Gabo',
            'email' => 'admin2@localhost',
            'role' => 'admin',
            'department' => 1,
            'designation' => 'chairperson',
            'password' => bcrypt('admin'),
        ]);

        DB::table('users')->insert([
            'name' => 'Reame T. Tuico',
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

        DB::table('users')->insert([
            'name' => 'Jun Rey J. Poyos',
            'email' => 'admin5@localhost',
            'role' => 'admin',
            'department' => 2,
            'designation' => 'dean',
            'password' => bcrypt('admin'),
        ]);

        DB::table('users')->insert([
            'name' => 'Ghena L. Asucan',
            'email' => 'admin6@localhost',
            'role' => 'admin',
            'department' => 2,
            'designation' => 'chairperson',
            'password' => bcrypt('admin'),
        ]);

        DB::table('users')->insert([
            'name' => 'Marry Joyce G. Ale',
            'email' => 'admin7@localhost',
            'role' => 'admin',
            'department' => 3,
            'designation' => 'dean',
            'password' => bcrypt('admin'),
        ]);

        DB::table('users')->insert([
            'name' => 'Katy C. Perry',
            'email' => 'admin8@localhost',
            'role' => 'admin',
            'department' => 3,
            'designation' => 'chairperson',
            'password' => bcrypt('admin'),
        ]);
    }
}
