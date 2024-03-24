<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\GeneticAlgorithmSettings;

class GeneticAlgorithmSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = GeneticAlgorithmSettings::find(1);
        return view('gasettings.index', compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $settings = GeneticAlgorithmSettings::create($request->all());
        return response()->json($settings, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GeneticAlgorithmSettings  $geneticAlgorithmSettings
     * @return \Illuminate\Http\Response
     */
    public function show(GeneticAlgorithmSettings $geneticAlgorithmSettings)
    {
        return response()->json($geneticAlgorithmSettings);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GeneticAlgorithmSettings  $geneticAlgorithmSettings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request): RedirectResponse
    {
        // Find the setting row with the ID of 1
        $setting = GeneticAlgorithmSettings::findOrFail(1);

        // Update the setting with the new values from the form
        $setting->update($request->all());

        // Redirect back to the form with a success message
        return redirect()->route('settings.index')->with('success', 'Settings updated successfully.');
    }

    public function reset()
    {
        // Find the setting row with the ID of 1
        $setting = GeneticAlgorithmSettings::findOrFail(1);

        // Update the setting with default values
        $setting->update([
            'max_generations' => 1500,
            'population_size' => 100,
            'mutation_rate' => 0.01,
            'crossover_rate' => 0.9,
            'elitism' => 2,
            'tournament_size' => 10,
        ]);

        // Redirect back to the form with a success message
        return redirect()->route('settings.index')->with('success', 'Settings reset to default values.');
    }

}
