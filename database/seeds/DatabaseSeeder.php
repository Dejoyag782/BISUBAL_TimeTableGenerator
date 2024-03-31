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


         // Elex 1 Unavailable rooms
         DB::table('timetables')->insert([
            [
                'name' => 'Test 1stYear 1st Sem - 1 2000 Generations',
                'status' =>  'COMPLETED', 
                'file_url' => 'public/timetables/combined_36.html',
                'chromosome' =>  'D4T7,20,1,D1T5,7,1,D5T10,24,1,D4T9,10,6,D5T2,10,6,D3T7,10,6,D2T2,10,6,D5T8,6,2,D1T8,23,2,D3T11,9,15,D4T6,8,15,D1T3,6,15,D2T5,13,20,D3T3,5,20,D5T3,21,20,D3T6,20,18,D5T9,8,18,D4T10,4,18,D3T9,4,16,D3T10,13,1,D4T8,2,1,D2T3,4,1,D2T7,10,6,D2T8,10,6,D1T2,10,6,D3T2,10,6,D5T4,24,2,D3T8,21,2,D2T10,5,15,D5T1,13,15,D4T5,4,15,D4T1,23,20,D5T7,3,20,D3T1,11,20,D2T6,20,18,D1T6,13,18,D4T3,2,18,D5T3,22,16,D3T9,15,2,D5T9,13,2,D1T4,24,2,D1T5,5,2,D1T6,5,2,D1T7,5,2,D2T3,5,2,D2T4,5,2,D4T3,5,2,D5T10,11,15,D4T11,21,15,D3T6,14,15,D3T2,19,18,D2T10,22,18,D4T6,6,18,D2T9,13,11,D4T10,3,11,D4T1,8,11,D4T2,8,11,D1T8,8,11,D1T9,8,11,D4T7,2,8,D5T2,2,8,D2T1,2,8,D2T2,2,8,D3T5,21,19,D1T3,20,19,D2T8,2,19,D5T8,3,20,D2T6,19,20,D3T6,24,20,D5T11,22,17,D1T8,6,17,D1T11,1,16,D4T2,12,10,D2T2,13,10,D5T2,12,10,D1T6,12,10,D1T7,12,10,D5T10,21,9,D3T9,6,9,D2T8,13,9,D1T10,13,9,D3T5,2,21,D5T5,4,21,D1T9,20,21,D2T8,15,15,D1T1,24,15,D5T5,15,15,D3T11,3,20,D4T5,2,20,D2T3,17,20,D4T1,1,18,D3T7,23,18,D2T11,15,18,D4T8,11,17,D1T7,17,17,D5T6,21,16,D3T6,16,16,D4T2,24,16,D1T3,3,14,D2T7,3,14,D4T4,14,14,D4T9,4,12,D3T10,17,12,D2T4,20,12,D3T2,22,13,D4T11,22,13,D5T2,20,13,D5T8,10,6,D4T8,10,6,D3T1,10,6,D2T3,10,6,D4T1,2,15,D3T7,24,15,D5T1,21,20,D4T4,5,20,D1T10,11,20,D3T11,4,18,D5T2,9,18,D2T2,4,18,D3T10,5,17,D2T8,21,17,D1T8,10,16,D5T7,20,1,D1T1,4,1,D4T6,3,1,D5T11,10,6,D1T5,10,6,D2T4,23,6,D4T10,6,8,D1T7,11,8,D5T3,8,8,D2T7,6,8,D1T9,6,8,D3T8,6,8,D5T4,6,8,D5T6,1,15,D1T10,14,15,D3T2,2,15,D2T5,14,18,D3T10,22,18,D1T5,24,18,D1T9,13,17,D3T3,15,17,D4T5,21,17,D2T6,5,16,D1T11,24,11,D3T4,2,11,D2T8,5,11,D3T5,8,11,D2T3,8,11,D1T6,8,11,D4T3,8,11,D3T7,2,8,D2T4,2,8,D5T10,22,2,D4T4,24,2,D2T11,23,2,D5T1,5,2,D5T2,5,2,D5T3,5,2,D4T7,5,2,D4T8,5,2,D4T9,5,2,D4T6,24,19,D1T7,23,19,D3T11,23,19',
                'scheme' =>  'G1,1,1,1,3,3,3,3,4,4,13,13,13,14,14,14,15,15,15,17,G2,1,1,1,3,3,3,3,4,4,13,13,13,14,14,14,15,15,15,17,G3,23,23,23,24,24,24,24,24,24,13,13,13,15,15,15,25,25,26,26,26,26,27,27,27,27,39,39,39,G4,14,14,14,16,16,17,33,33,34,34,34,35,35,36,36,37,37,37,G5,13,13,13,14,14,14,15,15,15,16,16,17,17,17,28,28,28,29,29,29,30,30,30,G6,3,3,3,3,13,13,14,14,14,15,15,15,16,16,17,18,18,18,19,19,19,21,21,21,22,22,22,22,G7,13,13,13,15,15,15,16,16,16,17,25,25,25,26,26,26,26,27,27,31,31,31,32,32,32,32,32,32,39,39,39',
                'fitness' =>  0.111111,
                'generations' => 2001,
                'violated_constraints' =>  NULL,
                'user_id' =>  1,
                'academic_period_id' =>  1,
                'created_at' => '2024-03-26 19:50:37',
                'updated_at' => '2024-03-27 20:39:49',
            ],
        ]);
        
    }
}
