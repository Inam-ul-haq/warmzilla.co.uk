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
                <h1 class="m-0 text-dark">Edit Boiler</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('boiler/dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{url('boiler/finish')}}">Boiler</a></li>
                  <li class="breadcrumb-item active">Edit Boiler</li>
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
              <form role="form" action="{{url('boiler/finish',$finish->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                  <div class="form-group col-md-12 p-1">
                    <label for="name">Name <small>(Max 70 Characters)</small></label>
                    <input type="text" class="form-control" name="finish_name" id="name" placeholder="Enter Name" value="{{old('finish_name') ?? $finish->name}}" required="" maxlength="70">
                  </div>
                  <div class="form-group col-md-12 p-1">
                    <label for="description">Description <small>(Max 1500 Characters)</small></label>
                    <textarea name="description" maxlength="1500" id="description" class="form-control builder" placeholder="Enter description">{{old('description') ?? $finish->description}}</textarea>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-3 p-1">
                      <label for="boilerbrand">Brand Brands</label>
                      
                      <select name="boilerbrand" id = "boilerbrand" class="form-control" onchange = "brandchange()" >
                        <option disabled>Select Brands</option>
                        @if(@$boilerbrands)
                          @foreach($boilerbrands as $boilerbrand)
                            <option value="{{$boilerbrand->id}}" {{ $boilerbrand->id == $finish->boilerbrand ? 'selected' : '' }} > {{$boilerbrand->name}} </option>  
                          @endforeach
                        @else
                          <option disabled>No Brand available </option>
                        @endif
                      </select>
                     </div>                  
                    <div class="form-group col-md-3 p-1">
                      <label for="boilertype">Brand Type</label>
                      <select name="boilertype" class="form-control">
                        <option disabled>Select Type</option>
                        @if(@$boilertypes)
                          @foreach($boilertypes as $boilertype)
                            <option value="{{$boilertype->id}}" {{ $boilertype->id == $finish->boilertype ? 'selected' : '' }}  > {{$boilertype->name}} </option>  
                          @endforeach
                        @else
                          <option disabled>No Type available </option>
                        @endif
                      </select>
                     </div>          
                     
                     <div class="form-group col-md-3 p-1">
                      <label for="boilertype">Brand Model</label>
                      <select name="boilercategory" id = "boilercategory" class="form-control" required >
                        <option disabled>Select category</option>
                        @if(@$boilercategoires)
                          @foreach($boilercategoires as $boilercategory)
                            <option value="{{$boilercategory->id}}" {{ $boilercategory->id == $finish->boilercategory ? 'selected' : '' }}  > {{$boilercategory->name}} ( {{$boilercategory->description }} )</option>  
                          @endforeach
                        @else
                          <option disabled>No Category available </option>
                        @endif
                      </select>
                     </div>          

                     <div class="form-group col-md-3 p-1">
                      <label for="boilertype">Fuel Type </label>
                      <select name="fuel_type" class="form-control">
                        <option disabled>Select category</option>
                        @if(@$fueltypes)
                          @foreach($fueltypes as $fuel_type)
                            <option value="{{$fuel_type->id}}" {{ $fuel_type->id == $finish->fuel_type ? 'selected' : '' }}  > {{$fuel_type->name}} </option>  
                          @endforeach
                        @else
                          <option disabled>No Type available </option>
                        @endif
                      </select>
                     </div>
                     
                   </div>                      
                   
                  <div class="form-row">
                    <div class="col-md-3">
                      <div id="center_image" class="w-50 mx-auto">
                        <img src="{{($finish->filename)?asset('images/finish/'.$finish->filename):asset('images/no_image.jpg')}}" id="output" width="125px" height="125px" style="border: 2px solid black;">
                      </div>
                    </div>
                    <div class="col-md-9 pt-3">
                      <div class="form-group">
                        <label for="exampleInputFile">Boiler image <small>(Optional)</small></label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="finish_img" value="{{$finish->filename ?? old('input_img') ?? ''}}" onchange="loadFile(event)">
                            <label class="custom-file-label" for="image_label">Choose file</label>
                          </div>
                          <span>image size : 226*379</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4 mt-2 p-1">
                      <label for="dimensions">Dimensions <small></small></label>
                      <input type="text" step=.01 name="dimensions" id="dimensions" class="form-control" placeholder="Enter Dimensions" value="{{$finish->dimensions ?? old('dimensions')}} " required> 
                     </div>          
                    <div class="form-group col-md-8 mt-2 p-1">
                      <label for="price">Brochure URL</label>
                      <input type="text" step=.01 name="brochure_url" id="brochure_url" class="form-control" placeholder="Enter Brochure URL " value="{{$finish->brochure_url ?? old('brochure_url') ?? ''}} " required="">
                    </div>
                  </div>
                  
<!-- here -->
                  <div class="row">
                    <!--<div class="form-group col-md-4 p-1">-->
                    <!--  <label for="kwoutput">kW Output</label>-->
                    <!--  <input type="text" step=.01 name="kwoutput" id="kwoutput" class="form-control" placeholder="Enter kw output" value="{{$finish->kwoutput ?? old('kwoutput')}} " required="">-->
                    <!-- </div>-->
                     
                    <div class="form-group col-md-3 p-1">
                      <label for="kw_output_input">Central Heating </label>
                      <input type="number" step=.01 name="kwoutput" id="kwoutput" class="form-control" placeholder="Enter KW Input" value={{$finish->kwoutput ?? old('kwoutput')}}   required>
                      <!--<select name="kwoutput" class="form-control"  required>-->
                      <!--  @if(@$finish->kwoutput)-->
                      <!--    @foreach($kwoutputs as $kwoutput) -->
                      <!--      <option value="{{$kwoutput}}"  @if (($finish->kwoutput) && $kwoutput == $finish->kwoutput  )) selected  @endif > -->
                      <!--        @if($kwoutput == 0) -->
                      <!--          No kwoutputs-->
                      <!--        @else  -->
                      <!--          {{$kwoutput}} kw-->
                      <!--        @endif -->
                      <!--       </option>  -->
                      <!--    @endforeach-->
                      <!--  @else-->
                      <!--    <option disabled>No kwoutputs </option>-->
                      <!--  @endif-->
                      <!--</select>-->

                     </div>                     
                     
                    <div class="form-group col-md-3 p-1">
                      <label for="kw_output_input">Direct Hot Water <small>(Optional)</small></label>
                      <input type="number" step=.01 name="kw_output_input" id="kw_output_input" class="form-control" placeholder="Enter KW Output Input" value={{$finish->kw_output_input ?? old('kw_output_input')}}   required>
                    </div>  
                    <div class="form-group col-md-3 p-1">
                      <label for="flowrate">Flow Rate <small>(Max 30 Characters)</small></label>
                      <input type="text" step=.01 name="flowrate" id="flowrate" maxlength="30" class="form-control" placeholder="Enter Flow Rate" value="{{$finish->flowrate ?? old('flowrate')}} " >
                     </div>
                    <div class="form-group col-md-3 p-1">
                      <label for="erprating">ErP Rating <small>(Max 30 Characters)</small> </label>
                      <input type="text" step=.01 name="erprating" id="erprating" maxlength="30" class="form-control" placeholder="Enter Erp Rating" value="{{$finish->erprating ?? old('erprating')}}  " >
                     </div>                           
                   </div>  

                  <div class="row">
                    <div class="form-group col-md-3 p-1">
                      <label for="Warranty">Warranty <small>(Max 30 Characters)</small> </label> 
                      <input type="text" step=.01 name="warranty" id="warranty" class="form-control"  maxlength="30" placeholder="Enter Warranty" value="{{$finish->warranty ?? old('warranty')}}  " >
                     </div>          
                    <div class="form-group col-md-3 p-1">
                      <label for="energyefficiency">Energy Efficiency <small>(Max 30 Characters) </small> </label>
                      <input type="text" step=.01 name="energyefficiency" id="energyefficiency" maxlength="30" class="form-control" placeholder="Enter Energy Efficiency" value="{{$finish->energyefficiency ?? old('energyefficiency')}} " >
                     </div> 
                    <div class="form-group col-md-3 p-1">
                      <label for="review">Review score </label>
                      <input type="number" max="100"  step=.01 name="review" id="review" class="form-control" placeholder="Enter Review in Percentage" value="{{$finish->review ?? old('review')}}" >
                    </div>   
                   </div>  



                  <div class="row">
                    <div class="form-group col-md-6  p-1">
                      <label for="features">Features <small>(Max 1500 Characters Optional)</small></label>
                      <textarea class="form-control builder" name="features" id="features" cols="10" maxlength = "1500">{{$finish->features ?? old('features')}}</textarea>
                     </div>                  
                    <div class="form-group col-md-4 p-1"></div>                               
                   </div> 
                   <label>Review Section</label>
                    <div class="row">
                        <div class="form-group col-md-6  p-1">
                            <label for="features">Review <small>(Max 1500 Characters Optional)</small></label>
                            <textarea class="form-control builder" name="review_section" id="review_section" cols="5" maxlength = "1500">{{@$finish->review_section ?? old('review_section')}}</textarea>
                        </div>                  
                        <div class="form-group col-md-4 p-1"></div>                               
                   </div>                    
                   
                  <div class="form-row">
                    <div class="col-md-3">
                      <div id="center_image" class="w-50 mx-auto">
                        <img src="{{($finish->review_img1)?asset('images/finish/'.$finish->review_img1):asset('images/no_image.jpg')}}" id="output1" width="125px" height="125px" style="border: 2px solid black;">
                      </div>
                    </div>
                    <div class="col-md-9 pt-3">
                      <div class="form-group">
                        <label for="exampleInputFile">Boiler Review image 1<small>(Optional)</small></label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="review_img1" value="{{$finish->review_img1 ?? old('review_img1') ?? ''}}" onchange="loadFile1(event)">
                            <label class="custom-file-label" for="image_label1">Choose file</label>
                          </div>
                          <span>image size : 226*379</span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-3">
                      <div id="center_image" class="w-50 mx-auto">
                        <img src="{{($finish->review_img2)?asset('images/finish/'.$finish->review_img2):asset('images/no_image.jpg')}}" id="output2" width="125px" height="125px" style="border: 2px solid black;">
                      </div>
                    </div>
                    <div class="col-md-9 pt-3">
                      <div class="form-group">
                        <label for="exampleInputFile">Boiler Review image 2<small>(Optional)</small></label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="review_img2" value="{{$finish->review_img2 ?? old('review_img2') ?? ''}}" onchange="loadFile2(event)">
                            <label class="custom-file-label" for="image_label2">Choose file</label>
                          </div>
                          <span>image size : 226*379</span>
                        </div>
                      </div>
                    </div>
                  </div>  
                    <div class="form-group col-md-12 p-1">
                    <label for="name">Meta_Name </label> <small>(Max 70 Characters)</small>
                    <input type="text" class="form-control" name="meta_name" id="meta_name" placeholder="Enter meta_name" value="{{old('meta_name') ?? $finish->meta_name}}" required="" maxlength="70">
                  </div>
                  <div class="form-group col-md-12 p-1">
                    <label for="description">Meta_Description <small>(Max 1500 Characters)</small></label>
                    <textarea maxlength="1500" name="meta_description" id="meta_description" class="form-control builder" placeholder="Enter meta_description">{{old('meta_description') ?? $finish->meta_description}}</textarea>
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