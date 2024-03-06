@extends('layouts.app')

@section('title')
Classes
@endsection

@section('content')
<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 page-container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 page-title">
            <h1><span class="fa fa-users"></span> Section Classes</h1>
        </div>
    </div>

    <div class="menubar">
        @include('partials.menu_bar', ['buttonTitle' => 'Add Class'])
    </div>

    <div class="page-body" id="resource-container">
        @include('classes.table')
    </div>
</div>

@include('classes.modals')
@endsection

@section('scripts')
<script src="{{URL::asset('/js/classes/index.js')}}"></script>
@endsection