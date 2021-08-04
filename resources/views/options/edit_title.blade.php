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
                          <h3 class="card-title">Edit Title Home </h3>
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
                                <textarea id = "main" class= "builder" name = "titlehome_firstcontainer">
                                  <?php  
                                      if(isset($titlehome_firstcontainer) && ($titlehome_firstcontainer) ){
                                          echo $firstcontainerHtml = json_decode($titlehome_firstcontainer)->value;
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
                          <h3 class="card-title">Edit Title comparison</h3>
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
                                <textarea id = "main1" class= "builder" name = 
                                "titlecomparison_firstcontainer" >
                                  <?php  
                                      if(isset($titlecomparison_firstcontainer) && ($titlecomparison_firstcontainer) ){
                                          echo $firstcontainerHtml = json_decode($titlecomparison_firstcontainer)->value;
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
                          <h3 class="card-title">Edit title location</h3>
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
                                <textarea id = "main2" class= "builder" name = "titlelocation_firstcontainer">
                                  <?php  
                                      if(isset($titlelocation_firstcontainer) && ($titlelocation_firstcontainer) ){
                                          echo $firstcontainerHtml = json_decode($titlelocation_firstcontainer)->value;
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
                          <h3 class="card-title">Edit title city </h3>
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
                                <textarea id = "main3" class= "builder" name = "titlecity_firstcontainer">
                                  <?php  
                                      if(isset($titlecity_firstcontainer) && ($titlecity_firstcontainer) ){
                                          echo $firstcontainerHtml = json_decode($titlecity_firstcontainer)->value;
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
                          <h3 class="card-title">Edit Title Combi</h3>
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
                                <textarea id = "main4" class= "builder" name = 
                                "titlecombi_firstcontainer" >
                                  <?php  
                                      if(isset($titlecombi_firstcontainer) && ($titlecombi_firstcontainer) ){
                                          echo $firstcontainerHtml = json_decode($titlecombi_firstcontainer)->value;
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
                          <h3 class="card-title">Edit Title Regular</h3>
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
                                <textarea id = "main5" class= "builder" name = "titleregular_firstcontainer">
                                  <?php  
                                      if(isset($titleregular_firstcontainer) && ($titleregular_firstcontainer) ){
                                          echo $firstcontainerHtml = json_decode($titleregular_firstcontainer)->value;
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
                          <h3 class="card-title">Edit Title System</h3>
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
                                <textarea id = "main6" class= "builder" name = "titlesystem_firstcontainer">
                                  <?php  
                                      if(isset($titlesystem_firstcontainer) && ($titlesystem_firstcontainer) ){
                                          echo $firstcontainerHtml = json_decode($titlesystem_firstcontainer)->value;
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
    //     .create( document.querySelector( '#brands_info' ) )
    //     .catch( error => {
    //         console.error( error );
    // } );       


$(document).ready(function() {
  $('#main').summernote();
  $('#main1').summernote();
  $('#main2').summernote();
  $('#main3').summernote();
  $('#main4').summernote();
  $('#main5').summernote();
  $('#main6').summernote();

});    

 
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
