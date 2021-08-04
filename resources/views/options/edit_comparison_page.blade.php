@extends('layouts.admin_app')
@section('custom_style')
<script src="https://cdn.tiny.cloud/1/r2c95q2do50ivhfm600uwq6qhibta83o56njztimvyptg8sh/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<style type="text/css">
  .design_and_dimension_headings
  {
    text-decoration: underline;
  }
  .card-body
  {
    padding: 5px;
  }
  .edit_price{
    padding-top: 15px;
  }
  .edit_price .col-sm-3{
    padding-top: 5px;
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
                <h1 class="m-0 text-dark">Edit Options</h1>
              </div><!-- /.col -->
              <div class="col-sm-6"></div><!-- /.col -->
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

      
            <div class="container-fluid">
                    <div class="col-md-12 card card-primary">
                        <div class="card-header bg-dark">
                          <h3 class="card-title">Edit Comparison Page</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" id="form" action="{{url('/boiler/option_update')}}" method="POST">
                          @method('POST')
                          @csrf
                          <input type = 'hidden' name = 'belong' value = "{{ @$flag }}" >
                          <div class="card-body">

                            <div class="row">
                              <div class="col-md-10 offset-md-1">
                                <textarea id = "main" class= "builder" name = "firstcontainer">
                                  <?php  
                                      if(isset($firstcontainer) && ($firstcontainer) ){
                                          echo $firstcontainerHtml = json_decode($firstcontainer)->value;
                                      }
                                  ?>    
                                </textarea>
                              </div>
                            </div>
                          </div>
                        
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right thickness_update_btnn">Update</button>
                          </div>
                        </form>
                      </div>
                  </div>

           <div class="container-fluid">
          <div class="col-md-12 card card-primary">
              <div class="card-header bg-dark">
                <h3 class="card-title">Comparison Main Image</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="form" action="{{url('/boiler/option_update')}}" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <input type = 'hidden' name = 'belong' value = "{{ @$flag }}" >
                <div class="card-body">

                  <div class="row">
                    <div class="col-md-3">
                      <div id="center_image" class="w-50 mx-auto">
                        <img src="{{ (@$image)?asset('images/boilerfinance/'.$image):asset('images/no_image.jpg') }}" id="output" width="125px" height="125px" style="border: 2px solid black;">
                      </div>
                    </div>
                    <div class="col-md-9 pt-3">
                      <div class="form-group">
                        <label for="exampleInputFile">Comparison Page image <small></small></label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="comparison_page" value="{{old('comparison_page')}}" onchange="loadFile(event)" required="">
                            <label class="custom-file-label" for="image_label">Choose file</label>
                          </div>
                          <span>image size : 222*135</span>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
              
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right thickness_update_btnn">Update</button>
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

    // ClassicEditor
    //     .create( document.querySelector( '#main' ) )
    //     .catch( error => {
    //         console.error( error );
    // } );    

    // ClassicEditor
    //     .create( document.querySelector( '#questions' ) )
    //     .catch( error => {
    //         console.error( error );
    // } );   
    
    // ClassicEditor
    //     .create( document.querySelector( '#brands_info' ) )
    //     .catch( error => {
    //         console.error( error );
    // } );       


$(document).ready(function() {
  $('#main').summernote();
  $('#main1').summernote();
  $('#main2').summernote();
  $('#main3').summernote();

  $('#questions').summernote();
  $('#questions1').summernote();
  $('#questions2').summernote();
  $('#questions3').summernote();
  $('#guaranteed_slot').summernote();
});    

  var loadFile = function(event, id = '') {
    
    if(id == 'finance_byingstep_img1'){
        var output = document.getElementById('output1');
        $("label[for='image_label-step1']").text(event.target.files[0].name);
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src) // free memory
        }          
    }
    else if(id == 'finance_byingstep_img2'){
        var output = document.getElementById('output2');
        $("label[for='image_label-step2']").text(event.target.files[0].name);
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src) // free memory
        }          
    }
    else if(id == 'finance_byingstep_img3'){
        var output = document.getElementById('output3');
        $("label[for='image_label-step3']").text(event.target.files[0].name);
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src) // free memory
        }          
    }
    else{
        var output = document.getElementById('output');
        $("label[for='image_label']").text(event.target.files[0].name);
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src) // free memory
        }
    }
  };
  $(document).ready(function(){
    $('body').on('click', '.add_more', function(event) {
      $('.addMore').append('<div class="row mt-3 mainDiv" ><div class="col-md-9"><div class="form-group row"> <label class="col-sm-1 col-form-label">Size<span class="star-form"></span></label><div class="col-sm-5"> <input type="number" name="size[]" required="required" class="form-control" placeholder="Enter size in Inches"></div><label class="col-sm-1 col-form-label">Price<span class="star-form"></span></label><div class="col-sm-5"> <input type="number" name="price[]" required="required" class="form-control"></div> </div></div><div class="col-md-3"> <button type="button" class="btn btn-primary btn-sm add_more">Add</button> <button type="button" class="btn btn-sm bg-danger text-white remove_self">Remove</button></div></div>');
    });
    $('body').on('click', '.remove_self', function(event) {
      $(this).parent().parent().fadeOut(500).remove();
    });
  });



  
  $(".thickness_update_btn").on('click' , function(e) {
  var url = '{{url("/boiler/option_update")}}';
  $.ajax({
         type: "POST",
         url: url,
         data: $('body').find('#thickness_update').serialize(),
         success: function(data)
         {
           if(data == 'true'){
              $(".thickness_success").css("display", "block");
              setTimeout(function(){
                 $(".thickness_success").fadeOut();
              }, 5000);
            }
         }
       });
  });

  





</script>
@endsection