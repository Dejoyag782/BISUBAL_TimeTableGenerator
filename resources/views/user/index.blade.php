@extends('layouts.app')

@section('title')
Users
@endsection

@section('content')

     
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{asset('dash-assets/js/jquery.js')}}"></script>

    <script src="{{asset('dash-assets/js/bootstrap.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('dash-assets/css/jquery.css')}}">

    <script src="{{asset('dash-assets/js/datatables.min.js')}}"></script>


  
  <div class="row" id="row">
    <div class="col offset-xxl-0 text-start" id="left-nav">
      
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 page-title">
            <h1><span class="fa fa-users"></span> Users</h1>
        </div>
    <div class="col" id="main-container">
    
      <div class="container mt-3">
      
        <div class="row">
          <div class="col-lg-12 margin-tb">
            <div class="pull-right mb-2">
                <a class="btn btn-primary" onClick="add()" href="javascript:void(0)"><span class="fa fa-plus" style="margin-right:5px;"></span>Add User</a>
            </div>
          </div>
        </div>
    
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
          
            <table class="table table-bordered display responsive nowrap display responsive nowrap" id="user-management">
               <thead>
                  <tr>
                    <th>Role</th>
                    <th>Name</th>
                    <th>Post-nominals</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th width="150px">Action</th>
                  </tr>
               </thead>
            </table>
 
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap farmers model -->
   @include('user.user-modal')
  <!-- End Bootstrap model -->
 

@include('user.user-ajax')


@endsection

