@extends('layouts.app')

@section('title')
Departments
@endsection

@section('content')
<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 page-container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 page-title">
            <h1><span class="fa fa-university"></span> Departments</h1>
        </div>
    </div>

    <div class="menubar">
        @include('partials.menu_bar', ['buttonTitle' => 'Add Department'])
    </div>

    <div class="page-body" id="resource-container">
        @include('departments.table')
    </div>
</div>

@include('departments.modals')
@endsection

@section('scripts')
<script src="{{URL::asset('/js/departments/index.js')}}"></script>
@endsection