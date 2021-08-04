@extends('layouts.master')
@section('content')



		<div class="cbtol-tbox">
			<div class="cbtbox-cntnt">
				<ul class="cbtbc-menu">
					<li class="active tablinks" data-tab="tab1"><a href="#" onclick="return false">Compare Boilers</a></li>
					<li class="tablinks" data-tab="tab2"><a href="#" onclick="return false">Boiler Types</a></li>
					<li class="tablinks" data-tab="tab3"><a href="#" onclick="return false">kW Output</a></li>
					<li class="tablinks" data-tab="tab4"><a href="#" onclick="return false">Boiler Brands</a></li>
				</ul>

				<div class="cbtbc-dtails current" id="tab1">
					<div class="cbtbc-dlft">
						 <?php  
                       $questions = getOption('comparison_firstcontainer'); 
                       if($questions){
                          $questionsHtml = $questions->value;
                          echo $questionsHtml;
                       }
                    ?>
					</div>
					<div class="cbtbc-drgt">
						  <?php  
                            $comparison = getOption('comparison'); 
                               if($comparison){
                                  $image = $comparison->value;
                                //   echo $questionsHtml;
                               }
                        ?>	
						<img src="{{ (@$image)?asset('images/boilerfinance/'.$image):asset('images/compareboiler-img.png') }}" width="782" height="351" alt="Boiler Comparison" title="">
					</div>
				</div>

				<div class="cbtbc-dtails" id="tab2">
				
				<div class="cbtbc-dlft">
						 <?php  
                       $questions = getOption('comparison_firstcontainer_boilertype'); 
                       if($questions){
                          $questionsHtml = $questions->value;
                          echo $questionsHtml;
                       }
                    ?>
					</div>
					<div class="cbtbc-drgt">
						  <?php  
                            $comparison_boilertype = getOption('comparison_boilertype'); 
                               if($comparison_boilertype){
                                  $image = $comparison_boilertype->value;
                                //   echo $questionsHtml;
                               }
                        ?>	
						<img src="{{ (@$image)?asset('images/boilerfinance/'.$image):asset('images/compareboiler-img.png') }}" width="782" height="351" alt="Boiler Compariso" title="">
					</div>
				</div>

				<div class="cbtbc-dtails" id="tab3">
					<div class="cbtbc-dlft">
						 <?php  
                       $questions = getOption('comparison_firstcontainer_kwoutput'); 
                       if($questions){
                          $questionsHtml = $questions->value;
                          echo $questionsHtml;
                       }
                    ?>
					</div>
					<div class="cbtbc-drgt">
						  <?php  
                            $comparison_kwoutput = getOption('comparison_kwoutput'); 
                               if($comparison_kwoutput){
                                  $image = $comparison_kwoutput->value;
                                //   echo $questionsHtml;
                               }
                        ?>	
						<img src="{{ (@$image)?asset('images/boilerfinance/'.$image):asset('images/compareboiler-img.png') }}" width="782" height="351" alt="Boiler Compariso" title="">
					</div>
				</div>

				<div class="cbtbc-dtails" id="tab4">
					<div class="cbtbc-dlft">
						 <?php  
                       $questions = getOption('comparison_firstcontainer_boilerbrand'); 
                       if($questions){
                          $questionsHtml = $questions->value;
                          echo $questionsHtml;
                       }
                    ?>
					</div>
					<div class="cbtbc-drgt">
						  <?php  
                            $comparison_boilerbrand = getOption('comparison_boilerbrand'); 
                               if($comparison_boilerbrand){
                                  $image = $comparison_boilerbrand->value;
                                //   echo $questionsHtml;
                               }
                        ?>	
						<img src="{{ (@$image)?asset('images/boilerfinance/'.$image):asset('images/compareboiler-img.png') }}" width="782" height="351" alt="Boiler Compariso" title="">
					</div>


			</div>
		</div>
		<!-- compare boiler tool top box -->

		<div class="intrst-notifc">
			<span>Now available</span> - 0% interest free credit over 2 years on selected boilers
		</div>
		<!-- Intrust Notification -->



		<div class="systmboilers" id = "maindiv" >
			<div class="sb-wrap">
				<div class="filters-wrap">
				    <div class="close-ico-filtr"><img src="{{asset('images/cross-icon-grey-mobile.png')}}" width="34" height="34" alt="icon-grey-mobile" align="" title=""></div>
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
                       $questions = getOption('titlecomparison_firstcontainer'); 
                       if($questions){
                          $questionsHtml = $questions->value;
                          echo $questionsHtml;
                       }
                    ?>
						<span class="hidefiltr">Hide Filter</span>
						<span class="showfiltr">Show Filter</span>
					</div>
					<div class="sthmb-boxwrap">
						
						@if(!$categories->isEmpty())
							<?php $allcategories = array();  //echo "<pre>"; print_r($categories); exit('fine');?>
							@foreach($categories as $key => $boiler)
							@php array_push($allcategories, $boiler->id ); @endphp
							<div class="sthmb-box">
								<div class="stbox-lft">
									<img src="{{($boiler->filename)?asset('images/boilercat/'.$boiler->filename):asset('images/systemboiler.png')}}" width="143" height="225" alt="systemboiler" title="">
								</div>
								<div class="stbox-rgt">

									<img src="{{(@$boiler->brands->filename)?asset('images/boilerbrand/'.$boiler->brands->filename):asset('images/brand.png')}}" style = "width:134px; height:59px;" alt="brands" title="" />
									
									<h4> {{ @$boiler->name }} </h4>
									<p>{{$boiler->description}}</p>
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
									        
									        <!--<input name = "url_{{$boiler->id}}" id = "url_{{$boiler->id}}" type = "hidden" value = "{{ url('boiler/boiler-brands/') }}">-->
									        <input name = "url" id = "url" type = "hidden" value = "{{ url('/') }}">
									        
									        @if($countboil == 1)
									            <a href="#" onclick ="compare({{$boill2[0] }})" > + Compare this Boiler</a>
									            <a href="{{ url('/boiler/boiler-brands/'.$brandss["0"].'/on/'.$boill["0"]) }}"  >View this Boiler</a>
									        @else
									            <a href="#" onclick ="comparepopup('{{$boiler->id}}', {{$count}})" >+ Compare this Boiler</a>
									            <a href="#" onclick ="comparepopupboil('{{$boiler->id}}', '{{$boiler->id}}', {{$count}} )"  >View this Boiler</a>									        
                                            @endif
                                        @else
                                            <a href="#" onclick ="comparepopup('{{$boiler->id}}', {{$count}})" disabled >+ Compare this Boiler</a>
                                            <a href="#" onclick ="comparepopupboil('{{$boiler->id}}', '{{$boiler->id}}', {{$count}} )"  disabled>View this Boiler</a>									        
									    @endif
										
									</div>
								</div>
							</div>
							@php $loadedBoilers = $boiler->id ; @endphp
							@endforeach

							<input type= "hidden" id = "loadedBoilers" name = "loadedBoilers" class =  "loadedBoilers" value = "{{ $loadedBoilers }}"/>
							
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

@if(is_array($brand_filter))

<script>
$(document).ready(function () {
    setTimeout(function(){ 
    
        $('html, body').animate({ scrollTop: $('#maindiv').offset().top}, 1000);    
    
    }, 1200);
    
});
</script>
@endif


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



function getMore(){
    
    // alert(d);
    //alert(234534);
    // alert('loadedBoilers');
    
    var loadedBoilers = $('#loadedBoilers').val();
    var total_boilers = $('#total_boilers').val();
    
	    var filtersform = $("#filtersform").serialize();    
	    $.ajax({
        	type: 'POST',
        	url : "{{route('getMoreRecords')}}",
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
