@extends('layouts.admin_app')
@section('custom_style')
<style type="text/css">
input[type=checkbox] {
display:none;
}
.disabled:hover, .disabled>a:hover{
cursor: not-allowed!important;
}
h3{
margin-bottom: 15px!important;
text-decoration: underline;
}
h6{
text-overflow: ellipsis;
overflow: hidden;
white-space: nowrap;
}
.dimensions{
/*border:1px solid black;*/
}
.switch {
position: relative;
display: inline-block;
width: 60px;
height: 34px;
}

.switch input {
opacity: 0;
width: 0;
height: 0;
}

.slider {
position: absolute;
cursor: pointer;
top: 0;
left: 0;
right: 0;
bottom: 0;
background-color: #ccc;
-webkit-transition: .4s;
transition: .4s;
border-radius: 50px !important;
}

.slider:before {
position: absolute;
content: "";
height: 26px;
width: 26px;
left: 4px;
bottom: 4px;
background-color: white;
-webkit-transition: .4s;
transition: .4s;
}

input:checked + .slider {
background-color: #2196F3;
border-radius: 50px !important;
}

input:focus + .slider {
box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
-webkit-transform: translateX(26px);
-ms-transform: translateX(26px);
transform: translateX(26px);
}

/ Rounded sliders /
.slider.round {
border-radius: 34px;
}

.slider.round:before {
border-radius: 50%;
}
#dimensions_inputs td{
padding: 5px;
}
.selected_design{
text-align: center;
border-right: 1px solid grey;
}
.selected_design img{
width: 300px;
height: 300px;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
margin-bottom: 10px;
}
#selected_design_and_dimensions{
border: 2px solid black;
}



/*bilal*/
.features_hding{
font-weight: bold !important;
}
.thiknes_input input{
width: 15% !important;
display: inline-block !important;
}
.sink_bol_dv , .hob_cut_dv{
display: none;
margin-top: 20px;
}
.option_switch_btn{
position: absolute !important;
left: 35% !important;
}
.hob_width{
margin-left: 30px;
}
#tab5 h3{
text-align: center;
}
.estimate_dv{
text-align: center;
margin-bottom: 50px !important;
}
.estimate_dv p{
width: 45%;
margin: auto;
margin-bottom: 35px;
}
.estimate_dv span{
box-shadow: 0px 2px 7px 0px rgb(50 50 50 / 75%);
padding: 20px;
}
.estimate_feildset {
border: solid 1px #DDD !important;
padding: 0 30px 0px 30px;
}
.estimate_feildset legend {
width: auto !important;
font-weight: bold;
}
.estimate_feildset img{
width: 150px;
height: 150px;
}
.estimate_feildset span{
font-weight: bold;
margin-top: 30px;
}
.estimate_item_rw{
border-bottom: 1px solid lightgray;
padding-top: 10px;
padding-bottom: 20px;
}
.estimate_rw{
border-bottom: none !important;
}
.estimate_rw ol{
list-style-type: circle;
padding-left: 0px !important;
}
.estimate_rw ol li:first-child{
list-style-type: none !important;
margin-left: -17px;
}
.size_list{
list-style-type: none !important;
}
.size_list li:first-child{
margin-left: 0px !important;
}
.thickness_price{
width: 3% !important;
border: none !important;
padding-left: 2px !important;
font-weight: bold;
background-color: white !important;
}
.thickness_p{
font-weight: bold;
margin-left: 30px;
}
.thickness_dropdown{
width: 43% !important;
display: inline-block !important;
}
 .double_sink_bowl_append_dv{
    padding-top: 10px;
    padding-bottom: 10px;
  }
  .single_sink_bowl_append_dv{
    padding-top: 10px;
    padding-bottom: 10px;
  }
  .double_sink_bowl_append_dv input{
    margin-left: 10px;
    margin-right: 5px;
  }
  .single_sink_bowl_append_dv input{
    margin-left: 10px;
    margin-right: 5px;
  }
  .double_sink_bowl_append_dv p{
    margin-bottom: 10px;
    margin-top: 10px;
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
<h1 class="m-0 text-dark">Edit Option</h1>
</div><!-- /.col -->
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="{{url('boiler/dashboard')}}">Home</a></li>
<li class="breadcrumb-item"><a href="{{url('boiler/options')}}">Options</a></li>
<li class="breadcrumb-item active">Edit Option</li>
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
<h3 class="card-title">Edit Option</h3>
</div>
<!-- /.card-header -->
<!-- form start -->
<form role="form" action="{{url('estimate',$quotations->id)}}" method="POST" enctype="multipart/form-data">
@method('PUT')
@csrf
<div class="card-body">
<div class="form-row">
<div class="form-group col-md-6 p-1">
<label for="finish_name">Finish Name</label>
<?php //echo "<pre>"; print_r($quotations->finish->id); exit('test'); ?>
<select class="form-control" name="finish">
@foreach($finishs as $finish)
<option value="{{$finish->id?? ''}}"
<?php if($finish->id == @$quotations->finish->id ){ echo "selected"; } ?> >{{@$finish->name}}</option>
@endforeach
</select>
</div>
<!-- <div class="form-group col-md-6 p-1">
<label for="last_name">Finish Price</label>
<input type="number" name="finish_price" id="finish_price" class="form-control" placeholder="Enter Finish Price" value="{{$quotations->finish->price?? ''}}" required="">
</div> -->
</div>
<div class="form-row">
<div class="form-group col-md-6 p-1">
<label for="edge_name">Edge Name</label>
<select class="form-control" name="edge">
@foreach($edges as $edge)
<option value="{{$edge->id?? ''}}" <?php if($edge->id == @$quotations->edge->id) {echo "selected";} ?>>{{@$edge->name}}</option>
@endforeach
</select>
</div>
<!-- <div class="form-group col-md-6 p-1">
<label for="edge_price">Edge Price</label>
<input type="number" name="edge_price" id="edge_price" class="form-control" value="{{$quotations->edge->price?? ''}}" required="">
</div> -->

</div>

<div class="form-row">
<div class="form-group col-md-6 p-1">
<label for="design_name">Design Name</label>
<select class="form-control" name="design">
@foreach($designs as $design)
<option value="{{$design->id?? ''}}" <?php if($design->id == @$quotations->design->id) {echo "selected";} ?>>{{@$design->name}}</option>
@endforeach
</select>
</div>
<!-- <div class="form-group col-md-6 p-1">
<label for="dimensions">Dimensions</label>
<input type="" name="dimensions" id="dimensions" class="form-control" placeholder="" value= "{{$quotations->design_dimensions?? ''}}" >
</div> -->
</div>
<div class="form-group">
<p class="features_hding">Substrate</p>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="substrate" value="MDF" <?php if ($quotations->substrate == "MDF") { ?>
checked=""
<?php } ?> >
<label class="form-check-label">MDF</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="substrate" value="Marine Ply" <?php if ($quotations->substrate == "Marine Ply") { ?>
checked=""
<?php } ?>>
<label class="form-check-label">Marine Ply</label>
</div>
</div>

<div class="form-group">
<label class="features_hding">Thickness (mm)</label>
<div class="thiknes_input">
<select class="form-control thickness_dropdown" name="thickness_size">
@php
$thickness = json_decode(getOption('thickness')->value);
$thickness_id = json_decode(getOption('thickness')->id);
@endphp
@foreach($thickness->sizes as $key => $val)
<option value="{{$thickness->price[$key]?? ''}}" <?php if($thickness->price[$key] == $quotations->thickness) {echo "selected";} ?>>{{$val}}</option>
@endforeach
</select>
<span class="thickness_p">
<input type="hidden" class="form-control thickness_price" value="{{$quotations->thickness?? ''}}" name="thickness" readonly>
</span>
</div>
</div>

 					<?php $sink = json_decode($quotations->sink_bowl, true); 
                           if(isset($sink['double'])){
                           		$sink_flag = 'double';
                           }
                           if(isset($sink['single'])){
                           		$sink_flag ='single';
                           }
                         //   echo "<pre>"; print_r($sink); exit('d'); 
                         ?>


					<div class="form-group">
                        <label class="features_hding">Sink Bowl</label>
                        <label class="switch option_switch_btn"> <input type="checkbox" class="swith_sink_bowl switch_side" name="sink_bowl_swith_btn" <?php if(!empty($quotations->sink_bowl)){ ?> checked="" <?php }?>> <span class="slider round"></span> </label>
                        <div class="sink_bol_dv">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input single_sink_bowl" type="radio" name="sink_bowl" value="Single Sink Bowl" <?php if (@$sink_flag == 'single' ) { ?>
                              checked=""
                           <?php } ?>>
                                <label class="form-check-label">Single Sink Bowl</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input id = "sinkes" class="form-check-input double_sink_bowl" type="radio" name="sink_bowl" value="Double Sink Bowl"  <?php if (@$sink_flag == 'double' ) { ?>
                              checked=""
                           <?php } ?>>
                                <label class="form-check-label">Double Sink Bowl</label>
                            </div>
                        </div>
                        <div class="sink_bowl_append">
                        		<?php if (@$sink_flag == 'single' ) { ?>
                        		<div class="single_sink_bowl_append_dv">
                        			<div class="thiknes_input"><label>Length</label>
                        				<input type="number" class="form-control sink_bowl_input" min="1" name="sink_bowl[single][length][]" value = "{{@$sink['single']['length'][0]}}">
                        				<span>mm</span><label class="hob_width">Width</label>
                        				<input type="number" class="form-control sink_bowl_input" min="1" name="sink_bowl[single][width][]" value = "{{@$sink['single']['length'][0]}}"><span>mm</span>
                        			</div>
                        		</div>
                        		<?php } ?>
                        		<?php if (@$sink_flag == 'double' ) { ?>
                        			<div class="single_sink_bowl_append_dv">
                        			<div class="thiknes_input"><label>Length</label>
                        				<input type="number" class="form-control sink_bowl_input" min="1" name="sink_bowl[single][length][]" value = "{{@$sink['double']['length'][0]}}">
                        				<span>mm</span><label class="hob_width">Width</label>
                        				<input type="number" class="form-control sink_bowl_input" min="1" name="sink_bowl[single][width][]" value = "{{@$sink['double']['width'][0]}}"><span>mm</span>
                        			</div>
                        		</div>
                        		<div class="single_sink_bowl_append_dv">
                        			<div class="thiknes_input"><label>Length</label>
                        				<input type="number" class="form-control sink_bowl_input" min="1" name="sink_bowl[single][length][]" value = "{{@$sink['double']['length'][1]}}">
                        				<span>mm</span><label class="hob_width">Width</label>
                        				<input type="number" class="form-control sink_bowl_input" min="1" name="sink_bowl[single][width][]" value = "{{@$sink['double']['width'][1]}}"><span>mm</span>
                        			</div>
                        		</div>
                        		<?php }?>
							</div>
                        </div>

						<div class="form-group">
						<label class="features_hding">Cooking Hob Cut Out</label>
						<label class="switch option_switch_btn"> <input type="checkbox" id="" class="swith_hob_btn switch_side" name="hob_cut_swith_btn" <?php if(!empty($quotations->cooking_hob_status)){ ?> checked="" <?php }?> > <span class="slider round"></span> </label>
						<div class="hob_cut_dv">
						<div class="thiknes_input">
						<label>Length</label>
						<input id="length" type="number" class="form-control hob_length hob_btn_input" min="0" name="hob_length" value="{{$quotations->cooking_hob_length?? ''}}">
						<span>mm</span>

						<label class="hob_width">Width</label>
						<input id="width" type="number" class="form-control hob_width hob_btn_input" min="0" name="hob_width" value="{{$quotations->cooking_hob_width?? ''}}">
						<span>mm</span>

						</div>
						</div>
						</div>


						</div>
</div>
<!-- /.card-body -->

<div class="card-footer">
		<button type="submit" class="btn btn-primary float-right" id="sub">Update</button>
</div>
</form>
</div>
</div>
</div><!-- /.container-fluid -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
//sinkbol checked if not empty
$( document ).ready(function() {
  var v ='';
 v = '<?php echo $quotations->sink_bowl ?>' ;
if(v != ''){
$('body').find('.sink_bol_dv').show();
}
//cooking hub status on if not empty
var hob = "<?php echo $quotations->cooking_hob_status ?>" ;
if(hob == 1){
$('body').find('.hob_cut_dv').show();
}
// console.log( v);
// console.log( "ready!" );
});
//use for sink bowl button present on options tab4
    $(".swith_sink_bowl").change(function(){
      if($(this).prop("checked") == true){
         $("#sub").attr('disabled',true);
          $('body').find('.sink_bol_dv').show();
          $('body').find('.double_sink_bowl').prop("checked" , false);
          $('body').find('.single_sink_bowl').prop('checked',true);
          $('body').find('#single_sink_bowl_insert_id').val(1);
          $('.sink_bowl_append').append('<div class="single_sink_bowl_append_dv"><div class="thiknes_input"><label>Length</label><input type="number" class="form-control sink_bowl_input" min="1" name="sink_bowl[single][length][]"><span>mm</span><label class="hob_width">Width</label><input type="number" class="form-control sink_bowl_input" min="1" name="sink_bowl[single][width][]"><span>mm</span></div></div>');
      }else{
          $('body').find('.sink_bol_dv').hide();
          $('body').find('.sink_bowl_append').html('');
           $("#sub").attr('disabled',false);
      }
    });

     $('body').on('keyup change','.sink_bowl_input',function(){
      var all_input = $('body').find('.sink_bowl_input');
      $(all_input).each(function( index, value ){
        if (value.value == "") {
            isValid = false;
            return false;
        }else{
          isValid = true;
        }
      });
      if(isValid){
         $("#sub").attr('disabled',false);
      }else{
         $("#sub").attr('disabled',true);
      }
  });
// use for Cooking Hob Cut Out button present on options tab4
$(".swith_hob_btn").change(function(){
if($(this).prop("checked") == true){
$('body').find('.hob_cut_dv').show();
}else{
$('body').find('.hob_cut_dv').hide();
}
});
$(".thickness_dropdown").on('change' , function(e) {
var size = $('option:selected', $(this)).text();
var value = $(this).val();
$('body').find('.thickness_price').val(value);
});

$(".double_sink_bowl").change(function(){
    $('body').find('.sink_bowl_append').html('');
    $('body').find('#double_sink_bowl_insert_id').val(1);
    $('body').find('#single_sink_bowl_insert_id').val(0);
    $("#sub").attr('disabled',true);
      $('.sink_bowl_append').append('<div class="double_sink_bowl_append_dv"><div class="thiknes_input"><p>First Sink Bowl Lenght Width</p><label>Length</label><input type="number" class="form-control sink_bowl_input" min="1" name="sink_bowl[double][length][]"><span>mm</span><label class="hob_width">Width</label><input type="number" class="form-control sink_bowl_input" min="1" name="sink_bowl[double][width][]"><span>mm</span></div><div class="thiknes_input"><p>Second Sink Bowl Lenght Width</p><label>Length</label><input type="number" class="form-control sink_bowl_input" min="1" name="sink_bowl[double][length][]"><span>mm</span><label class="hob_width">Width</label><input type="number" class="form-control sink_bowl_input" min="1" name="sink_bowl[double][width][]"><span>mm</span></div></div>');
    });

  $(".single_sink_bowl").change(function(){
    $('body').find('.sink_bowl_append').html('');
    $('body').find('#double_sink_bowl_insert_id').val(0);
    $('body').find('#single_sink_bowl_insert_id').val(1);
    $("#sub").attr('disabled',true);
      $('.sink_bowl_append').append('<div class="single_sink_bowl_append_dv"><div class="thiknes_input"><label>Length</label><input type="number" class="form-control sink_bowl_input" min="1" name="sink_bowl[single][length][]"><span>mm</span><label class="hob_width">Width</label><input type="number" class="form-control sink_bowl_input" min="1" name="sink_bowl[single][width][]"><span>mm</span></div></div>');
    });


    $(".double_sink_bowl").change(function(){
    $('body').find('.sink_bowl_append').html('');
    $('body').find('#double_sink_bowl_insert_id').val(1);
    $('body').find('#single_sink_bowl_insert_id').val(0);
    $("#sub").attr('disabled',true);
      $('.sink_bowl_append').append('<div class="double_sink_bowl_append_dv"><div class="thiknes_input"><p>First Sink Bowl Lenght Width</p><label>Length</label><input type="number" class="form-control sink_bowl_input" min="1" name="sink_bowl[double][length][]"><span>mm</span><label class="hob_width">Width</label><input type="number" class="form-control sink_bowl_input" min="1" name="sink_bowl[double][width][]"><span>mm</span></div><div class="thiknes_input"><p>Second Sink Bowl Lenght Width</p><label>Length</label><input type="number" class="form-control sink_bowl_input" min="1" name="sink_bowl[double][length][]"><span>mm</span><label class="hob_width">Width</label><input type="number" class="form-control sink_bowl_input" min="1" name="sink_bowl[double][width][]"><span>mm</span></div></div>');
    });

  $(".single_sink_bowl").change(function(){
    $('body').find('.sink_bowl_append').html('');
    $('body').find('#double_sink_bowl_insert_id').val(0);
    $('body').find('#single_sink_bowl_insert_id').val(1);
   $("#sub").attr('disabled',true);
      $('.sink_bowl_append').append('<div class="single_sink_bowl_append_dv"><div class="thiknes_input"><label>Length</label><input type="number" class="form-control sink_bowl_input" min="1" name="sink_bowl[single][length][]"><span>mm</span><label class="hob_width">Width</label><input type="number" class="form-control sink_bowl_input" min="1" name="sink_bowl[single][width][]"><span>mm</span></div></div>');
    });


</script>
@endsection