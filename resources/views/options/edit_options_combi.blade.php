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




        <!-- sink bowl end  -->
 

        <div class="container-fluid">
          <div class="col-md-12 card card-primary">
              <div class="card-header bg-dark">
                <h3 class="card-title">Combi Boiler Main Image</h3>
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
                        <img src="{{ (@$image)?asset('images/boilerlocation/'.$image):asset('images/no_image.jpg') }}" id="output" width="125px" height="125px" style="border: 2px solid black;">
                      </div>
                    </div>
                    <div class="col-md-9 pt-3">
                      <div class="form-group">
                        <label for="exampleInputFile">Combi Boiler image <small></small></label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="combiboiler_page_img" value="{{old('combiboiler_page_img')}}" onchange="loadFile(event, 'combiboiler_page_img')" required="">
                            <label class="custom-file-label" for="image_label">{{ (@$image)?$image :'Choose file' }}</label>
                          </div>
                          <span>image size : 633 * 284</span>
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

        <div class="container-fluid">
          <div class="col-md-12 card card-primary">
              <div class="card-header bg-dark">
                <h3 class="card-title">Edit Combi Boiler Info</h3>
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
                      <textarea id = "main" class= "builder" name = "combiboiler_firstcontainer">
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
                <h3 class="card-title">Combi Boiler Main Image</h3>
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
                        <img src="{{ (@$image2)?asset('images/boilerlocation/'.$image2):asset('images/no_image.jpg') }}" id="output2" width="125px" height="125px" style="border: 2px solid black;">
                      </div>
                    </div>
                    <div class="col-md-9 pt-3">
                      <div class="form-group">
                        <label for="exampleInputFile">Combi Boiler image <small></small></label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="pageexampleInputFile" name="combiboiler_question_img" value="{{old('combiboiler_question_img')}}" onchange="loadFile(event, 'combiboiler_question_img')" required="">
                            <label class="custom-file-label" for="image_label2">{{ (@$image2)?$image2 :'Choose file' }}</label>
                          </div>
                               <span>image size : 138*293</span>
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

        <div class="container-fluid">
          <div class="col-md-12 card card-primary">
              <div class="card-header bg-dark">
                <h3 class="card-title">Edit Home Page Questions</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="form" action="{{url('/boiler/option_update')}}" method="POST">
                @method('POST')
                @csrf
                <div class="card-body">
                    <input type = 'hidden' name = 'belong' value = "{{ @$flag }}" >
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                          <textarea id = "questions" class= "builder" name = "combiboiler_questions">
                            <?php  
                                if(isset($questions) && ($questions) ){
                                    echo $questionsHtml = json_decode($questions)->value;
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
    
    
$(document).ready(function() {
  $('#main').summernote();
  $('#questions').summernote();
});    

  var loadFile = function(event, id = '') {
    if(id == 'combiboiler_question_img'){
        var output = document.getElementById('output2');
        $("label[for='image_label2']").text(event.target.files[0].name);
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


  $(".price_pr_inch_btn").on('click' , function(e) {
  var url = '{{url("/boiler/option_update")}}';
  $.ajax({
         type: "POST",
         url: url,
         data: $('body').find('#price_edit_form').serialize(),
         success: function(data)
         {
            if(data == 'true'){
              $(".price_success").css("display", "block");
              setTimeout(function(){
                 $(".price_success").fadeOut();
              }, 5000);
            }
         }
       });
  });
        $(".sink_price_pr_inch_btn").on('click' , function(e) {
            var url = '{{url("/boiler/option_update")}}';
              $.ajax({
                  type: "POST",
                  url: url,
                  data: $('body').find('#sink_price_edit_form').serialize(),
                  success: function(data)
                  {
                  if(data == 'true'){
                  $(".sink_price_success").css("display", "block");
                  setTimeout(function(){
                  $(".sink_price_success").fadeOut();
                    }, 5000);
                    }
            }
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

  // cooking hub ajax
   $(".cooking_hub_price_btn").on('click' , function(e) {
  var url = '{{url("/boiler/option_update")}}';
  $.ajax({
         type: "POST",
         url: url,
         data: $('body').find('#cooking_hub_frm').serialize(),
         success: function(data)
         {
           if(data == 'true'){
              $(".cooking_hub_success").css("display", "block");
              setTimeout(function(){
                 $(".cooking_hub_success").fadeOut();
              }, 5000);
            }
         }
       });
  });

  // pressed_drainer ajax
   $(".pressed_drainer_price_btn").on('click' , function(e) {
  var url = '{{url("/boiler/option_update")}}';
  $.ajax({
         type: "POST",
         url: url,
         data: $('body').find('#pressed_drainer_frm').serialize(),
         success: function(data)
         {
           if(data == 'true'){
              $(".pressed_drainer_success").css("display", "block");
              setTimeout(function(){
                 $(".pressed_drainer_success").fadeOut();
              }, 5000);
            }
         }
       });
  });



</script>
@endsection