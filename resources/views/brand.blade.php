<?php
// echo "<pre>"; print_r($brand); exit('kok'); 
?>
@extends('layouts.master')
@section('content')

	<!--center area section -->
	<div class="site_wrap">	
		 <div class="tsrtopsection">		
			<div class="wrapper">
				<div class="row align-items-center">
					<div class="leftimg col">
						<img src="{{($brand->boiler_main_img)?asset('images/boilerbrand/'.$brand->boiler_main_img):asset('images/01.png')}} " width="" height="" alt="boiler_main_img" title="">
					</div>
					<div class="righttext">
						<?php 
							if($brand->brand_info != ''){
								echo html_entity_decode($brand->brand_info);
							}
						?>					    
					</div>
				</div>
			</div>
		</div> 
	<!-- page banner area section -->
	<div class="getyourcode">
			<div class="wrapper">
				<div class="getcode-cntnt">
					<p>Get an instant fixed price quote on your new boiler in 90 seconds</p>
					<a href="https://www.warmzilla.co.uk/find-a-boiler">Get Your Quote</a>
				</div>
			</div>
	</div>
		<div class="tsr03">
			<div class="wrapper">
				<div class="row">
					<div class="full-width cbox">
						<div class="img">
							<img src="{{($brand->boiler_question_img)?asset('images/boilerbrand/'.$brand->boiler_question_img):asset('images/02.png')}}" width="138" height="293" alt="boiler_question_img" title="">
						
						</div>
						<div class="content">
							<div class="topbrand-row">
								<img src="{{(@$brand->filename)?asset('images/boilerbrand/'.$brand->filename):asset('images/01.png')}}" width="160" height="42" alt="boilerbrand" title="">
							</div>
							<div id="article">
								<?php 
									if($brand->brand_questions != ''){
										echo html_entity_decode($brand->brand_questions);
									}
								?>
							</div>	
						</div>
					</div>
					<a href="http://www.warmzilla.co.uk/boiler/" class="backbrandsbtn">Back To Brands</a>
				</div>
			</div>
		</div> 
		<div class="systmboilers" id = "maindiv" >
			<div class="sb-wrap">
				<div class="filters-wrap">
				    <div class="close-ico-filtr"><img src="{{asset('images/cross-icon-grey-mobile.png')}}" width="34" height="34" align="" alt="icon-grey-mobile" title=""></div>
					<h6>Filter</h6>
						<form method="GET" action="" id = "filtersform" >
						<div class="filtrbox">
							<span class="fbox-title">Fuel Type</span>
							<input class="styled-checkbox" id="styled-checkbox-1" onclick = "filters('checkbox','')" type="checkbox" name = "q[fuel_type][]" value="1" 
							    <?php if(is_array($brand_filter) && isset($brand_filter['q']['fuel_type']) && $brand_filter != '' && is_array($brand_filter) && in_array(1, $brand_filter['q']['fuel_type']) ){ echo 'checked'; } ?>
							>
    						<label for="styled-checkbox-1">Gas</label>
    						<input class="styled-checkbox" id="styled-checkbox-2" onclick = "filters('checkbox','')" type="checkbox" name = "q[fuel_type][]" value="2"
    						<?php if(is_array($brand_filter) && isset($brand_filter['q']['fuel_type']) && $brand_filter != '' && is_array($brand_filter) && in_array(2, $brand_filter['q']['fuel_type']) ){ echo 'checked'; } ?>
    						>
    						<label for="styled-checkbox-2">Oil</label>
    						<input class="styled-checkbox" id="styled-checkbox-3" onclick = "filters('checkbox','')" type="checkbox" name = "q[fuel_type][]" value="3"
    						<?php if(is_array($brand_filter) && isset($brand_filter['q']['fuel_type']) && $brand_filter != '' && is_array($brand_filter) && in_array(3, $brand_filter['q']['fuel_type']) ){ echo 'checked'; } ?>
    						>
    						<label for="styled-checkbox-3">LPG</label>
						</div>
						<div class="filtrbox">
							<span class="fbox-title">kW Output</span>
							<input class="styled-checkbox" id="styled-checkbox-4" type="checkbox" onclick = "filters('checkbox','')" name = "q[kwoutput][]" value="11-20"
							    <?php if(is_array($brand_filter) && isset($brand_filter['q']['kwoutput']) && $brand_filter != '' && is_array($brand_filter) && in_array('11-20', $brand_filter['q']['kwoutput']) ){ echo 'checked'; } ?>
							>
    						<label for="styled-checkbox-4">11 - 20kW</label>
    						<input class="styled-checkbox" id="styled-checkbox-5" type="checkbox" onclick = "filters('checkbox','')" name = "q[kwoutput][]" value="21-30"
    						    <?php if(is_array($brand_filter) && isset($brand_filter['q']['kwoutput']) && $brand_filter != '' && is_array($brand_filter) && in_array('21-30', $brand_filter['q']['kwoutput']) ){ echo 'checked'; } ?>
    						>
    						<label for="styled-checkbox-5">21 - 30kW</label>
    						<input class="styled-checkbox" id="styled-checkbox-6" type="checkbox" onclick = "filters('checkbox','')" name = "q[kwoutput][]" value="30"
    						    <?php if(is_array($brand_filter) && isset($brand_filter['q']['kwoutput']) && $brand_filter != '' && is_array($brand_filter) && in_array('30', $brand_filter['q']['kwoutput']) ){ echo 'checked'; } ?>
    						>
    						<label for="styled-checkbox-6">30+ kW</label>
						</div>
						<div class="filtrbox">
							@if(@$types)
    							<span class="fbox-title">Boiler Type</span>
    							@foreach($types as $type)
        							<input class="styled-checkbox" id="styled-checkbox-type-{{ $type->id }}" type="radio" onclick = "filters('checkbox','')" name = "q[type][]" value="{{ $type->id }}"
        					        <?php if(isset($brand_filter['q']['type']) && $brand_filter != '' && is_array($brand_filter) && in_array($type->id, $brand_filter['q']['type']) ){ echo 'checked'; } ?>		
        							>
            						<label for="styled-checkbox-type-{{ $type->id }}">{{ $type->name }}</label>
    							@endforeach

	    					@endif	
						</div>							
							
						<div class="filtrboxx">
						    <input type = "hidden" name = "product" value = "{{ @$brand_filter['product'] }}"   />
						@if(@$brands)
								<span class="fbox-title">Boiler Brand</span>
								@foreach($brands as $brand)
								<span onclick = "filters('brands','{{@$brand->slug}}')" >
								<input name = "filters_{{@$brand->slug}}" class="styled-checkbox" id="filter_{{@$brand->slug}}" 
								type="checkbox" value="{{@$brand->slug}}" {{ (@$brand->slug == $brand_filter)?"checked":'' }} />
									
	    						<label  for="styled-checkbox-7">{{$brand->name}}</label>
	    						</span>
	    						@endforeach
	    				@endif
						</div>
								
					</form>
				</div><!-- filters -->
				<div class="sbthumbs-wrap">
					<div class="head-para">
						<h2>View <span>{{ $brand->name }} </span>Boilers</h2>
<?php 
									if($brand->brand_title != ''){
										echo html_entity_decode($brand->brand_title);
									}
								?>
						<span class="hidefiltr">Hide Filter</span>
						<span class="showfiltr">Show Filter</span>
					</div>
					<div class="sthmb-boxwrap">
						
						@if(!$categories->isEmpty())
							<?php $allcategories = array();?>
							@foreach($categories as $boiler)

								@php array_push($allcategories, $boiler->id ); @endphp
							
							<div class="sthmb-box">
								<div class="stbox-lft">
									<img src="{{($boiler->filename)?asset('images/boilercat/'.$boiler->filename):asset('images/systemboiler.png')}}" width="143" height="225" alt="systemboiler" title="">
								</div>
								<div class="stbox-rgt">


									<img src="{{(@$boiler->brands->filename)?asset('images/boilerbrand/'.$boiler->brands->filename):asset('images/brand.png')}}" style = "width:134px; height:59px;" alt="brands" title="" />
									<h4> {{ @$boiler->name }} </h4>
									<p>{{$boiler->description}}</p>
									<!--<p>{{$boiler->description}}</p>-->
                                    <div class="kwoptions">
										<span>kW Options:</span>
										@php 
										    $cats = array(); 
										    $boill = array(); 
										    $boill2 = array(); 
										    $brandss = array(); 
										    
										@endphp
										@if(@$boiler->boilers)
    										
    										<ul>
    										      @foreach($boiler->boilers as $bKwoutput)
										          
										            @php 
										                array_push($boill2, $bKwoutput->id );
										                array_push($boill, $bKwoutput->slug );
										                array_push($cats, $bKwoutput->kwoutput );
										                array_push($brandss, $boiler->brands->slug );
										            @endphp
										            <?php   $count = count($cats); ?>
										            <button onclick = "comparepopupshow('{{$boiler->id}}', '{{$boiler->id}}','{{  $bKwoutput->kwoutput }}', {{$count}} )">  <li >{{  $bKwoutput->kwoutput }} </li></button>
										        @endforeach
    										</ul>    
    										
										@endif										
										<?php   $count = count($cats); $countboil = count($boill);  $cats = json_encode($cats) ; $boil = json_encode($boill); $boil2 = json_encode($boill2); $brands = json_encode($brandss); ?>
									</div>
									<div class="botm-btns">
									    @if(!empty($cats))
									        <input name = "kwoutputdata" id = "kwoutputdata_{{$boiler->id}}" type = "hidden" value = "{{$cats}}">
									    
									        <input name = "kwoutputdata_2" id = "kwoutputdata_{{$boiler->id}}_2" type = "hidden" value = "{{$boil2}}">
									        
									        <input name = "kwoutputboil" id = "kwoutputboil_{{$boiler->id}}" type = "hidden" value = "{{$boil}}">
									        
									        <input name = "kwoutputboil2" id = "kwoutputboil_{{$boiler->id}}_2" type = "hidden" value = "{{$brands}}">
									        
									        <input name = "url" id = "url" type = "hidden" value = "{{ url('/') }}">
									        
									        
									       
									        
									       @if($countboil == 1)
									            <a href="#" onclick ="compare({{$boill2[0] }})" > + Compare this Boiler</a>
									            <a href="{{ url('/boiler/boiler-brand/'.$brandss["0"].'/on/'.$boill["0"]) }}"  >View this Boiler</a>
									        @else
									            <a href="#" onclick ="comparepopupsingle('kwoutputdata_{{$boiler->id}}', {{$count}})" >+ Compare this Boiler</a>
									            <a href="#" onclick ="comparepopupboilsingle('kwoutputboil_{{$boiler->id}}', 'kwoutputdata_{{$boiler->id}}', {{$count}} )"  >View this Boiler</a>	
                                            @endif
									        
									        
                                        @else
                                            <a href="#" onclick ="comparepopupsingle('kwoutputdata_{{$boiler->id}}', {{$count}})" disabled >+ Compare this Boiler</a>
                                            <a href="#" onclick ="comparepopupboilsingle('kwoutputboil_{{$boiler->id}}', 'kwoutputdata_{{$boiler->id}}', {{$count}} )"  disabled>View this Boiler</a>									        
									    @endif
										
									</div>
								</div>
							</div>
							@php $loadedBoilers = $boiler->id ; @endphp
							@endforeach
							<input type= "hidden" id = "loadedBoilers" name = "loadedBoilers" value = "{{ $loadedBoilers }}">
						@else
						<!-- <p><center> NO Boiler Available</center></p> -->
						<div class="norsultbox">
						<span>Your search didn’t return any results!</span>
						<p>Please change your filter options and try again</p>
						</div>
						
						@endif
					</div>
						@if(!$categories->isEmpty())
						@php $showboilers = json_encode($allcategories) ; @endphp
					    <input name = "total_boilers" id = "total_boilers" type = "hidden" value = "{{$showboilers}}">
						<button onclick = "getMore()" id = "loadmore"> Load More</button>					
					@endif
				</div>
			</div>
		</div>
@include('kwpopup')
		<div class="getyourcode">
			<div class="wrapper">
				<div class="getcode-cntnt">
					<p>Get an instant fixed price quote on your new boiler in 90 seconds</p>
					<a href="https://www.warmzilla.co.uk/find-a-boiler">Get Your Quote</a>
				</div>
			</div>
		</div>

	</div>	
	
@if(is_array(@$brand_filter['q']))

<script>
$(document).ready(function () {
    setTimeout(function(){ 
    
        $('html, body').animate({ scrollTop: $('#maindiv').offset().top}, 1000);    
    
    }, 1200);
    
});
</script>
@endif
	<!--center area section -->
<script type="text/javascript">
function filters(flag, val){

    var filtersform = $("#filtersform").serialize();

	if(flag == 'brands' ){
		var url = "{{ url('boiler/boiler-brand' ) }}";
		url = url+'/'+filtersform;
		window.location.href = url;	
	}	
	if(flag == 'checkbox' ){
		var url = "{{ url('boiler/boiler-brand' ) }}";
		url = url+'/'+filtersform+ '/form';
		window.location.href = url;	
	}			
}

function goToBoiler(e){
    var val= $("input[type='radio'][name='kwoutput']:checked").val();
    compare(val);
}

function compare(e){
    // alert(e);
    // alert('this');
$.ajax({
	type: 'POST',
	url : "{{route('addtocompare')}}",
	data:{
		_token: '{{ csrf_token() }}',
		boiler_id: e,
	},
	success: function (data) {
		if(data == true){
		  //  showSessionItemsIn();
		//	alert('Added to campare');
			location.reload();
		}
		if(data == 'limitout'){
			alert('Only three Boilers can be added');
		}
		if(data == 'alreadyadded'){
			alert('Already Added');
		}		
	}
});
	// addtocompare

}

function getMore(){
    
   
    var loadedBoilers = $('#loadedBoilers').val();
    var total_boilers = $('#total_boilers').val();
    
	    var filtersform = $("#filtersform").serialize();    
	    $.ajax({
        	type: 'POST',
        	url : "{{route('getMoreBrand')}}",
        	data:{
        		_token: '{{ csrf_token() }}',
        		lastBoiler: loadedBoilers,
        		totalboilers:total_boilers,
        		filtersform:filtersform,
        	},
        	success: function (data) {
        	    var data1= JSON.parse(data);
        	    if(data1['empty'] == 0 ){
        	        $('#total_boilers').val(data1['totalboilers']);    
        	        $('.sthmb-boxwrap').append(data1['html']);
        	    }else{
        	       // alert('kkook');
        	        $('#loadmore').hide();
        	       // $("#total_boilers").css("display", "none");
        	    }
        	    
        	   // alert(data1[id]);
        	    
        	   // console.log(data1['html']);
        	}
        });
}


function showSessionItemsIn(){  
  
  var fa= '<?php echo getSessionBoilers2() ?>';
    // console.log(fa);
  if(fa != 'empty'){
        $('#sessionItems').empty();    
        $('#sessionItems').html('<h1>huhuh</h1>');  
  }else{
        $('#sessionItems').empty();    
  }
}    

    
</script>

@endsection		
