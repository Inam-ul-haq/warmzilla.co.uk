@extends('layouts.master')
@section('content')
	<!--center area section -->
	<div class="site_wrap">	

		<div class="tsrtopsection">		
			<div class="wrapper">
				<div class="row align-items-center">
					<div class="leftimg col">

                        @php 
                            $image1 = getOption('boilerlocation_page_img');
                            if($image1){
                                $image1 = $image1->value;
                            }
                            
                        @endphp			
                        
						<img src="{{(@$image1)?url('boiler/public/images/boilerlocation/'.$image1):url('boiler/public/images/warmzilla-delivery-vector.png')}}" width="633" height="284" alt="" title="">
					</div>
					<div class="righttext">
						
                        
                        @php 
                            $info = getOption('boilerlocation_firstcontainer');     
                            if($info){
                                echo $info->value;
                            }
                        @endphp						
						
						<!--<h2>Boiler <span>Installation</span> Locations</h2>-->
						<!--<p>WarmZilla’s friendly network of Gas Safe-->
						<!--<br> engineers known as ‘WarmInstallers’ cover-->
						<!--<br> England, Scotland and Wales. Unfortunately we-->
						<!--<br> do not currently cover Northern Ireland or the-->
						<!--<br> Republic of Ireland.</p>-->
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
							
                            @php 
                                $image2 = getOption('boiler_question_img');     
                                if($image2){
                                    $image2 =  $image2->value;
                                }
                            @endphp	
                            <img src="{{(@$image2)?url('boiler/public/images/boilerlocation/'.$image2):url('boiler/public/images/warmzilla-delivery-vector.png')}}" width="138" height="293" alt="" title="">						
						    <!-- <img src="{{url('public/images/02.png')}}" width="138" height="293" alt="" title=""> -->
						</div>
						<div class="content">
							<div id="article-boilerinstall">
								@php 
		                            $info = getOption('boilerlocation_questions');     
		                            if($info){
		                                echo $info->value;
		                            }
		                        @endphp										
<!-- 								<h3>Do WarmZilla cover <span>my area</span>?</h3>
								<p>There are a lot of factors involved in choosing the right boiler for your home. For some it may be finding the cheapest boiler, for others it may be making sure you get the best looking boiler or the best performing boiler.
								<br>
								<br>
								Whatever you’re looking for the WarmZilla <a href="#">Boiler Comparison</a> Tool can make the process of finding a new boiler much easier. You can also take the <a href="#">WarmZilla Survey</a> and get a fixed price boiler quote online in 90 seconds, without giving any personal details.</p>

								<h3>Where will my <span>heating engineer</span> come from?</h3>
								<p>LOCAL ENGINEERS. The WarmZilla boiler comparison tool allows you to compare up to 3 boilers key stats against each other to see which new boiler would best suit your requirements.
									<br>
									<br>
If you want to see boiler prices please take the WarmZilla survey and we’ll give you a boiler quote on a range of boilers suited to your home.  </p>
								<h3>I live in a <span>remote</span> place, can I still buy a new boiler?</h3>
								<p>The WarmZilla boiler comparison tool allows you to compare up to 3 boilers key stats against each other to see which new boiler would best suit your requirements.
									<br>
									<br>
If you want to see boiler prices please take the WarmZilla survey and we’ll give you a boiler quote on a range of boilers suited to your home. </p>
								<h3>How <span>quickly</span> can I get a boiler installed?</h3>
								<p>The WarmZilla boiler comparison tool allows you to compare up to 3 boilers key stats against each other to see which new boiler would best suit your requirements.
									<br>
									<br>
If you want to see boiler prices please take the WarmZilla survey and we’ll give you a boiler quote on a range of boilers suited to your home. </p> -->
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div><!-- boiler brand -->

		<div class="tsr04">
			<div class="wrapper">
				<div class="head-para">
					<h2>Choose a <span>Location</span></h2>
					<?php  
                       $questions = getOption('titlelocation_firstcontainer'); 
                       if($questions){
                          $questionsHtml = $questions->value;
                          echo $questionsHtml;
                       }
                    ?>
								</div>
				<div class="row">
					<div class="full-width">
						<div class="cbrands">
							<ul>
	                            @if(@$locations)
                                    @foreach($locations as $key => $location)
                                        <li>
        									<div class="item">
        										<h5>{{ @$location->location_name }} </h5>
        										<p>{{ @$location->location_description }}</p>
        										<a href="{{ url('boiler/boiler-installation-locations/'.$location->slug )}}"> <img src="{{url('boiler/public/images/src.png')}}" width="19" height="19" alt="" title=""> View Location </a>
        									</div>
        								</li>
    								@endforeach
								@else
								    NO location available
								@endif
								<!--<li>-->
								<!--	<div class="item">-->
								<!--		<h5>Birmingham</h5>-->
								<!--		<p>Boiler installations in Birmingham</p>-->
								<!--		<a href="{{url('installation-location-city')}}"> <img src="{{url('public/images/src.png')}}" width="19" height="19" alt="" title=""> View Location </a>-->
								<!--	</div>-->
								<!--</li>-->
								<!--<li>-->
								<!--	<div class="item">-->
								<!--		<h5>Birmingham</h5>-->
								<!--		<p>Boiler installations in Birmingham</p>-->
								<!--		<a href="{{url('installation-location-city')}}"> <img src="{{url('public/images/src.png')}}" width="19" height="19" alt="" title=""> View Location </a>-->
								<!--	</div>-->
								<!--</li>-->
								<!--<li>-->
								<!--	<div class="item">-->
								<!--		<h5>Birmingham</h5>-->
								<!--		<p>Boiler installations in Birmingham</p>-->
								<!--		<a href="{{url('installation-location-city')}}"> <img src="{{url('public/images/src.png')}}" width="19" height="19" alt="" title=""> View Location </a>-->
								<!--	</div>-->
								<!--</li>-->
								<!--<li>-->
								<!--	<div class="item">-->
								<!--		<h5>Birmingham</h5>-->
								<!--		<p>Boiler installations in Birmingham</p>-->
								<!--		<a href="{{url('installation-location-city')}}"> <img src="{{url('public/images/src.png')}}" width="19" height="19" alt="" title=""> View Location </a>-->
								<!--	</div>-->
								<!--</li>-->
								<!--<li>-->
								<!--	<div class="item">-->
								<!--		<h5>Birmingham</h5>-->
								<!--		<p>Boiler installations in Birmingham</p>-->
								<!--		<a href="{{url('installation-location-city')}}"> <img src="{{url('public/images/src.png')}}" width="19" height="19" alt="" title=""> View Location </a>-->
								<!--	</div>-->
								<!--</li>-->
								<!--<li>-->
								<!--	<div class="item">-->
								<!--		<h5>Birmingham</h5>-->
								<!--		<p>Boiler installations in Birmingham</p>-->
								<!--		<a href="{{url('installation-location-city')}}"> <img src="{{url('public/images/src.png')}}" width="19" height="19" alt="" title=""> View Location </a>-->
								<!--	</div>-->
								<!--</li>-->
								<!--<li>-->
								<!--	<div class="item">-->
								<!--		<h5>Birmingham</h5>-->
								<!--		<p>Boiler installations in Birmingham</p>-->
								<!--		<a href="{{url('installation-location-city')}}"> <img src="{{url('public/images/src.png')}}" width="19" height="19" alt="" title=""> View Location </a>-->
								<!--	</div>-->
								<!--</li>-->
								<!--<li>-->
								<!--	<div class="item">-->
								<!--		<h5>Birmingham</h5>-->
								<!--		<p>Boiler installations in Birmingham</p>-->
								<!--		<a href="{{url('installation-location-city')}}"> <img src="{{url('public/images/src.png')}}" width="19" height="19" alt="" title=""> View Location </a>-->
								<!--	</div>-->
								<!--</li>-->
							</ul>
						</div>		
					</div>
				</div>
			</div>	
		</div><!-- brands -->

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
@endsection				