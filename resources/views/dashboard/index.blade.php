@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('content')
<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 page-container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 page-title">
            <h1><span class="fa fa-dashboard"></span> Dashboard</h1>
        </div>
    </div>

    <div class="page-body menubar">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row cards-container">
                    <?php $count = 1; ?>
                    @foreach ($data['cards'] as $card)
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="card card-{{ $count++ }}">
                            <div class="card-title">
                                <span class="pull-right icon fa fa-{{$card['icon'] }}"></span>
                                <h3>{{ $card['title'] }}</h3>
                            </div>

                            <div class="card-body">
                                <span>{{ $card['value'] }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 50px">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-lg-offset-4 col-md-offset-4 col-sm-offset-4">
                <button class="btn-primary timetable-btn btn-block" id="resource-add-button"><i class="fa fa-calendar"></i> Generate New Timetables</button>
                <form class="btn-block" action="{{ route('export.data') }}" method="GET">
                    <button style="border-radius:3px;" class="btn-warning timetable-btn btn-block" type="submit"><i class="fa fa-save"></i> Export Data to CSV</button>
                </form>
            </div>
        </div>
    </div>

    <div id="resource-container">
        @include('dashboard.timetables')
    </div>
</div>
@include('dashboard.modals')
@endsection

@section('scripts')
<script src="{{URL::asset('/js/dashboard/index.js')}}"></script>
@endsection