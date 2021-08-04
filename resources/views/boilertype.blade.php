<?php

// echo "<pre>"; print_r($_SESSION); exit('koko');   

?>

@extends('layouts.master')
@section('content')

		<div class="tsrtopsection">		
			<div class="wrapper">
				<div class="row align-items-center">
					<div class="leftimg col">
					    <img src="{{(@$image1)?url('boiler/public/images/boilerlocation/'.$image1):url('public/images/01.png')}}" width="633" height="284" alt="boilerlocation" title="">
					</div>
					<div class="righttext">
					    @php 
					    echo $firstcontainer;
					    @endphp
						<!--<h2>{{@$heading}} <span>Boilers</span></h2>-->
						<!--<p>If you live in a large home, you have mutliple bathrooms, or you have a high hot water demand, then a {{@$heading}} boiler could be the answer for you.</p>-->
					</div>
				</div>
			</div>
		</div><!-- page banner area section -->

		<div class="getyourcode">
			<div class="wrapper">
				<div class="getcode-cntnt">
					<p>Get an instant fixed price quote on your new boiler in 90 seconds</p>
					<a href="https://www.warmzilla.co.uk/find-a-boiler">Get Your Quote</a>
				</div>
			</div>
		</div><!-- get your quote -->

		<div class="tsr03">
			<div class="wrapper">
				<div class="row">
					<div class="full-width cbox">
						<div class="img">
							<img src="{{(@$image2)?url('boiler/public/images/boilerlocation/'.$image2):url('public/images/02.png')}}" width="633" height="284" alt="boilerlocation" title="">
						</div>
						<div class="content">
							<div id="article">
							    
            					    @php 
            					    echo $questions;
            					    @endphp							    
							    
	<!--							<h3>What is a <span>{{@$heading}} </span>boiler?</h3>-->
	<!--							<p>The WarmZilla boiler comparison tool allows you to compare up to 3 boilers key stats against each other to see which new boiler would best suit your requirements.-->
	<!--								<br>-->
	<!--								<br>-->
	<!--If you want to see boiler prices please take the WarmZilla survey and we’ll give you a boiler quote on a range of boilers suited to your home. -->
	<!--							<br>-->

	<!--							<h3>What comes with my <span>{{@$heading}} </span>boiler?</h3>-->
	<!--							<p>The WarmZilla boiler comparison tool allows you to compare up to 3 boilers key stats against each other to see which new boiler would best suit your requirements.-->
	<!--							<br>-->
	<!--							<br>-->
	<!--							If you want to see boiler prices please take the WarmZilla survey and we’ll give you a boiler quote on a range of boilers suited to your home. </p>-->
	<!--							<h3>Which <span>{{@$heading}}</span> boiler do I need?</h3>-->
	<!--							<p>The WarmZilla boiler comparison tool allows you to compare up to 3 boilers key stats against each other to see which new boiler would best suit your requirements.-->
	<!--								<br>-->
	<!--								<br>-->
	<!--							If you want to see boiler prices please take the WarmZilla survey and we’ll give you a boiler quote on a range of boilers suited to your home. </p>-->
	<!--							<h3>How much does a <span>{{@$heading}}</span> boiler cost?</h3>-->
	<!--							<p>The WarmZilla boiler comparison tool allows you to compare up to 3 boilers key stats against each other to see which new boiler would best suit your requirements.-->
	<!--							<br>-->
	<!--							<br>-->
	<!--							If you want to see boiler prices please take the WarmZilla survey and we’ll give you a boiler quote on a range of boilers suited to your home. </p>-->
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div><!-- boiler brand information -->


		<div class="systmboilers">
			<div class="sb-wrap">
				<div class="filters-wrap">
				    <div class="close-ico-filtr"><img src="{{asset('images/cross-icon-grey-mobile.png')}}" width="34" height="34" align="" ail="icon-grey-mobile" title=""></div>
					<h6>Filter</h6>
					<form method="GET" action="" id = "filtersform" >
						<div class="filtrbox">
							<span class="fbox-title">Fuel Type</span>
							<input class="styled-checkbox" id="styled-checkbox-1" onclick = "filters('checkbox','')" type="checkbox" name = "q[fuel_type][]" value="1" 
							    <?php if(isset($brand_filter['q']['fuel_type']) && $brand_filter != '' && is_array($brand_filter) && in_array(1, $brand_filter['q']['fuel_type']) ){ echo 'checked'; } ?>
							>
    						<label for="styled-checkbox-1">Gas</label>
    						<input class="styled-checkbox" id="styled-checkbox-2" onclick = "filters('checkbox','')" type="checkbox" name = "q[fuel_type][]" value="2"
    						<?php if(isset($brand_filter['q']['fuel_type']) && $brand_filter != '' && is_array($brand_filter) && in_array(2, $brand_filter['q']['fuel_type']) ){ echo 'checked'; } ?>
    						>
    						<label for="styled-checkbox-2">Oil</label>
    						<input class="styled-checkbox" id="styled-checkbox-3" onclick = "filters('checkbox','')" type="checkbox" name = "q[fuel_type][]" value="3"
    						<?php if(isset($brand_filter['q']['fuel_type']) && $brand_filter != '' && is_array($brand_filter) && in_array(3, $brand_filter['q']['fuel_type']) ){ echo 'checked'; } ?>
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
						@if(@$types)
						<div class="filtrbox">
							
    							<span class="fbox-title">Boiler Type</span>
    							@foreach($types as $type)
        							<input class="styled-checkbox" id="styled-checkbox-type-{{ $type->id }}" type="checkbox" onclick = "filters('checkbox','')" name = "q[type][]" value="{{ $type->id }}"
        					        <?php if(isset($brand_filter['q']['type']) && $brand_filter != '' && is_array($brand_filter) && in_array($type->id, $brand_filter['q']['type']) ){ echo 'checked'; } ?>		
        							>
            						<label for="styled-checkbox-type-{{ $type->id }}">{{ $type->name }}</label>
    							@endforeach

	    					
						</div>
						@endif	
						<div class="filtrbox">
							@if(@$brands)
								<span class="fbox-title">Boiler Brand</span>
								@foreach($brands as $brand)
								<!--<span onclick = "filters('brands','{{@$brand->slug}}')" >-->
								<input class="styled-checkbox" name = "q[brand][]" onclick = "filters('brands','{{@$brand->slug}}')" id="styled-checkbox-brand-{{@$brand->id}}" type="checkbox" value="{{@$brand->id}}" 
								<?php if(isset($brand_filter['q']['brand']) && $brand_filter != '' && is_array($brand_filter) && in_array($brand->id, $brand_filter['q']['brand']) ){ echo 'checked'; } ?>		
								    />
	    						<label  for="styled-checkbox-brand-{{@$brand->id}}">{{$brand->name}}</label>
	    						<!--</span>-->
	    						@endforeach
	    					@endif	
						</div>
						
					</form>
				</div><!-- filters -->
				<div class="sbthumbs-wrap">
					<div class="head-para">
						<h2>View <span> {{@$heading}} </span>Boilers</h2>
						<!-- <p>Currently displaying WarmZilla’s best-selling boilers.</p> -->
						  <?php  
						    if($heading == 'Combi'){
						   
	                       $questions = getOption('titlecombi_firstcontainer'); 
	                       if($questions){
	                          $questionsHtml = $questions->value;
	                          echo $questionsHtml;
	                       }
	                   }
	                    ?>
						  <?php  
						    if($heading == 'Regular'){
	                       $questions = getOption('titleregular_firstcontainer'); 
	                       if($questions){
	                          $questionsHtml = $questions->value;
	                          echo $questionsHtml;
	                       }
	                   }
	                    ?>	
						  <?php  
						  if($heading == 'System'){
	                       $questions = getOption('titlesystem_firstcontainer'); 
	                       if($questions){
	                          $questionsHtml = $questions->value;
	                          echo $questionsHtml;
	                       }
	                   }
	                    ?>
						<span class="hidefiltr">Hide Filter</span>
						<span class="showfiltr">Show Filter</span>
					</div>
					<div class="sthmb-boxwrap">
						
						@if(!$categories->isEmpty())
							<?php //echo "<pre>"; print_r($categories); exit('fine');?>
							<?php $allcategories = array();?>
							@foreach($categories as $key => $boiler)
								@php array_push($allcategories, $boiler->id ); @endphp
							<div class="sthmb-box">
								<div class="stbox-lft">
									<img src="{{($boiler->filename)?asset('images/boilercat/'.$boiler->filename):asset('images/systemboiler.png')}}" width="143" height="225" alt="systemboiler" title="">
								</div>
								<div class="stbox-rgt">

									<img src="{{(@$boiler->brands->filename)?asset('images/boilerbrand/'.$boiler->brands->filename):asset('images/brand.png')}}" style = "width:134px; height:59px;" alt="brands" title="" />
									
									<h4> {{ @$boiler->brands->name }} </h4>
									<p>{{$boiler->description}}</p>
									<div class="kwoptions">
										<span>kW Options:</span>
										@php 
										    $cats = array(); 
										    $boil = array(); 
										    $boil2 = array(); 
										    $brands = array(); 
										    
										@endphp
										@if(@$boiler->boilers)
    										
    										<ul>
    										 										        	    @foreach($boiler->boilers as $bKwoutput)
										          
 @php 
	array_push($boil2, $bKwoutput->id );
    array_push($boil, $bKwoutput->slug );
    array_push($cats, $bKwoutput->kwoutput );
    array_push($brands, $boiler->brands->slug );
         @endphp
			         <?php   $count = count($cats); 

			         ?>
	    <button onclick = "comparepopupshow('{{$boiler->id}}', '{{$boiler->id}}','{{  $bKwoutput->kwoutput }}', {{$count}} )">  <li >{{  $bKwoutput->kwoutput }} </li></button>
										        @endforeach
    										</ul>    
    										
										@endif										
										<?php   $count = count($cats); $cats = json_encode($cats) ; $boil = json_encode($boil); $boil2 = json_encode($boil2); $brands = json_encode($brands); ?>
									</div>
									<div class="botm-btns">
									    @if(!empty($cats))
									        <input name = "kwoutputdata" id = "kwoutputdata_{{$boiler->id}}" type = "hidden" value = "{{$cats}}">
									    
									        <input name = "kwoutputdata_2" id = "kwoutputdata_{{$boiler->id}}_2" type = "hidden" value = "{{$boil2}}">
									        
									        <input name = "kwoutputboil" id = "kwoutputboil_{{$boiler->id}}" type = "hidden" value = "{{$boil}}">
									        
									        <input name = "kwoutputboil2" id = "kwoutputboil_{{$boiler->id}}_2" type = "hidden" value = "{{$brands}}">
									        
									        <input name = "url" id = "url" type = "hidden" value = "{{ url('/') }}">
									        
									        <a href="#" onclick ="comparepopup('{{$boiler->id}}', {{$count}})" >+ Compare this Boiler</a>
									        <a href="#" onclick ="comparepopupboil('{{$boiler->id}}', '{{$boiler->id}}', {{$count}} )"  >View this Boiler</a>										        
                                        @else
                                            <a href="#" onclick ="comparepopup('{{$boiler->id}}', {{$count}})" disabled >+ Compare this Boiler</a>
                                            <a href="#" onclick ="comparepopupboil('{{$boiler->id}}', '{{$boiler->id}}', {{$count}} )"  disabled>View this Boiler</a>	
                                            
									    @endif
										
									</div>
								</div>
							</div>
							@php $loadedBoilers = $boiler->id ; @endphp
							@endforeach
							<input type= "hidden" id = "loadedBoilers" name = "loadedBoilers" value = "{{ $loadedBoilers }}"/>
							
						@else
					<!-- 	<p><center> NO Boiler Available</center></p> -->
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
		<!-- system boilers -->
@include('kwpopup')
		<div class="getyourcode">
			<div class="wrapper">
				<div class="getcode-cntnt">
					<p>Get an instant fixed price quote on your new boiler in 90 seconds</p>
					<a href="https://www.warmzilla.co.uk/find-a-boiler">Get Your Quote</a>
				</div>
			</div>
		</div><!-- get your quote -->


	</div>	
	<!--center area section -->
	
<script type="text/javascript">

function filters(flag, val){

    var filtersform = $("#filtersform").serialize();
    if(filtersform == ''){
        var url = "{{ url( $route ) }}";
     
		window.location.href = url;	
    }
	else {    
		var url = "{{ url( $route ) }}";
		
		url = url+'/'+filtersform+ '/form';
		window.location.href = url;	
	}			
}


// $(window).on('scroll',function(){
// 	if($(this).scrollTop() >= 1000 ){
// 	    var loadedBoilers = $('#loadedBoilers').val();
// 	    var filtersform = $("#filtersform").serialize();    
// 	    $.ajax({
//         	type: 'POST',
//         	url : "{{route('getMoreRecords')}}",
//         	data:{
//         		_token: '{{ csrf_token() }}',
//         		lastBoiler: loadedBoilers,
//         		filtersform:filtersform,
//         	},
//         	success: function (data) {
//         	    $('.sthmb-boxwrap').append(data);
//         	    console.log(data);
//         	}
//         });
// 	}else{
	
// 	}
// });



function goToBoiler(e){
    var val= $("input[type='radio'][name='kwoutput']:checked").val();
    compare(val);
}
    
function compare(e){
    $.ajax({
    	type: 'POST',
    	url : "{{route('addtocompare')}}",
    	data:{
    		_token: '{{ csrf_token() }}',
    		boiler_id: e,
    	},
    	success: function (data) {
    		if(data === true){
    			//alert('Added to campare');
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

   

function getMore(){
    
    // alert(d);
    
    // alert('loadedBoilers');
    
    var loadedBoilers = $('#loadedBoilers').val();
    var total_boilers = $('#total_boilers').val();
    
	    var filtersform = $("#filtersform").serialize();    
	    $.ajax({
        	type: 'POST',
        	url : "{{route('getMoreCombi')}}",
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

 

</script>



@endsection		
