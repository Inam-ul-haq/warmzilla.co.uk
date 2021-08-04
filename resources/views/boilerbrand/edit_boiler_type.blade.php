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
                <h1 class="m-0 text-dark">Edit Boiler Brand</h1>
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
                <h3 class="card-title">Edit Boiler Brand</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{url('/boiler/boilerbrand',$boiler->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                  <div class="form-row">
                    <div class="form-group col-md-6  p-1">
                      <label for="name">Boiler Brand Name <small>(Max 70 Characters)</small> </label>
                      <input Brand="text" class="form-control" name="name" id="name" placeholder="Enter Boiler Brand Name" value="{{$boiler->name?? ''}}" required="" maxlength="70">
                    </div>
                    <div class="form-group col-md-6   p-1">
                      <label for="description">Boiler Brand Description <small>(Max 100 Characters)</small> </label>
                      <input Brand="text" name="description" class="form-control" id="description" placeholder="Enter Boiler Brand Description" value="{{$boiler->description?? ''}}" required=""  maxlength="100">
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-3">
                      <div id="center_image" class="w-50 mx-auto">
                        <img src="{{($boiler->filename)?asset('images/boilerbrand/'.$boiler->filename):asset('images/no_image.jpg')}}" id="output" width="125px" height="125px" style="border: 2px solid black;">
                      </div>
                    </div>
                    <div class="col-md-9 pt-3">
                      <div class="form-group">
                        <label for="exampleInputFile">Boiler image <small>(Optional)</small></label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="boiler_img" value="{{@$boiler->filename ?? old('input_img') ?? ''}}" onchange="loadFile(event)">
                            <label class="custom-file-label" for="image_label">Choose file</label>
                          </div>
                          <span>image size : 175*70</span>
                        </div>
                      </div>
                    </div>
                  </div>
                      <div class="form-row">
                    <div class="form-group col-md-10 offset-md-1 p-1">
                      <label for="name">Boiler Brand Title<small> (Max 3000 Characters)</label>
                      <textarea id = "main1" class= "builder" name = "brand_title" maxlength="3000"> 
                        @if(@$boiler->brand_title)
                            {{ html_entity_decode($boiler->brand_title) }}
                        @endif
                      </textarea>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-10 offset-md-1 p-1">
                      <label for="name">Boiler Brand Questions<small> (Max 3000 Characters)</label>
                      <textarea id = "main" class= "builder" name = "brand_questions" maxlength="3000"> 
                        @if(@$boiler->brand_questions)
                            {{ html_entity_decode($boiler->brand_questions) }}
                        @endif
                      </textarea>
                    </div>
                  </div>


                  <div class="form-row">
                    <div class="col-md-3">
                      <div id="center_image" class="w-50 mx-auto">
                        <img src="{{($boiler->boiler_question_img)?asset('images/boilerbrand/'.$boiler->boiler_question_img):asset('images/no_image.jpg')}}" id="outputQuestion" width="125px" height="125px" style="border: 2px solid black;">
                      </div>
                    </div>
                    <div class="col-md-9 pt-3">
                      <div class="form-group">
                        <label for="exampleInputMainFile">Boiler Question Image<small>(Optional)</small></label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputMainFile" name="boiler_question_img" value="{{@$boiler->boiler_question_img ?? old('boiler_question_img') ?? ''}}" onchange="loadFileQuestion(event)" >
                            <label class="custom-file-label" for="image_question_label">Choose file</label>
                          </div>
                          <span>image size : 226*379</span>
                        </div>
                      </div>
                    </div>
                  </div>

                    </br>
<!--new-->
                  <div class="form-row">
                    <div class="col-md-3">
                      <div id="center_image" class="w-50 mx-auto">
                        <img src="{{($boiler->boiler_main_img)?asset('images/boilerbrand/'.$boiler->boiler_main_img):asset('images/no_image.jpg')}}" id="outputMain" width="125px" height="125px" style="border: 2px solid black;">
                      </div>
                    </div>
                    <div class="col-md-9 pt-3">
                      <div class="form-group">
                        <label for="exampleInputMainFile">Boiler Main Image<small>(Optional)</small></label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputMainFile" name="boiler_main_img" value="{{@$boiler->boiler_main_img ?? old('boiler_main_img') ?? ''}}" onchange="loadFileMain(event)" >
                            <label class="custom-file-label" for="image_Main_label">Choose file</label>
                          </div>
                             <span> image size : 650*360</span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-10 offset-md-1 p-1">
                      <label for="name">Boiler Brand Info<small> (Max 3000 Characters)</label>
                      <textarea id = "info" class= "builder" name = "brand_info" maxlength="3000" required> 
                        @if(@$boiler->brand_info)
                            {{ html_entity_decode($boiler->brand_info) }}
                        @endif
                      </textarea>
                    </div>
                  </div>
<!--new end-->
<div class="form-group col-md-12 p-1">
                    <label for="name">Meta_Name </label> <small>(Max 70 Characters)</small>
                    <input type="text" class="form-control" name="meta_name" id="meta_name" placeholder="Enter meta_name" value="{{old('meta_name') ?? $boiler->meta_name}}" required="" maxlength="70">
                  </div>
                  <div class="form-group col-md-12 p-1">
                    <label for="description">Meta_Description <small>(Max 1500 Characters)</small></label>
                    <textarea maxlength="1500" name="meta_description" id="meta_description" class="form-control builder" placeholder="Enter meta_description">{{old('meta_description') ?? $boiler->meta_description}}</textarea>
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

//   tinymce.init({
//     selector:'.builder', 
//   })


$(document).ready(function() {
  $('#main').summernote();
  $('#info').summernote();
  $('#main1').summernote();
});

    // ClassicEditor
    //     .create( document.querySelector( '#main' ) )
    //     .catch( error => {
    //         console.error( error );
    // } );

    // ClassicEditor
    //     .create( document.querySelector( '#info' ) )
    //     .catch( error => {
    //         console.error( error );
    // } );    


  var loadFile = function(event) {
    var output = document.getElementById('output');
    $("label[for='image_label']").text(event.target.files[0].name);
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  
  var loadFileMain = function(event) {
    var output = document.getElementById('outputMain');
    $("label[for='image_Main_label']").text(event.target.files[0].name);
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };  
  
  var loadFileQuestion = function(event) {
    var output = document.getElementById('outputQuestion');
    $("label[for='image_Question_label']").text(event.target.files[0].name);
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };    
//   boiler_question_img
  
//   $(document).ready(function() {
//     $("#show_hide_password a").on('click', function(event) {
//         event.preventDefault();
//         if($('#show_hide_password input').attr("Brand") == "text"){
//             $('#show_hide_password input').attr('Brand', 'password');
//             $('#show_hide_password i').addClass( "fa-eye-slash" );
//             $('#show_hide_password i').removeClass( "fa-eye" );
//         }else if($('#show_hide_password input').attr("Brand") == "password"){
//             $('#show_hide_password input').attr('Brand', 'text');
//             $('#show_hide_password i').removeClass( "fa-eye-slash" );
//             $('#show_hide_password i').addClass( "fa-eye" );
//         }
//     });
// });
</script>
@endsection