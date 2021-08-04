@extends('layouts.admin_app')
@section('custom_style')
<style type="text/css">
  .design_and_dimension_headings
  {
    text-decoration: underline;
  }
  .card-body
  {
    padding: 5px;
  }
</style>
@endsection
@section('main_content')
<div class="container-fluid">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6 pl-0">
                <h1 class="m-0 text-dark">Edit Design</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('boiler/dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{url('boiler/designs')}}">Designs</a></li>
                  <li class="breadcrumb-item active">Edit Design</li>
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
              <div class="card-header bg-dark">
                <h3 class="card-title">Edit Design</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{url('designs',$design->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6" style="border-right: 2px solid grey;">
                      <h4 class="design_and_dimension_headings">Design Info</h4>
                      <div class="form-group col-md-12 p-1">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="design_name" id="name" placeholder="Enter Name" value="{{old('design_name') ?? $design->name}}" required="">
                      </div>
                      <div class="form-group col-md-12 p-1">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" placeholder="Enter description">{{old('description') ?? $design->description}}</textarea>
                      </div>
                      <div class="form-row">
                        <div class="col-md-5">
                          <div id="center_image" class="w-50 mx-auto">
                            <img src='{{asset("images/designs/$design->filename")??asset("images/user.png")}}' id="output" width="125px" height="125px" style="border: 2px solid black;">
                          </div>
                        </div>
                        <div class="col-md-7 pt-3">
                          <div class="form-group">
                            <label for="exampleInputFile">Edge image</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="design_img" value="{{old('design_img')}}" onchange="loadFile(event)">
                                <label class="custom-file-label" for="image_label">Choose file</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <h4 class="design_and_dimension_headings float-left">Dimensions</h4>
                      <button type="button" class="btn btn-primary btn-sm add_more float-right">Add Dimension</button>
                      <div style="clear: both;"></div>
                      @foreach($design->dimensions as $key => $dimension)
                        <div class="row mt-3 mainDiv" >
                          <div class="col-md-9">
                            <div class="form-group row">
                              <label class="col-sm-5 col-form-label">Dimension's Name<span class="star-form"></span></label>
                              <div class="col-sm-7">
                                <input type="text" name="dimensions[]" required="required" value="{{$dimension->name}}" class="form-control">  
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <button type="button" class="btn btn-primary btn-sm add_more">Add</button>
                            @if($key>0)
                              <button type="button" class="btn btn-sm bg-danger text-white remove_self">Remove</button>
                            @endif
                          </div>
                        </div>
                      @endforeach
                      <div class="addMore"></div>
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
    $("label[for='image_label']").text(event.target.files[0].name);
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  $(document).ready(function(){
    $('body').on('click', '.add_more', function(event) {
      $('.addMore').append('<div class="row mt-3 mainDiv" ><div class="col-md-9"><div class="form-group row"> <label class="col-sm-3 col-form-label">Label<span class="star-form"></span></label><div class="col-sm-9"> <input type="text" name="dimensions[]" required="required" class="form-control"></div></div></div><div class="col-md-3"> <button type="button" class="btn btn-primary btn-sm add_more">Add</button> <button type="button" class="btn btn-sm bg-danger text-white remove_self">Remove</button></div></div>');
    });
    $('body').on('click', '.remove_self', function(event) {
      $(this).parent().parent().fadeOut(500).remove();
    });
  });
</script>
@endsection