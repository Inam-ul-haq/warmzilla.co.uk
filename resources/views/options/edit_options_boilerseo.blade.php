@extends('layouts.admin_app')
@section('custom_style')
<style type="text/css">

.input-tags {
  width: 100%;
  padding: 15px;
  display: block;
  margin: 0 auto;
}

.label-info {
  background-color: #5bc0de;
  padding: 3px;
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
                <h1 class="m-0 text-dark">Edit Boiler SEO</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('boiler/dashboard')}}">Home</a></li>
                 <!--  <li class="breadcrumb-item"><a href="{{url('boiler/finish')}}">Boiler</a></li> -->
                  <li class="breadcrumb-item active">Edit Boiler SEO</li>
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
                <h3 class="card-title">Edit Boiler</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" id="form" action="{{url('/boiler/option_update')}}" method="POST">
                @method('POST')
                   @csrf
                <div class="card-body">
                     <input type = 'hidden' name = 'belong' value = "{{ @$flag }}" >
                <div class="form-group col-md-12 p-1">
                    <label for="name">Boiler_brands_title </label> <small>(Max 70 Characters)</small>
                     <textarea maxlength="1500" name="boiler_brands_title" id="meta_description" class="form-control builder" placeholder="Enter meta_title">      <?php  
                            if(isset($boiler_brands_title) && ($boiler_brands_title) ){
                                echo $firstcontainerHtml = json_decode($boiler_brands_title)->value;
                            }
                        ?>    </textarea>
                  </div>
                  <div class="form-group col-md-12 p-1">
                    <label for="description">Boiler_brands_description <small>(Max 1500 Characters)</small></label>
                    <textarea maxlength="1500" name="boiler_brands_description" id="meta_description" class="form-control builder" placeholder="Enter meta_description">      <?php  
                            if(isset($boiler_brands_description) && ($boiler_brands_description) ){
                                echo $firstcontainerHtml = json_decode($boiler_brands_description)->value;
                            }
                        ?>    </textarea>
                  </div>                              
<!-- here end -->          
         <div class="form-group col-md-12 p-1">
                    <label for="name">Boiler_comparison_title </label> <small>(Max 70 Characters)</small>
                     <textarea maxlength="1500" name="boiler_comparison_title" id="meta_description" class="form-control builder" placeholder="Enter meta_title">      <?php  
                            if(isset($boiler_comparison_title) && ($boiler_comparison_title) ){
                                echo $firstcontainerHtml = json_decode($boiler_comparison_title)->value;
                            }
                        ?>    </textarea>
                  </div>
                  <div class="form-group col-md-12 p-1">
                    <label for="description">Boiler_comparison_description <small>(Max 1500 Characters)</small></label>
                    <textarea maxlength="1500" name="boiler_comparison_description" id="meta_description" class="form-control builder" placeholder="Enter meta_description">      <?php  
                            if(isset($boiler_comparison_description) && ($boiler_comparison_description) ){
                                echo $firstcontainerHtml = json_decode($boiler_comparison_description)->value;
                            }
                        ?>    </textarea>
                  </div>                              
<!-- here end -->                                     
<!-- here end -->          
  <div class="form-group col-md-12 p-1">
                    <label for="name">Boiler_installation_locations_title </label> <small>(Max 70 Characters)</small>
                     <textarea maxlength="1500" name="boiler_installation_locations_title" id="meta_description" class="form-control builder" placeholder="Enter meta_title">      <?php  
                            if(isset($boiler_installation_locations_title) && ($boiler_installation_locations_title) ){
                                echo $firstcontainerHtml = json_decode($boiler_installation_locations_title)->value;
                            }
                        ?>    </textarea>
                  </div>
                  <div class="form-group col-md-12 p-1">
                    <label for="description">Boiler_installation_locations_description <small>(Max 1500 Characters)</small></label>
                    <textarea maxlength="1500" name="boiler_installation_locations_description" id="meta_description" class="form-control builder" placeholder="Enter meta_description">      <?php  
                            if(isset($boiler_installation_locations_description) && ($boiler_installation_locations_description) ){
                                echo $firstcontainerHtml = json_decode($boiler_installation_locations_description)->value;
                            }
                        ?>    </textarea>
                  </div>                              
<!-- here end -->                                       
<!-- here end -->          
                <div class="form-group col-md-12 p-1">
                    <label for="name">Boiler_finance_title </label> <small>(Max 70 Characters)</small>
                     <textarea maxlength="1500" name="boiler_finance_title" id="meta_description" class="form-control builder" placeholder="Enter meta_title">      <?php  
                            if(isset($boiler_finance_title) && ($boiler_finance_title) ){
                                echo $firstcontainerHtml = json_decode($boiler_finance_title)->value;
                            }
                        ?>    </textarea>
                  </div>
                  <div class="form-group col-md-12 p-1">
                    <label for="description">Boiler_finance_description <small>(Max 1500 Characters)</small></label>
                    <textarea maxlength="1500" name="boiler_finance_description" id="meta_description" class="form-control builder" placeholder="Enter meta_description">      <?php  
                            if(isset($boiler_finance_description) && ($boiler_finance_description) ){
                                echo $firstcontainerHtml = json_decode($boiler_finance_description)->value;
                            }
                        ?>    </textarea>
                  </div>                              
<!-- here end -->                                     
<!-- here end -->          
               <div class="form-group col-md-12 p-1">
                    <label for="name">Combi_boilers_title </label> <small>(Max 70 Characters)</small>
                     <textarea maxlength="1500" name="combi_boilers_title" id="meta_description" class="form-control builder" placeholder="Enter meta_title">      <?php  
                            if(isset($combi_boilers_title) && ($combi_boilers_title) ){
                                echo $firstcontainerHtml = json_decode($combi_boilers_title)->value;
                            }
                        ?>    </textarea>
                  </div>
                  <div class="form-group col-md-12 p-1">
                    <label for="description">Combi_boilers_description <small>(Max 1500 Characters)</small></label>
                    <textarea maxlength="1500" name="combi_boilers_description" id="meta_description" class="form-control builder" placeholder="Enter meta_description">      <?php  
                            if(isset($combi_boilers_description) && ($combi_boilers_description) ){
                                echo $firstcontainerHtml = json_decode($combi_boilers_description)->value;
                            }
                        ?>    </textarea>
                  </div>                              
<!-- here end -->                                      
<!-- here end -->          
 <div class="form-group col-md-12 p-1">
                    <label for="name">System_boilers_title </label> <small>(Max 70 Characters)</small>
                     <textarea maxlength="1500" name="system_boilers_title" id="meta_description" class="form-control builder" placeholder="Enter meta_title">      <?php  
                            if(isset($system_boilers_title) && ($system_boilers_title) ){
                                echo $firstcontainerHtml = json_decode($system_boilers_title)->value;
                            }
                        ?>    </textarea>
                  </div>
                  <div class="form-group col-md-12 p-1">
                    <label for="description">System_boilers_description <small>(Max 1500 Characters)</small></label>
                    <textarea maxlength="1500" name="system_boilers_description" id="meta_description" class="form-control builder" placeholder="Enter meta_description">      <?php  
                            if(isset($system_boilers_description) && ($system_boilers_description) ){
                                echo $firstcontainerHtml = json_decode($system_boilers_description)->value;
                            }
                        ?>    </textarea>
                  </div>                              
<!-- here end -->                                      
<!-- here end -->          
                  <div class="form-group col-md-12 p-1">
                    <label for="name">Regular_boilers_title </label> <small>(Max 70 Characters)</small>
                     <textarea maxlength="1500" name="regular_boilers_title" id="meta_description" class="form-control builder" placeholder="Enter meta_title">      <?php  
                            if(isset($regular_boilers_title) && ($regular_boilers_title) ){
                                echo $firstcontainerHtml = json_decode($regular_boilers_title)->value;
                            }
                        ?>    </textarea>
                  </div>
                  <div class="form-group col-md-12 p-1">
                    <label for="description">Regular_boilers_description <small>(Max 1500 Characters)</small></label>
                    <textarea maxlength="1500" name="regular_boilers_description" id="meta_description" class="form-control builder" placeholder="Enter meta_description">      <?php  
                            if(isset($regular_boilers_description) && ($regular_boilers_description) ){
                                echo $firstcontainerHtml = json_decode($regular_boilers_description)->value;
                            }
                        ?>    </textarea>
                  </div>                              
<!-- here end -->          

                        
                   
<!-- here end -->                  

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

$(document).ready(function() {
  $('#description').summernote();
  $('#features').summernote();
  $('#review_section').summernote();
});

    // ClassicEditor
    //     .create( document.querySelector( '#description' ) )
    //     .catch( error => {
    //         console.error( error );
    // } );
    
    // ClassicEditor
    //     .create( document.querySelector( '#features' ) )
    //     .catch( error => {
    //         console.error( error );
    // } );
    
    // ClassicEditor
    //     .create( document.querySelector( '#review_section' ) )
    //     .catch( error => {
    //         console.error( error );
    // } );    


function brandchange(){
    var val = $('#boilerbrand').val();
    $.ajax({
    	type: 'POST',
    	url : "{{route('onchange')}}",
    	data:{
    		_token: '{{ csrf_token() }}',
    		change: val,
    		flag:'brand'
    	},
    	success: function (data) {
    		if(data){
    		    $('#boilercategory').empty();
    		    $('#boilercategory').html(data);
    		}
    	}
    });     
}


  var loadFile = function(event) {
    var output = document.getElementById('output');
    $("label[for='image_label']").text(event.target.files[0].name);
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  
  var loadFile1 = function(event) {
    var output = document.getElementById('output1');
    $("label[for='image_label1']").text(event.target.files[0].name);
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  var loadFile2 = function(event) {
    var output = document.getElementById('output2');
    $("label[for='image_label2']").text(event.target.files[0].name);
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