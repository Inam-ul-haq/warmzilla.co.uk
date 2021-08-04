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




        <!-- sink bowl end  -->
 

        <div class="container-fluid">
          <div class="col-md-12 card card-primary">
              <div class="card-header bg-dark">
                <h3 class="card-title">Finance Main Image</h3>
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
                        <label for="exampleInputFile">Finance Page image <small></small></label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="finance_byingstep_img" value="{{old('finance_byingstep_img')}}" onchange="loadFile(event)" required="">
                            <label class="custom-file-label" for="image_label">Choose file</label>
                          </div>
                          <span>image size :782*351</span>
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
                <h3 class="card-title">Edit Home Page</h3>
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
<!--new-->
    <div class="container-fluid">
          <div class="col-md-12 card card-primary">
              <div class="card-header bg-dark">
                <h3 class="card-title">Finance Buying Steps Bar</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="form" action="{{url('/boiler/option_update')}}" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <input type = 'hidden' name = 'belong' value = "{{ @$flag }}" >
                <div class="card-body">

                  <div class="row">
                    <div class="col-md-4 offset-md-1">
                      <div id="center_image" class="w-50 mx-auto">
                        <img src="{{ (@$finance_byingstep_img1)?asset('images/boilerfinance/'.$finance_byingstep_img1->value):asset('images/no_image.jpg') }}" id="output1" width="125px" height="125px" style="border: 2px solid black;">
                      </div>
                    </div>
                    <div class="col-md-4 pt-3 offset-md-1">
                      <div class="form-group">
                        <label for="finance_byingstep_img1">Finance Step 1 Image<small></small></label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="finance_byingstep_img1" name="finance_byingstep_img1" value="{{ (@$finance_byingstep_img1)? $finance_byingstep_img1->value : old('finance_byingstep_img1')}}" onchange="loadFile(event, 'finance_byingstep_img1')" >
                            <label class="custom-file-label" for="image_label-step1">{{ (@$finance_byingstep_img1)? $finance_byingstep_img1->value : 'Choose file' }}</label>
                          </div>
                           <span>image size :355*209</span>
                        </div>
                      </div>
                    </div>
                                     
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <h3> Step 1 Description </h3>    
                          <textarea id = "questions1" class= "builder" name = "finance_byingstep_text1">
                            <?php  
                                if(isset($finance_byingstep_text1) && ($finance_byingstep_text1) ){
                                    echo $finance_byingstep_text1 = json_decode($finance_byingstep_text1)->value;
                                }
                            ?>    
                          </textarea>
                    </div>                    
                  </div>                  
                <br>
                <div class="row">
                    <div class="col-md-4 offset-md-1">
                      <div id="center_image" class="w-50 mx-auto">
                        <img src="{{ (@$finance_byingstep_img2)?asset('images/boilerfinance/'.$finance_byingstep_img2->value):asset('images/no_image.jpg') }}" id="output2" width="125px" height="125px" style="border: 2px solid black;">
                      </div>
                    </div>
                    <div class="col-md-4 pt-3 offset-md-1">
                      <div class="form-group">
                        <label for="finance_byingstep_img2">Finance Step 2 Image<small></small></label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="finance_byingstep_img2" name="finance_byingstep_img2" value="{{ (@$finance_byingstep_img2)? $finance_byingstep_img2->value : old('finance_byingstep_img2')}}" onchange="loadFile(event, 'finance_byingstep_img2')" >
                            <label class="custom-file-label" for="image_label-step2">{{ (@$finance_byingstep_img2)? $finance_byingstep_img2->value : 'Choose file' }}</label>
                          </div>
                             <span>image size :355*209</span>
                        </div>
                      </div>
                    </div>
                                     
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <h3> Step 2 Description </h3>    
                          <textarea id = "questions2" class= "builder" name = "finance_byingstep_text2">
                            <?php  
                                if(isset($finance_byingstep_text2) && ($finance_byingstep_text2) ){
                                    echo $finance_byingstep_text2 = json_decode($finance_byingstep_text2)->value;
                                }
                            ?>    
                          </textarea>
                    </div>                    
                  </div>                  
                <br>
                <div class="row">
                    <div class="col-md-4 offset-md-1">
                      <div id="center_image" class="w-50 mx-auto">
                        <img src="{{ (@$finance_byingstep_img3)?asset('images/boilerfinance/'.$finance_byingstep_img3->value):asset('images/no_image.jpg') }}" id="output3" width="125px" height="125px" style="border: 2px solid black;">
                      </div>
                    </div>
                    <div class="col-md-4 pt-3 offset-md-1">
                      <div class="form-group">
                        <label for="finance_byingstep_img3">Finance Step 3 Image<small></small></label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="finance_byingstep_img3" name="finance_byingstep_img3" value="{{ (@$finance_byingstep_img3)? $finance_byingstep_img3->value : old('finance_byingstep_img3')}}" onchange="loadFile(event, 'finance_byingstep_img3')" >
                            <label class="custom-file-label" for="image_label-step3">{{ (@$finance_byingstep_img3)? $finance_byingstep_img3->value : 'Choose file'}}</label>
                          </div>
                             <span>image size :355*209</span>
                        </div>
                      </div>
                    </div>
                                     
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <h3> Step 3 Description </h3>    
                          <textarea id = "questions3" class= "builder" name = "finance_byingstep_text3">
                            <?php  
                                if(isset($finance_byingstep_text3) && ($finance_byingstep_text3) ){
                                    echo $finance_byingstep_text3 = json_decode($finance_byingstep_text3)->value;
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

<!--new end-->
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
                          <textarea id = "questions" class= "builder" name = "questions">
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
        
        <div class="container-fluid">
          <div class="col-md-12 card card-primary">
              <div class="card-header bg-dark">
                <h3 class="card-title">Edit Home Guaranteed Slot</h3>
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
                          <textarea id = "guaranteed_slot" class= "builder" name = "guaranteed_slot">
                            <?php  
                                if(isset($guaranteed_slot) && ($guaranteed_slot) ){
                                    echo $guaranteed_slot = json_decode($guaranteed_slot)->value;
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
    
    // ClassicEditor
    //     .create( document.querySelector( '#questions1' ) )
    //     .catch( error => {
    //         console.error( error );
    // } );    
    // ClassicEditor
    //     .create( document.querySelector( '#questions2' ) )
    //     .catch( error => {
    //         console.error( error );
    // } );    
    // ClassicEditor
    //     .create( document.querySelector( '#questions3' ) )
    //     .catch( error => {
    //         console.error( error );
    // } );        
    
    // ClassicEditor
    //     .create( document.querySelector( '#guaranteed_slot' ) )
    //     .catch( error => {
    //         console.error( error );
    // } );            


$(document).ready(function() {
  $('#main').summernote();
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