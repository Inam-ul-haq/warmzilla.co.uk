@extends('layouts.master')
@section('content')

	<!--center area section -->
	<div class="site_wrap">	
@include('layouts.banner')
		<!-- <div class="tsrtopsection">		
			<div class="wrapper">
				<div class="row align-items-center">
					<div class="leftimg col">
						<img src="{{asset('images/01.png')}}" width="" height="" alt="" title="">
					</div>
					<div class="righttext">
						<h2>Worcester Bosch <span>Boilers</span></h2>
						<p>Worcester Bosch have built an enviable reputation as one of the premier manufacturers of combi, system and regular boilers in the U.K.
<br>
<br>
Their gas boilers are regular winners of the Which? Best Buy for new boilers..</p>
					</div>
				</div>
			</div>
		</div> --> 
	<!-- page banner area section -->

	<div class="getyourcode">
			<div class="wrapper">
				<div class="getcode-cntnt">
					<p>Get an instant fixed price quote on your new boiler in 90 seconds</p>
					<a href="#">Get Your Quote</a>
				</div>
			</div>
	</div>
		<!-- get your quote -->

		<div class="tsr03">
			<div class="wrapper">
				<div class="row">
					<div class="full-width cbox">
						<div class="img">
							<img src="{{asset('images/02.png')}}" width="138" height="293" alt="" title="">
						</div>
						<div class="content">
							<div class="topbrand-row">
								<img src="{{asset('images/worcester-brand.jpg')}}" width="194" height="42" alt="" title="">
								<img src="{{asset('images/bosch-brand.jpg')}}" width="194" height="42" alt="" title="">
							</div>
							<div id="article">
								@if(@$brand->brand_questions)
									{{html_entities_decode(@$brand->brand_questions)}}	
								@endif
<!-- 								<p>The WarmZilla boiler comparison tool allows you to compare up to 3 boilers key stats against each other to see which new boiler would best suit your requirements.
									<br>
									<br>
	If you want to see boiler prices please take the WarmZilla survey and we’ll give you a boiler quote on a range of boilers suited to your home. 
								<br>

								<h3>What comes with my <span>Worcester Bosch </span>boiler?</h3>
								<p>The WarmZilla boiler comparison tool allows you to compare up to 3 boilers key stats against each other to see which new boiler would best suit your requirements.
								<br>
								<br>
								If you want to see boiler prices please take the WarmZilla survey and we’ll give you a boiler quote on a range of boilers suited to your home. </p>
								<h3>Which <span>Worcester Bosch</span> boiler do I need?</h3>
								<p>The WarmZilla boiler comparison tool allows you to compare up to 3 boilers key stats against each other to see which new boiler would best suit your requirements.
									<br>
									<br>
								If you want to see boiler prices please take the WarmZilla survey and we’ll give you a boiler quote on a range of boilers suited to your home. </p>
								<h3>How much does a <span>Worcester Bosch</span> boiler cost?</h3>
								<p>The WarmZilla boiler comparison tool allows you to compare up to 3 boilers key stats against each other to see which new boiler would best suit your requirements.
								<br>
								<br>
								If you want to see boiler prices please take the WarmZilla survey and we’ll give you a boiler quote on a range of boilers suited to your home. </p> -->
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div> 
		<!-- boiler brand information -->
		<div class="systmboilers">
			<div class="sb-wrap">
				<div class="filters-wrap">
					<h6>Filter</h6>
					<form method="GET" action="" id = "filtersform" >
						<div class="filtrbox">
							<span class="fbox-title">Fuel Type</span>
							<input class="styled-checkbox" id="styled-checkbox-1" onclick = "filters('checkbox','')" type="checkbox" name = "q[fuel_type][]" value="1">
    						<label for="styled-checkbox-1">Gas</label>
    						<input class="styled-checkbox" id="styled-checkbox-2" onclick = "filters('checkbox','')" type="checkbox" name = "q[fuel_type][]" value="2">
    						<label for="styled-checkbox-2">Oil</label>
    						<input class="styled-checkbox" id="styled-checkbox-3" onclick = "filters('checkbox','')" type="checkbox" name = "q[fuel_type][]" value="3">
    						<label for="styled-checkbox-3">LPG</label>
						</div>
						<div class="filtrbox">
							<span class="fbox-title">kW Output</span>
							<input class="styled-checkbox" id="styled-checkbox-4" type="checkbox" name = "q[kwoutput][]" value="value4">
    						<label for="styled-checkbox-4">11 - 20kW</label>
    						<input class="styled-checkbox" id="styled-checkbox-5" type="checkbox" name = "q[kwoutput][]" value="value5">
    						<label for="styled-checkbox-5">21 - 30kW</label>
    						<input class="styled-checkbox" id="styled-checkbox-6" type="checkbox" name = "q[kwoutput][]" value="value6">
    						<label for="styled-checkbox-6">30+ kW</label>
						</div>
						<div class="filtrbox">
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
						<h2>View <span>Worcester Bosch </span>Boilers</h2>
						<p>Currently displaying WarmZilla’s best-selling <span>Worcester Bosch</span> boilers. Use the filter to create your own custom <span>Worcester Bosch</span> boiler search.</p>
						<span class="hidefiltr">Hide Filter</span>
					</div>
					<div class="sthmb-boxwrap">
						<?php //echo "<pre>"; print_r($boilers); exit('bi');?>
						@if(!$boilers->isEmpty())
							@foreach($boilers as $boiler)
							<div class="sthmb-box">
								<div class="stbox-lft">
									<img src="{{($boiler->filename)?asset('images/finish/'.$boiler->filename):asset('images/systemboiler.png')}}" width="143" height="225" alt="" title="">
								</div>
								<div class="stbox-rgt">


									<img src="{{(@$boiler->brands->filename)?asset('images/boilerbrand/'.$boiler->brands->filename):asset('images/brand.png')}}" style = "width:134px; height:59px;" alt="" title="" />
									<h4>{{$boiler->name}}</h4>
									<p>{{$boiler->description}}</p>
									<div class="kwoptions">
										<span>kW Options:</span>
										<ul>
											<li data-fancybox data-src="#kwpopup">25</li>
											<li data-fancybox data-src="#kwpopup">30</li>
											<li data-fancybox data-src="#kwpopup">35</li>
											<li data-fancybox data-src="#kwpopup">40</li>
											<li data-fancybox data-src="#kwpopup">45</li>
										</ul>
									</div>
									<div class="botm-btns">
										<a href="#" onclick = "compare({{$boiler->id}})">+ Compare this Boiler</a>
										<a href="boiler-type.php">View this Boiler</a>
									</div>
								</div>
							</div>
							@endforeach
						@else
						<!-- <p><center> NO Boiler Available</center></p> -->
						<div class="norsultbox">
						<span>Your search didn’t return any results!</span>
						<p>Please change your filter options and try again</p>
						</div>
						
						@endif
					</div>
				</div>
			</div>
		</div>
		<!-- system boilers -->

		<div class="getyourcode">
			<div class="wrapper">
				<div class="getcode-cntnt">
					<p>Get an instant fixed price quote on your new boiler in 90 seconds</p>
					<a href="#">Get Your Quote</a>
				</div>
			</div>
		</div><!-- get your quote -->


	</div>	
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
		url = url+'/'+filtersform;
		window.location.href = url;	
	}			
}


function goToBoiler(e){
    var val= $("input[type='radio'][name='kwoutput']:checked").val();
    compare(val);
}

function compare(e){
	// alert(e);

$.ajax({
	type: 'POST',
	url : "{{route('addtocompare')}}",
	data:{
		_token: '{{ csrf_token() }}',
		boiler_id: e,
	},
	success: function (data) {
		if(data == true){
		//	alert('Added to campare');
		location.reload();
		}
		if(data == 'limitout'){
			alert('Only three boiler can be added');
		}

	}

});
	// addtocompare

}

</script>

@endsection		