@extends('layouts.app')

@section('title')
My Account
@endsection

@section('content')

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Styles -->
		@include('partials.styles')
		@yield('styles')

		<title>Activate Account | BISUTTG</title>
    </head>

    <body class="login-page" style="background: ;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-4 col-sm-8  col-md-offset-4 col-sm-offset-2">
                    <div id="activation-form-container">
                        <div class="login-form-header" style="background-color:Indigo; border-color:indigo;">
                            <h3 class="text-center">Activate User</h3>
                        </div>

                        <div class="login-form-body"  style="border-color:indigo;">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                     <form method="POST" action="{{ URL::to('/users/activate') }}">
                                        {!! csrf_field() !!}
                                        @include('errors.form_errors')

                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $user->name }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ $user->email }}">
                                        </div>

                                        @if (auth()->user()->role == 'superad')
                                        <input id="designation" name="designation" value="admin" hidden="true">
                                        @endif

                                        @if (auth()->user()->role == 'admin')
                                        <div class="form-group">
                                            <label>Department</label>
                                            <div class="select2-wrapper">
                                                <select id="department" name="department" class="form-control select2">
                                                <option value="">Select Department</option>
                                                    @foreach ($department as $department)
                                                        <option  value="{{ $department->id }}">{{ $department->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Designation</label>

                                            <div class="select2-wrapper">
                                                <select id="designation" name="designation" class="form-control select2">
                                                    <option value="admin">Admin</option>
                                                    <option value="chairperson">Chairperson</option>
                                                    <option value="dean">Dean</option>
                                                    <option value="campusDirector">Campus Director</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" placeholder="Password" name="password">
                                        </div>

                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control" placeholder="Password" name="password_confirmation">
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" name="submit" value="ACTIVATE ACCOUNT" class="btn btn-lg btn-block btn-success">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Scripts -->
        @include('partials.scripts')
        @yield('scripts')
    </body>
</html>
@endsection