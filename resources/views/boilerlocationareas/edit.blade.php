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
                <h1 class="m-0 text-dark">Edit Boiler Installation Area</h1>
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
                <h3 class="card-title">Edit Boiler Installation Area</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{url('boilerlocationarea',$boilerlocation->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                  <div class="form-row">
                    <div class="form-group col-md-6  p-1">
                      <label for="name">Boiler Installation Area Name <small>(Max 70 Characters)</small> </label>
                      <input type="text" class="form-control" name="area_name" id="area_name" placeholder="Enter Boiler Installation Area Name" value="{{($boilerlocation->name)?$boilerlocation->name :old('area_name')}}" required="" maxlength = "70">
                    </div>
                    <div class="form-group col-md-6  p-1">
                      <label for="name">Boiler Installation City  </label>
                      <select name="city_name" id="city_name" class="form-control" required>
                          <option> Select City</option>
                          @foreach(@$cities as $city)
                            <option value = "{{$city->id}}" {{ $city->id == $boilerlocation->city ? 'selected' : '' }}>{{$city->location_name}}</option>
                          @endforeach
                      </select>
                    </div>                    
                  </div>
             <!--      <div class="form-row">
                    <div class="col-md-3">
                      <div id="center_image" class="w-50 mx-auto">
                        <img src="{{($boilerlocation->main_image)?asset('images/boilerlocation/'.$boilerlocation->main_image):asset('images/no_image.jpg')}}" id="output" width="125px" height="125px" style="border: 2px solid black;">
                      </div>
                    </div>
                    <div class="col-md-9 pt-3">
                      <div class="form-group">
                        <label for="exampleInputFile">Boiler Installation Area Mian image <small>(Optional)</small></label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="filename" value="{{old('filename')}}" onchange="loadFile(event)" >
                            <label class="custom-file-label" for="image_label">{{($boilerlocation->main_image)?$boilerlocation->main_image:'Choose file'}}</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12  p-1">
                          <label for="name">Boiler Installation Area Info <small>(Max 1500 Characters)</small> </label>
                          <textarea id = "area_info" name = "area_info"  > @php if(isset($boilerlocation->main_info ) ) { echo $boilerlocation->main_info; } @endphp </textarea>
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
                            <label for="exampleInputFile">Boiler Installation Area Questions image <small>(Optional)</small></label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="question_image" value="{{old('question_image')}}" onchange="loadFile1(event)" >
                                <label class="custom-file-label" for="image_label_question">{{($boilerlocation->question_image)?$boilerlocation->question_image:'Choose file'}}</label>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12  p-1">
                          <label for="name">Boiler Installation Area Question <small>(Max 2500 Characters)</small> </label>
                          <textarea id = "area_question" name = "area_question"  >@php if(isset($boilerlocation->questions)){echo $boilerlocation->questions;} @endphp </textarea>
                        </div>                    
                    </div>                    


                </div> -->
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

//   tinymce.init({
//     selector:'.builder', 
//   })

$(document).ready(function() {
  $('#area_info').summernote();
  $('#area_question').summernote();
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
    var output = document.getElementById('output_question');
    $("label[for='image_label_question']").text(event.target.files[0].name);
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  
</script>
@endsection