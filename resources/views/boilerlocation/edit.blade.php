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
                <h1 class="m-0 text-dark">Edit Boiler Installation City</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('boiler/dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{url('boiler/boilerbrand')}}">Boiler Brands</a></li>
                  <li class="breadcrumb-item active">Edit Boiler Brand</li>
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
                <h3 class="card-title">Edit Boiler Installation City</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{url('/boiler/boilerlocation',$boilerlocation->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                  <div class="form-row">
                    <div class="form-group col-md-6  p-1">
                      <label for="name">Boiler Installation City Name <small>(Max 70 Characters)</small> </label>
                      <input Brand="text" class="form-control" name="location_name" id="name" placeholder="Enter Boiler Installation City Name" value="{{$boilerlocation->location_name?? ''}}" required="" maxlenght = "70">
                    </div>
                    <div class="form-group col-md-6   p-1">
                      <label for="description">Boiler Installation City Description<small>(Max 150 Characters)</small></label>
                      <input Brand="text" name="location_description" class="form-control" id="description" placeholder="Enter Boiler Brand Description" value="{{$boilerlocation->location_description?? ''}}" required="" maxlenght = "150" >
                    </div>
                          
                  </div>

                  <div class="form-row">
                    <div class="col-md-3">
                      <div id="center_image" class="w-50 mx-auto">
                        <img src="{{($boilerlocation->filename)?asset('images/boilerlocation/'.$boilerlocation->filename):asset('images/no_image.jpg')}}" id="output" width="125px" height="125px" style="border: 2px solid black;">
                      </div>
                    </div>
                    <div class="col-md-9 pt-3">
                      <div class="form-group">
                        <label for="exampleInputFile">Boiler Installation City image <small></small></label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="filename" value="{{@$boilerlocation->filename ?? old('input_img') ?? ''}}" onchange="loadFile(event)">
                            <label class="custom-file-label" for="image_label">Choose file</label>
                          </div>
                          <span>image size :368*368</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br><br>
                  <label >Page Section:</label>
                  <br>
                  <div class="form-row">
                    <div class="col-md-3">
                      <div id="center_image" class="w-50 mx-auto">
                        <img src="{{($boilerlocation->main_image)?asset('images/boilerlocation/'.$boilerlocation->main_image):asset('images/no_image.jpg')}}" id="main_image_output" width="125px" height="125px" style="border: 2px solid black;">
                      </div>
                    </div>
                    <div class="col-md-9 pt-3">
                      <div class="form-group">
                        <label for="exampleInputFile">Boiler Installation City Mian image <small>(Optional)</small></label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="main_image" value="{{old('main_image')}}" onchange="loadFile1(event)" >
                            <label class="custom-file-label" for="image_label_main_image">{{($boilerlocation->main_image)?$boilerlocation->main_image:'Choose file'}}</label>
                          </div>
                           <span>image size :368*368</span>
                        </div>
                      </div>
                    </div>
                    </div>                  

                    <div class="form-row">
                        <div class="form-group col-md-12  p-1">
                          <label for="name">Boiler Installation City Info <small>(Max 1500 Characters)</small> </label>
                          <textarea id = "info" name = "info"  > @php if(isset($boilerlocation->info ) ) { echo $boilerlocation->info; } @endphp </textarea>
                        </div>                    
                    </div>
                    
                    <div class="form-row">
                        <div class="col-md-3">
                          <div id="center_image" class="w-50 mx-auto">
                            <img src="{{($boilerlocation->question_image)?asset('images/boilerlocation/'.$boilerlocation->question_image):asset('images/no_image.jpg')}}" id="output_question" width="125px" height="125px" style="border: 2px solid black;">
                          </div>
                        </div>
                        <div class="col-md-9 pt-3">
                          <div class="form-group">
                            <label for="exampleInputFile">Boiler Installation City Questions image <small>(Optional)</small></label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="question_image" value="{{old('question_image')}}" onchange="loadFile2(event)" >
                                <label class="custom-file-label" for="image_label_question">{{($boilerlocation->question_image)?$boilerlocation->question_image:'Choose file'}}</label>
                              </div>
                               <span>image size :138*293</span>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12  p-1">
                          <label for="name">Boiler Installation City Question <small>(Max 2500 Characters)</small> </label>
                          <textarea id = "question" name = "question"  >@php if(isset($boilerlocation->questions)){echo $boilerlocation->questions;} @endphp </textarea>
                        </div>                    
                    </div>                    
                    <div class="form-group col-md-12 p-1">
                    <label for="name">Meta_Name </label> <small>(Max 70 Characters)</small>
                    <input type="text" class="form-control" name="meta_name" id="meta_name" placeholder="Enter meta_name" value="{{old('meta_name') ?? $boilerlocation->meta_name}}" required="" maxlength="70">
                  </div>
                  <div class="form-group col-md-12 p-1">
                    <label for="description">Meta_Description <small>(Max 1500 Characters)</small></label>
                    <textarea maxlength="1500" name="meta_description" id="meta_description" class="form-control builder" placeholder="Enter meta_description">{{old('meta_description') ?? $boilerlocation->meta_description}}</textarea>
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

$(document).ready(function() {
  $('#info').summernote();
  $('#question').summernote();
});    

  var loadFile = function(event) {
    var output = document.getElementById('output');
    $("label[for='image_label']").text(event.target.files[0].name);
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  
  var loadFile1 = function(event) {
    var output = document.getElementById('main_image_output');
    $("label[for='image_label_main_image']").text(event.target.files[0].name);
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };  

  var loadFile2 = function(event) {
    var output = document.getElementById('output_question');
    $("label[for='image_label_question']").text(event.target.files[0].name);
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };  
  
  
</script>
@endsection