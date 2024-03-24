<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('genetic_algorithm_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('max_generations')->default(1200);
            $table->integer('population_size')->default(100);
            $table->float('mutation_rate', 8, 2)->default(0.01);
            $table->float('crossover_rate', 8, 2)->default(0.9);
            $table->integer('elitism')->default(2);
            $table->integer('tournament_size')->default(10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genetic_algorithm_settings');
    }
};
