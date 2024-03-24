<?php

use Illuminate\Database\Seeder;
use App\Models\GeneticAlgorithmSettings;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneticAlgorithmSettings::create([
            'max_generations' => 1200,
            'population_size' => 100,
            'mutation_rate' => 0.01,
            'crossover_rate' => 0.9,
            'elitism' => 2,
            'tournament_size' => 10,
        ]);
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
        $this->call(DepartmentTableSeeder::class);

        
    }
}
