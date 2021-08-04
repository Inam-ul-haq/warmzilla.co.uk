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
                <h1 class="m-0 text-dark">Edit Boiler Type</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('boiler/dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{url('boiler/boilertype')}}">Boiler types</a></li>
                  <li class="breadcrumb-item active">Edit Boiler Type</li>
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
                <h3 class="card-title">Edit Boiler Type</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{url('boilertype',$boiler->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                  <div class="form-row">
                    <div class="form-group col-md-6 offset-md-3 p-1">
                      <label for="name">Boiler Brand Name <small>(Max 70 Characters)</small> </label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Enter Boiler Type Name" value="{{$boiler->name?? ''}}" required="" maxlength="70">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6 offset-md-3  p-1">
                      <label for="description">Boiler Brand Description <small>(Max 100 Characters)</small> </label>
                      <input type="text" name="description" class="form-control" id="description" placeholder="Enter Boiler Type Description" value="{{$boiler->description?? ''}}" required="" maxlength="100">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
              </form>
            </div>
        </div>
        <div class="form-group col-md-12 p-1">
                    <label for="name">Meta_Name </label> <small>(Max 70 Characters)</small>
                    <input type="text" class="form-control" name="meta_name" id="meta_name" placeholder="Enter meta_name" value="{{old('meta_name') ?? $finish->meta_name}}" required="" maxlength="70">
                  </div>
                  <div class="form-group col-md-12 p-1">
                    <label for="description">Meta_Description <small>(Max 1500 Characters)</small></label>
                    <textarea maxlength="1500" name="meta_description" id="meta_description" class="form-control builder" placeholder="Enter meta_description">{{old('meta_description') ?? $finish->meta_description}}</textarea>
                  </div>                       
      </div><!-- /.container-fluid -->
@endsection
@section('custom_scripts')
<script>
  // var loadFile = function(event) {
  //   var output = document.getElementById('output');
  //   $("label[for='dfdsafdsafsdaa']").text(event.target.files[0].name);
  //   output.src = URL.createObjectURL(event.target.files[0]);
  //   output.onload = function() {
  //     URL.revokeObjectURL(output.src) // free memory
  //   }
  // };
//   $(document).ready(function() {
//     $("#show_hide_password a").on('click', function(event) {
//         event.preventDefault();
//         if($('#show_hide_password input').attr("type") == "text"){
//             $('#show_hide_password input').attr('type', 'password');
//             $('#show_hide_password i').addClass( "fa-eye-slash" );
//             $('#show_hide_password i').removeClass( "fa-eye" );
//         }else if($('#show_hide_password input').attr("type") == "password"){
//             $('#show_hide_password input').attr('type', 'text');
//             $('#show_hide_password i').removeClass( "fa-eye-slash" );
//             $('#show_hide_password i').addClass( "fa-eye" );
//         }
//     });
// });
</script>
@endsection