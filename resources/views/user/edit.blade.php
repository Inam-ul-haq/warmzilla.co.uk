@extends('layouts.admin_app')
@section('custom_style')
<style type="text/css">
  
</style>
@endsection
@section('main_content')
<div class="container-fluid">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6 pl-0">
                <h1 class="m-0 text-dark">Edit User</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('boiler/dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{url('boiler/users')}}">Users</a></li>
                  <li class="breadcrumb-item active">Edit User</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        @if($errors->any())
        <div class="alert alert-danger">
            {!! implode('', $errors->all('
            <strong>Error!</strong> :message<br>')) !!}
        </div>
        @endif
        <!-- Small boxes (Stat box) -->
        <div class="container-fluid">
          <div class="col-md-12 card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{url('/boiler/users',$user->id)}}" method="PUT" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-row">
                    <div class="form-group col-md-6 p-1">
                      <label for="first_name">First Name</label>
                      <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name" value="{{$user->first_name?? ''}}" required="">
                    </div>
                    <div class="form-group col-md-6 p-1">
                      <label for="last_name">Last Name</label>
                      <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter Last Name" value="{{$user->last_name?? ''}}" required="">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6 p-1">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{$user->email?? ''}}" required="">
                    </div>
                    <div class="form-group col-md-6 p-1">
                      <label for="password">Password</label>
                      <input type="text" name="password" id="password" class="form-control" value="allcor12345" required="">
                    </div>
                    <div class="form-group col-md-6 p-1 d-none">
                      <label>Password</label>
                      <div class="input-group" id="show_hide_password">
                        <input class="form-control" type="password" name="passsword" minlength="8" >
                        <div class="input-group-append">
                          <a href="" class="btn btn-light">
                              <i class="fa fa-eye-slash" aria-hidden="true"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6 offset-md-3 p-1">
                      <label for="phone_number">Phone Number</label>
                      <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Enter Phone Number" value="{{$user->phone_number ?? ''}}" required="">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">Update</button>
                </div>
              </form>
            </div>
        </div>
      </div><!-- /.container-fluid -->
@endsection
@section('custom_scripts')
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    $("label[for='dfdsafdsafsdaa']").text(event.target.files[0].name);
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});
</script>
@endsection