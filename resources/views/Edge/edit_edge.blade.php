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
                <h1 class="m-0 text-dark">Edit Edge</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/edges')}}">Edges</a></li>
                  <li class="breadcrumb-item active">Edit Edge</li>
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
                <h3 class="card-title">Edit Edge</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{url('edges',$edge->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                  <div class="form-group col-md-12 p-1">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="edge_name" id="name" placeholder="Enter Name" value="{{old('edge_name') ?? $edge->name}}" required="">
                  </div>
                  <div class="form-group col-md-12 p-1">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" placeholder="Enter description">{{old('description') ?? $edge->description}}</textarea>
                  </div>
                  <div class="form-row">
                    <div class="col-md-3">
                      <div id="center_image" class="w-50 mx-auto">
                        <img src="{{asset('images/edges/'.$edge->filename)}}" id="output" width="125px" height="125px" style="border: 2px solid black;">
                      </div>
                    </div>
                    <div class="col-md-9 pt-3">
                      <div class="form-group">
                        <label for="exampleInputFile">Edge image</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="edge_img" value="{{$edge->filename ?? old('input_img') ?? ''}}" onchange="loadFile(event)">
                            <label class="custom-file-label" for="image_label">Choose file</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12 mt-2 p-1">
                      <label for="price">Price</label>
                      <input type="number" step=.01 name="edge_price" id="price" class="form-control" placeholder="Enter Price" value="{{$edge->price ?? old('edge_price')}}" required="">
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