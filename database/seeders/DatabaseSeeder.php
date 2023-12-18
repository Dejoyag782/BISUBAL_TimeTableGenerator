<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersTableSeeder::class);
        $this->call(DaysTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(AcademicPeriodsTableSeeder::class);

        // App data seeders
        $this->call(RoomsTableSeeder::class);
        $this->call(TimeslotsTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(ProfessorsTableSeeder::class);
        $this->call(ClassesTableSeeder::class);
    }
}
