<!-- resources/views/settings.blade.php -->

@extends('layouts.app')

@section('title')
Genetic Algorithm Settings
@endsection

    <style>
        /* Define hover effect */
        .hoverablecancel:hover {
            color: white;
        }
    </style>

@section('content')
<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 page-container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 page-title">
            <h1><span class="fa fa-user"></span> Genetic Algorithm Settings</h1>
        </div>
    </div>

    <div class="menubar">
    </div>

    <div class="page-body" id="resource-container">
        <div class="row">
            <div class="col-md-4 col-sm-8 col-xs-12 col-md-offset-4 col-sm-offset-2" style="background-color:#ddd; border-radius:5px; padding:10px;">
            <form method="POST" action="{{ route('settings.update', $setting->id) }}">
                    @csrf
                    @method('PUT')
                    @include('errors.form_errors')

                    <!-- Form fields for each setting -->
                    <div class="form-group" style="margin-top:25px;">
                    <label for="max_generations">Max Generations:</label>
                    <input type="number" style="color:#28282B; font-weight:bold;" class="form-control" id="max_generations" name="max_generations" value="{{ $setting->max_generations }}"><br>
                    </div>

                    <div class="form-group" style="margin-top:-25px;">
                    <label for="population_size">Population Size:</label>
                    <input type="number" style="color:#28282B; font-weight:bold;" class="form-control" id="population_size" name="population_size" value="{{ $setting->population_size }}"><br>
                    </div>

                    <div class="form-group" style="margin-top:-25px;">
                    <label for="mutation_rate">Mutation Rate:</label>
                    <input type="number" style="color:#28282B; font-weight:bold;" class="form-control" step="0.01" id="mutation_rate" name="mutation_rate" value="{{ $setting->mutation_rate }}"><br>
                    </div>

                    <div class="form-group" style="margin-top:-25px;">
                    <label for="crossover_rate">Crossover Rate:</label>
                    <input type="number" style="color:#28282B; font-weight:bold;" class="form-control" step="0.01" id="crossover_rate" name="crossover_rate" value="{{ $setting->crossover_rate }}"><br>
                    </div>

                    <div class="form-group" style="margin-top:-25px;">
                    <label for="elitism">Elitism:</label>
                    <input type="number" style="color:#28282B; font-weight:bold;" class="form-control" id="elitism" name="elitism" value="{{ $setting->elitism }}"><br>
                    </div>

                    <div class="form-group" style="margin-top:-25px;">
                    <label for="tournament_size">Tournament Size:</label>
                    <input type="number" style="color:#28282B; font-weight:bold;" class="form-control" id="tournament_size" name="tournament_size" value="{{ $setting->tournament_size }}"><br>
                    </div>

                    <div class="form-group">
                    <button type="submit" class="btn btn-primary" style="float:left;">Update Settings</button>
                    </div>
                </form>
                <!-- Form for resetting to default values -->
                <form id="resetForm" action="{{ route('settings.reset') }}" method="POST">
                        @csrf
                        @method('DELETE')
                    <button type="button" class="btn btn-danger" style="float:right;" data-toggle="modal" data-target="#confirmResetModal">Reset to Default</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Confirmation Modal -->
<div class="modal fade" id="confirmResetModal" tabindex="-1" role="dialog" aria-labelledby="confirmResetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background: rgb(217,219,221);margin-top: 150px;border-radius: 10px;">
            <div class="justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center" style="height: 40px;color: var(--bs-indigo);background: var(--e-global-color-b068fc5);border-top-left-radius: 10px;border-top-right-radius: 10px;padding: 10px;border-bottom-style: solid;border-bottom-color: var(--bs-orange);">
                <h5 class="modal-title" id="confirmResetModalLabel" style="float:left; color:white; font-weight:Bold;">Confirm Reset</h5>
                <i type="button" class="fa fa-close d-xxl-flex justify-content-xxl-center align-items-xxl-center hoverablecancel" style="float:right; margin-top:-5px;" data-dismiss="modal" aria-label="Close">                    
                </i>
            </div>
            <div class="modal-body">
                Are you sure you want to reset the settings to their default values?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" form="resetForm" class="btn btn-danger">Reset</button>
            </div>
        </div>
    </div>
</div>

@endsection
