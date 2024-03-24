<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneticAlgorithmSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'max_generations',
        'population_size',
        'mutation_rate',
        'crossover_rate',
        'elitism',
        'tournament_size',
    ];
}
