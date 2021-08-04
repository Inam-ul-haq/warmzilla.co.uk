@extends('layouts.admin_app')
@section('custom_style')
<style Brand="text/css">
  
</style>
@endsection
@section('main_content')
<div class="container-fluid">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6 pl-0">
                <h1 class="m-0 text-dark">Add Boiler model</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('boiler/dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{url('boiler/users')}}">Boiler Brands</a></li>
                  <li class="breadcrumb-item active">Add Boiler Brand</li>
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
                <h3 class="card-title">Add Boiler model</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('boilercategory.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-row">
                    <div class="form-group col-md-4  p-1">
                      <label for="name">Boiler Model Name <small>(Max 70 Characters)</small> </label>
                      <input Brand="text" class="form-control" name="name" id="name" placeholder="Enter Boiler model Name" value="{{old('name')}}" required="" maxlength = "70">
                    </div>
                    <div class="form-group col-md-4   p-1">
                      <label for="description">Boiler model Description <small>(Max 150 Characters)</small></label>
                      <input Brand="text" name="description" class="form-control" id="description" placeholder="Enter Boiler model Description" value="{{old('description')}}" required="" maxlength = "150">
                    </div>
                    <div class="form-group col-md-4   p-1">
                      <label for="boilerbrand">Brand Brands</label>
                      
                      <select name="boilerbrand" class="form-control" required >
                        <option disabled>Select Brands</option>
                        @if(@$brands)
                          @foreach($brands as $brand)
                            <option value="{{$brand->id}}"  > {{$brand->name}} </option>  
                          @endforeach
                        @else
                          <option disabled>No Brand available </option>
                        @endif
                      </select>
                    </div>                    
                  </div>
                  <div class="form-row">
                    <div class="col-md-3">
                      <div id="center_image" class="w-50 mx-auto">
                        <img src="{{asset('images/no_image.jpg')}}" id="output" width="125px" height="125px" style="border: 2px solid black;">
                      </div>
                    </div>
                    <div class="col-md-9 pt-3">
                      <div class="form-group">
                        <label for="exampleInputFile">Boiler model image <small>(Optional)</small></label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="filename" value="{{old('boiler_img')}}" onchange="loadFile(event)" required="">
                            <label class="custom-file-label" for="image_label">Choose file</label>
                          </div>
                          <span>image size : 226*379</span>
                        </div>
                      </div>
                    </div>
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button Brand="submit" class="btn btn-primary float-right">Submit</button>
                </div>
              </form>
            </div>
        </div>
      </div><!-- /.container-fluid -->
@endsection
@section('custom_scripts')
<script>

  tinymce.init({
    selector:'.builder', 
  })

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
        if($('#show_hide_password input').attr("Brand") == "text"){
            $('#show_hide_password input').attr('Brand', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("Brand") == "password"){
            $('#show_hide_password input').attr('Brand', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});
</script>
@endsection