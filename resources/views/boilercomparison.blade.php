@extends('layouts.master')
@section('content')
	<!--center area section -->
	<div class="site_wrap boilrcompars">	

<!--		<div class="cbtol-tbox">-->
<!--			<div class="cbtbox-cntnt">-->
<!--				<ul class="cbtbc-menu">-->
<!--					<li class="active"><a href="#">Compare Boilers</a></li>-->
<!--					<li><a href="#">Boiler Types</a></li>-->
<!--					<li><a href="#">kW Output</a></li>-->
<!--					<li><a href="#">Boiler Brands</a></li>-->
<!--				</ul>-->
<!--				<div class="cbtbc-dtails">-->
<!--					<div class="cbtbc-dlft">-->
<!--						<h3>Using the boiler comparison tool</h3>-->
<!--						<p>-->
<!--							We know that when you’re searching for a new boiler, the results can be overwhelming. You get a list of boilers that all look the same. How are you supposed to choose?-->
<!--<br>-->
<!--<br>-->
<!--By using the WarmZilla boiler comparison tool below! -->
<!--<br>-->
<!--<br>-->
<!--You can select up to three boilers to compare against each other to see which is the best boiler to buy for your home.-->
<!--						</p>-->
<!--					</div>-->
<!--					<div class="cbtbc-drgt">-->
<!--						<img src="images/compareboiler-img.png" width="782" height="351" alt="" title="">-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
		<!-- compare boiler tool top box -->

<!--		<div class="intrst-notifc">-->
<!--			<span>Now available</span> - 0% interest free credit over 2 years on selected boilers-->
<!--		</div>-->
		<!-- Intrust Notification -->



		<div class="tsrtopsection">		
			<div class="wrapper">
				<div class="row align-items-center">
					<div class="righttext">
							 <?php  
                       $questions = getOption('comparison_page_firstcontainer'); 
                       if($questions){
                          $questionsHtml = $questions->value;
                          echo $questionsHtml;
                       }
                    ?>
					</div>
					<div class="leftimg col">
						  <?php  
                            $comparison_page = getOption('comparison_page'); 
                               if($comparison_page){
                                  $image = $comparison_page->value;
                                //   echo $questionsHtml;
                               }
                        ?>	
						<img src="{{ (@$image)?asset('images/boilerfinance/'.$image):asset('images/compareboiler-img.png') }}" width="782" height="351" alt="" title="">
					</div>
				</div>
			</div>
		</div><!-- page banner area section -->

		<div class="slectdboilr">
			<div class="wrapper">
				<div class="sb-cntnt">

					@if(@$boilers)
						<h3>Your <span>currently selected</span> boilers are:</h3>
						@foreach($boilers as $boiler)
							<div class="sbthumb">
								<img src="{{(@$boiler->brands->filename)?asset('images/boilerbrand/'.$boiler->brands->filename):asset('images/systemboiler.png')}}" width="133" height="59" alt="" title="">
								<img src="{{(@$boiler->filename)?asset('images/finish/'.$boiler->filename):asset('images/systemboiler.png')}}" width="175" height="274" alt="" title="">
								<span>{{$boiler->name}}</span>
								<a class="closeme" onclick = "deleteSessionItems({{$boiler->id}})"></a>
							</div>							
						@endforeach
						
						@if(count(@$boilers) == 2)
						
     					<div class="sbthumb addanotherboiler">
    						<img src="{{asset('images/addnewboiler.png')}}" width="167" height="274" alt="" title="">
    						<a class="addboilrbtn" href="{{url('boiler/boiler-brands')}}">+ Add another boiler</a>
    					</div> 
						
						@elseif(count(@$boilers) == 1)
        					<div class="sbthumb addanotherboiler">
    						    <img src="{{asset('images/addnewboiler.png')}}" width="167" height="274" alt="" title="">
    						    <a class="addboilrbtn" href="{{url('boiler/boiler-brands')}}">+ Add another boiler</a>
    					    </div>
        					<div class="sbthumb addanotherboiler">
    						    <img src="{{asset('images/addnewboiler.png')}}" width="167" height="274" alt="" title="">
    						    <a class="addboilrbtn" href="{{url('boiler/boiler-brands')}}">+ Add another boiler</a>
    					    </div>
						
						@else
						
						@endif
						
					@else
						<h3>No boilers selected </h3>
						<a href="https://www.warmzilla.co.uk/boiler/boiler-brands" class="addboilrbtnmob show-tablet">+Add Boilers to Compare</a>
					@endif

					

					<!--<div class="sbthumb">-->
					<!--	<img src="{{asset('images/comparison-brandlogo.png')}}" width="133" height="59" alt="" title="">-->
					<!--	<img src="{{asset('images/compare-boiler-img.png')}}" width="175" height="274" alt="" title="">-->
					<!--	<span>Worcester Bosch Life 8000 - 30kW</span>-->
					<!--	<a class="closeme"></a>-->
					<!--</div>-->
 				<!--	<div class="sbthumb addanotherboiler">-->
					<!--	<img src="{{asset('images/addnewboiler.png')}}" width="167" height="274" alt="" title="">-->
					<!--	<a class="addboilrbtn" href="#">+ Add another boiler</a>-->
					<!--</div> -->
				</div>
			</div>
		</div><!-- selected boilers -->
        @if(@$boilers)

      <div class="bccntnt-wrap hidden-desktop show-tablet">
			<div class="wrapper">
				<div class="bccw-inr">
					<div class="bccwi-box hidden-mobile hide-tablet">
						<div class="bccwi-blft">
							<h4>Boiler <span>Comparison</span></h4>
							<p>The WarmZilla boiler comparison tool allows you to compare up to 3 boilers key stats against each other to see which new boiler would best suit your requirements.
								<br><br>If you want to see boiler prices please take the WarmZilla survey and we’ll give you a boiler quote on a range of boilers suited to your home.<br><br>
                                <strong>Note:</strong> WarmZilla don’t sell all boilers available on the comparison tool.
							</p>
						</div>
						<div class="bccwi-brgt slectdboilr">
							<div class="sb-cntnt">
								@foreach($boilers as $boiler)
    								<div class="sbthumb">
    									<img src="{{(@$boiler->brands->filename)?asset('images/boilerbrand/'.$boiler->brands->filename):asset('images/systemboiler.png')}}" width="98" height="46" alt="" title="">
    									<img src="{{(@$boiler->filename)?asset('images/finish/'.$boiler->filename):asset('images/systemboiler.png')}}" width="92" height="164" alt="" title="">
    									<span>{{ $boiler->name }}</span>
    								</div>
								@endforeach
							</div>
						</div>
					</div>

					<!--<div class="bccwi-box bccwi-box2 grey-elmnt">-->
					<!--	<div class="bccwi-blft">-->
					<!--		<h4>Review Score</h4>-->
					<!--		<p>-->
					<!--			The review scores below are brought to you by Which? Reviewing products to allow you to make the best purchase.-->
					<!--			<br>-->
					<!--			<br>-->
					<!--		</p>-->
					<!--		<p>-->
					<!--			<img src="{{asset('images/which-logo.png')}}" width="69" height="70" alt="" title="" />-->
					<!--			We wanted to give you impartial review scores on boilers, <br> that aren’t linked to what boilers we sell at WarmZilla.-->
					<!--		</p>-->
					<!--	</div>-->
					<!--	<div class="ratingbox-wrap">-->
					<!--		<div class="rbox">-->
					<!--			<div class="number">8.9</div>-->
					<!--			<span>/10</span>-->
					<!--		</div>-->
					<!--		<div class="rbox">-->
					<!--			<div class="number">8.9</div>-->
					<!--			<span>/10</span>-->
					<!--		</div>-->
					<!--		<div class="rbox">-->
					<!--			<div class="number">8.9</div>-->
					<!--			<span>/10</span>-->
					<!--		</div>-->
					<!--	</div>-->
					<!--</div>-->

					<div class="bccwi-box bccwi-box2 ffbox grey-elmnt">
						<div class="bccwi-blft">
							<h4>Flow Rate <i class="fa fa-angle-up hidden-desktop show-tablet"></i></h4>
						</div>
						<p style="display:block;">
								The hot water flow rate, expressed as litres per minute (LPM), indicates the speed at which the boiler can heat water supplied to your taps and showers.
								<br>
								<br>
								Hot water flow rates on combi boilers can vary from 9.8LPM to 25LPM.
							</p>
							<div class="ratingbox-wrap" style="display:block;">
							@foreach($boilers as $boiler)
							<div class="mob-ratngboxwrap">
							<span>{{ $boiler->name }}</span>
                                <div class="rbox">
    								<div class="number">{{ @$boiler->flowrate }}</div>
    								<span>LPM</span>
    						</div>		
    						</div>							    
							@endforeach
	
							<!--<div class="rbox">-->
							<!--	<div class="number">8.9</div>-->
							<!--	<span>LPM</span>-->
							<!--</div>-->
							<!--<div class="rbox">-->
							<!--	<div class="number">8.9</div>-->
							<!--	<span>LPM</span>-->
							<!--</div>-->
						</div>
					</div>

					<div class="bccwi-box bccwi-box2">
						<div class="bccwi-blft">
							<h4>kW Output <i class="fa fa-angle-down hidden-desktop show-tablet"></i></h4>
						</div>
						<p>
								Boiler size is measured in kilowatts (kW). A kilowatt is a unit that defines how much energy your boiler outputs in the form of heat. 
								<br>
								<br>	
As a general rule, the more heat and hot water you require for your home, the higher the kW boiler you will need.
							</p>
						<div class="ratingbox-wrap">
							
							@foreach($boilers as $boiler)
							<div class="mob-ratngboxwrap">
							<span>{{ $boiler->name }}</span>
                                <div class="rbox">
    								<div class="number">{{ @$boiler->kwoutput }}</div>
    								<span>KW</span>
    						</div>		
    							</div>							    
							@endforeach
							
							<!--<div class="rbox">-->
							<!--	<div class="number">27</div>-->
							<!--	<span>KW</span>-->
							<!--</div>-->
							<!--<div class="rbox">-->
							<!--	<div class="number">27</div>-->
							<!--	<span>KW</span>-->
							<!--</div>-->
							<!--<div class="rbox">-->
							<!--	<div class="number">29</div>-->
							<!--	<span>KW</span>-->
							<!--</div>-->
						</div>
					</div>

					<div class="bccwi-box bccwi-box2 grey-elmnt">
						<div class="bccwi-blft">
							<h4>ErP Rating <i class="fa fa-angle-down hidden-desktop show-tablet"></i></h4>
						</div>
						<p>
								ErP stands for ‘Energy Related Products Directive’. It is an easy way of understanding how efficient a product is without having to learn jargon.
								<br>
								<br>	
Every boiler is given an ErP rating for heating and hot water between A+++ and G (least efficient).
							</p>
						<div class="ratingbox-wrap">
							
							@foreach($boilers as $boiler)
							<div class="mob-ratngboxwrap">
							<span>{{ $boiler->name }}</span>
                                <div class="rbox">
    								<div class="number">{{ @$boiler->erprating }}</div>
    								<span>Rated</span>
    							</div>
    						</div>								    
							@endforeach							
							
							
							<!--<div class="rbox">-->
							<!--	<div class="number">A</div>-->
							<!--	<span>Rated</span>-->
							<!--</div>-->
							<!--<div class="rbox">-->
							<!--	<div class="number">A</div>-->
							<!--	<span>Rated</span>-->
							<!--</div>-->
							<!--<div class="rbox">-->
							<!--	<div class="number">A</div>-->
							<!--	<span>Rated</span>-->
							<!--</div>-->
						</div>
					</div>

					<div class="bccwi-box bccwi-box2">
						<div class="bccwi-blft">
							<h4>Warranty <i class="fa fa-angle-down hidden-desktop show-tablet"></i></h4>
						</div>
						<p>
								Every boiler comes with a specific length warranty or guarantee. You get more cover with a guarantee if something goes wrong.
								<br>
								<br>
The warranty lengths listed are standard manufacturer’s lengths. 
							</p>
						<div class="ratingbox-wrap">

							@foreach($boilers as $boiler)
							<div class="mob-ratngboxwrap">
							<span>{{ $boiler->name }}</span>
                                <div class="rbox">
    								<div class="number">{{ @$boiler->warranty }}</div>
    								<span>years</span>
    							</div>
    						</div>								    
							@endforeach							



							<!--<div class="rbox">-->
							<!--	<div class="number">5</div>-->
							<!--	<span>years</span>-->
							<!--</div>-->
							<!--<div class="rbox">-->
							<!--	<div class="number">10</div>-->
							<!--	<span>years</span>-->
							<!--</div>-->
							<!--<div class="rbox">-->
							<!--	<div class="number">15</div>-->
							<!--	<span>years</span>-->
							<!--</div>-->
						</div>
					</div>

					<div class="bccwi-box bccwi-box2 grey-elmnt">
						<div class="bccwi-blft">
							<h4>Energy Efficiency <i class="fa fa-angle-down hidden-desktop show-tablet"></i></h4>
						</div>
						<p>
								Energy efficiency is a more accurate measurement of a boiler’s efficiency than ErP ratings as it is based on a percentage value.
								<br>
								<br>	
ErP ratings mainly give modern boilers A-rated, which doesn’t help you decide. 
							</p>
						<div class="ratingbox-wrap">
							
							@foreach($boilers as $boiler)
							<div class="mob-ratngboxwrap">
							<span>{{ $boiler->name }}</span>
                                <div class="rbox">
    								<div class="number">{{ @$boiler->energyefficiency }}</div>
    								<span>%</span>
    							</div>
    						</div>								    
							@endforeach							
							
							<!--<div class="rbox">-->
							<!--	<div class="number">91</div>-->
							<!--	<span>%</span>-->
							<!--</div>-->
							<!--<div class="rbox">-->
							<!--	<div class="number">87</div>-->
							<!--	<span>%</span>-->
							<!--</div>-->
							<!--<div class="rbox">-->
							<!--	<div class="number">93</div>-->
							<!--	<span>%</span>-->
							<!--</div>-->
						</div>
					</div>

<!--					<div class="bccwi-box bccwi-box2 grey-elmnt">-->
<!--						<div class="bccwi-blft">-->
<!--							<h4>Warranty</h4>-->
<!--							<p>-->
<!--								Every boiler comes with a specific length warranty or guarantee. You get more cover with a guarantee if something goes wrong.-->
<!--								<br>-->
<!--								<br>-->
<!--The warranty lengths listed are standard manufacturer’s lengths.  -->
<!--							</p>-->
<!--						</div>-->
<!--						<div class="ratingbox-wrap">-->
<!--							<div class="rbox">-->
<!--								<div class="number">5</div>-->
<!--								<span>years</span>-->
<!--							</div>-->
<!--							<div class="rbox">-->
<!--								<div class="number">10</div>-->
<!--								<span>years</span>-->
<!--							</div>-->
<!--							<div class="rbox">-->
<!--								<div class="number">15</div>-->
<!--								<span>years</span>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->

					<div class="bccwi-box bccwi-box2">
						<div class="bccwi-blft">
							<h4>Dimensions <i class="fa fa-angle-down hidden-desktop show-tablet"></i></h4>
						</div>
						<p>
								If your new boiler needs to fit in a tight space, like a kitchen cupboard or an airing cupboard then you’ll need to know the dimensions.
								<br>
								<br>	
We list the height, width, and depth of your selected boilers.
							</p>
						<div class="ratingbox-wrap">
							
							@foreach($boilers as $boiler)
							<div class="mob-ratngboxwrap">
							<span>{{ $boiler->name }}</span>
                                <div class="rbox">
    								@php
                                		if($boiler->dimensions){
                                			$dims = explode(',', $boiler->dimensions);
                                			foreach($dims as $dim){
                                				echo '<span>'. $dim .'</span>';
                                			}
                                		}
                                	@endphp
    							</div>
    						</div>								    
							@endforeach								
							
							<!--<div class="rbox">-->
							<!--	<span>h: 121cm</span>-->
							<!--	<span>w: 121cm</span>-->
							<!--	<span>d: 59cm</span>-->
							<!--</div>-->
							<!--<div class="rbox">-->
							<!--	<span>h: 121cm</span>-->
							<!--	<span>w: 121cm</span>-->
							<!--	<span>d: 59cm</span>-->
							<!--</div>-->
							<!--<div class="rbox">-->
							<!--	<span>h: 121cm</span>-->
							<!--	<span>w: 121cm</span>-->
							<!--	<span>d: 59cm</span>-->
							<!--</div>-->
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- boiler comparison -->  
		<div class="bccntnt-wrap hidden-mobile hide-tablet">
			<div class="wrapper">
				<div class="bccw-inr">
					<div class="bccwi-box">
						<div class="bccwi-blft">
							<h4>Boiler <span>Comparison</span></h4>
							<p>The WarmZilla boiler comparison tool allows you to compare up to 3 boilers key stats against each other to see which new boiler would best suit your requirements.
								<br><br>If you want to see boiler prices please take the WarmZilla survey and we’ll give you a boiler quote on a range of boilers suited to your home.<br><br>
                                <strong>Note:</strong> WarmZilla don’t sell all boilers available on the comparison tool.
							</p>
						</div>
						<div class="bccwi-brgt slectdboilr">
							<div class="sb-cntnt">
								@foreach($boilers as $boiler)
    								<div class="sbthumb">
    									<img src="{{(@$boiler->brands->filename)?asset('images/boilerbrand/'.$boiler->brands->filename):asset('images/systemboiler.png')}}" width="98" height="46" alt="" title="">
    									<img src="{{(@$boiler->filename)?asset('images/finish/'.$boiler->filename):asset('images/systemboiler.png')}}" width="92" height="164" alt="" title="">
    									<span>{{ $boiler->name }}</span>
    								</div>
								@endforeach
							</div>
						</div>
					</div>

					<!--<div class="bccwi-box bccwi-box2 grey-elmnt">-->
					<!--	<div class="bccwi-blft">-->
					<!--		<h4>Review Score</h4>-->
					<!--		<p>-->
					<!--			The review scores below are brought to you by Which? Reviewing products to allow you to make the best purchase.-->
					<!--			<br>-->
					<!--			<br>-->
					<!--		</p>-->
					<!--		<p>-->
					<!--			<img src="{{asset('images/which-logo.png')}}" width="69" height="70" alt="" title="" />-->
					<!--			We wanted to give you impartial review scores on boilers, <br> that aren’t linked to what boilers we sell at WarmZilla.-->
					<!--		</p>-->
					<!--	</div>-->
					<!--	<div class="ratingbox-wrap">-->
					<!--		<div class="rbox">-->
					<!--			<div class="number">8.9</div>-->
					<!--			<span>/10</span>-->
					<!--		</div>-->
					<!--		<div class="rbox">-->
					<!--			<div class="number">8.9</div>-->
					<!--			<span>/10</span>-->
					<!--		</div>-->
					<!--		<div class="rbox">-->
					<!--			<div class="number">8.9</div>-->
					<!--			<span>/10</span>-->
					<!--		</div>-->
					<!--	</div>-->
					<!--</div>-->

					<div class="bccwi-box bccwi-box2 grey-elmnt">
						<div class="bccwi-blft">
							<h4>Flow Rate</h4>
							<p>
								The hot water flow rate, expressed as litres per minute (LPM), indicates the speed at which the boiler can heat water supplied to your taps and showers.
								<br>
								<br>
								Hot water flow rates on combi boilers can vary from 9.8LPM to 25LPM.
							</p>
						</div>
						<div class="ratingbox-wrap">
							@foreach($boilers as $boiler)
                                <div class="rbox">
    								<div class="number">{{ @$boiler->flowrate }}</div>
    								<span>LPM</span>
    							</div>							    
							@endforeach
							
							<!--<div class="rbox">-->
							<!--	<div class="number">8.9</div>-->
							<!--	<span>LPM</span>-->
							<!--</div>-->
							<!--<div class="rbox">-->
							<!--	<div class="number">8.9</div>-->
							<!--	<span>LPM</span>-->
							<!--</div>-->
						</div>
					</div>

					<div class="bccwi-box bccwi-box2">
						<div class="bccwi-blft">
							<h4>kW Output</h4>
							<p>
								Boiler size is measured in kilowatts (kW). A kilowatt is a unit that defines how much energy your boiler outputs in the form of heat. 
								<br>
								<br>	
As a general rule, the more heat and hot water you require for your home, the higher the kW boiler you will need.
							</p>
						</div>
						<div class="ratingbox-wrap">
							
							@foreach($boilers as $boiler)
                                <div class="rbox">
    								<div class="number">{{ @$boiler->kwoutput }}</div>
    								<span>KW</span>
    							</div>							    
							@endforeach
							
							<!--<div class="rbox">-->
							<!--	<div class="number">27</div>-->
							<!--	<span>KW</span>-->
							<!--</div>-->
							<!--<div class="rbox">-->
							<!--	<div class="number">27</div>-->
							<!--	<span>KW</span>-->
							<!--</div>-->
							<!--<div class="rbox">-->
							<!--	<div class="number">29</div>-->
							<!--	<span>KW</span>-->
							<!--</div>-->
						</div>
					</div>

					<div class="bccwi-box bccwi-box2 grey-elmnt">
						<div class="bccwi-blft">
							<h4>ErP Rating</h4>
							<p>
								ErP stands for ‘Energy Related Products Directive’. It is an easy way of understanding how efficient a product is without having to learn jargon.
								<br>
								<br>	
Every boiler is given an ErP rating for heating and hot water between A+++ and G (least efficient).
							</p>
						</div>
						<div class="ratingbox-wrap">
							
							@foreach($boilers as $boiler)
                                <div class="rbox">
    								<div class="number">{{ @$boiler->erprating }}</div>
    								<span>Rated</span>
    							</div>							    
							@endforeach							
							
							
							<!--<div class="rbox">-->
							<!--	<div class="number">A</div>-->
							<!--	<span>Rated</span>-->
							<!--</div>-->
							<!--<div class="rbox">-->
							<!--	<div class="number">A</div>-->
							<!--	<span>Rated</span>-->
							<!--</div>-->
							<!--<div class="rbox">-->
							<!--	<div class="number">A</div>-->
							<!--	<span>Rated</span>-->
							<!--</div>-->
						</div>
					</div>

					<div class="bccwi-box bccwi-box2">
						<div class="bccwi-blft">
							<h4>Warranty</h4>
							<p>
								Every boiler comes with a specific length warranty or guarantee. You get more cover with a guarantee if something goes wrong.
								<br>
								<br>
The warranty lengths listed are standard manufacturer’s lengths. 
							</p>
						</div>
						<div class="ratingbox-wrap">

							@foreach($boilers as $boiler)
                                <div class="rbox">
    								<div class="number">{{ @$boiler->warranty }}</div>
    								<span>years</span>
    							</div>							    
							@endforeach							



							<!--<div class="rbox">-->
							<!--	<div class="number">5</div>-->
							<!--	<span>years</span>-->
							<!--</div>-->
							<!--<div class="rbox">-->
							<!--	<div class="number">10</div>-->
							<!--	<span>years</span>-->
							<!--</div>-->
							<!--<div class="rbox">-->
							<!--	<div class="number">15</div>-->
							<!--	<span>years</span>-->
							<!--</div>-->
						</div>
					</div>

					<div class="bccwi-box bccwi-box2 grey-elmnt">
						<div class="bccwi-blft">
							<h4>Energy Efficiency</h4>
							<p>
								Energy efficiency is a more accurate measurement of a boiler’s efficiency than ErP ratings as it is based on a percentage value.
								<br>
								<br>	
ErP ratings mainly give modern boilers A-rated, which doesn’t help you decide. 
							</p>
						</div>
						<div class="ratingbox-wrap">
							
							@foreach($boilers as $boiler)
                                <div class="rbox">
    								<div class="number">{{ @$boiler->energyefficiency }}</div>
    								<span>%</span>
    							</div>							    
							@endforeach							
							
							<!--<div class="rbox">-->
							<!--	<div class="number">91</div>-->
							<!--	<span>%</span>-->
							<!--</div>-->
							<!--<div class="rbox">-->
							<!--	<div class="number">87</div>-->
							<!--	<span>%</span>-->
							<!--</div>-->
							<!--<div class="rbox">-->
							<!--	<div class="number">93</div>-->
							<!--	<span>%</span>-->
							<!--</div>-->
						</div>
					</div>

<!--					<div class="bccwi-box bccwi-box2 grey-elmnt">-->
<!--						<div class="bccwi-blft">-->
<!--							<h4>Warranty</h4>-->
<!--							<p>-->
<!--								Every boiler comes with a specific length warranty or guarantee. You get more cover with a guarantee if something goes wrong.-->
<!--								<br>-->
<!--								<br>-->
<!--The warranty lengths listed are standard manufacturer’s lengths.  -->
<!--							</p>-->
<!--						</div>-->
<!--						<div class="ratingbox-wrap">-->
<!--							<div class="rbox">-->
<!--								<div class="number">5</div>-->
<!--								<span>years</span>-->
<!--							</div>-->
<!--							<div class="rbox">-->
<!--								<div class="number">10</div>-->
<!--								<span>years</span>-->
<!--							</div>-->
<!--							<div class="rbox">-->
<!--								<div class="number">15</div>-->
<!--								<span>years</span>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->

					<div class="bccwi-box bccwi-box2">
						<div class="bccwi-blft">
							<h4>Dimensions</h4>
							<p>
								If your new boiler needs to fit in a tight space, like a kitchen cupboard or an airing cupboard then you’ll need to know the dimensions.
								<br>
								<br>	
We list the height, width, and depth of your selected boilers.
							</p>
						</div>
						<div class="ratingbox-wrap">
							
							@foreach($boilers as $boiler)
                                <div class="rbox">
    								@php
                                		if($boiler->dimensions){
                                			$dims = explode(',', $boiler->dimensions);
                                			foreach($dims as $dim){
                                				echo '<span>'. $dim .'</span>';
                                			}
                                		}
                                	@endphp
    							</div>							    
							@endforeach								
							
							<!--<div class="rbox">-->
							<!--	<span>h: 121cm</span>-->
							<!--	<span>w: 121cm</span>-->
							<!--	<span>d: 59cm</span>-->
							<!--</div>-->
							<!--<div class="rbox">-->
							<!--	<span>h: 121cm</span>-->
							<!--	<span>w: 121cm</span>-->
							<!--	<span>d: 59cm</span>-->
							<!--</div>-->
							<!--<div class="rbox">-->
							<!--	<span>h: 121cm</span>-->
							<!--	<span>w: 121cm</span>-->
							<!--	<span>d: 59cm</span>-->
							<!--</div>-->
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- boiler comparison -->

		<div class="getyourcode">
			<div class="wrapper">
				<div class="getcode-cntnt">
					<p>Get an instant fixed price quote on your new boiler in 90 seconds</p>
					<a href="https://www.warmzilla.co.uk/find-a-boiler">Get Your Quote</a>
				</div>
			</div>
		</div>
		<!--  get your code  -->

		<div class="features-wrap hidden-desktop show-tablet">
			<div class="wrapper">
				<div class="fw-iner">
					<div class="fwhead">
						<h3>Features <i class="fa fa-angle-down hidden-desktop show-tablet"></i></h3>
					</div>
					<p class="featuesmoble">Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).</p>
					<div class="fwmaincontnt">
						
						@foreach($boilers as $boiler)
						<div class="mob-ratngboxwrap">
						<span>{{ $boiler->name }}</span>
					</div>
        					<!-- <div class="fwmc-grey">
    							<h4>{{ @$boiler->name }}</h4>
    							<p>
    							   	@php
                                        if(@$boiler->description){
                                            echo $boiler->description;
                                        }
                                    @endphp
    							</p>
        					</div> -->
									
						    <div class="fwmc-white">
							    <div class="fwmc-whiteleft">
								@php
                                    if(@$boiler->features){
                                        echo $boiler->features;
                                    }
                                @endphp
							    </div>
							    <div class="fwmc-whitergt">
								    <img src="{{(@$boiler->brands->filename)?asset('images/boilerbrand/'.$boiler->brands->filename):asset('images/systemboiler.png')}}" width="98" height="46" alt="" title="">
    								<img src="{{(@$boiler->filename)?asset('images/finish/'.$boiler->filename):asset('images/systemboiler.png')}}" width="92" height="164" alt="" title="">
							    </div>
						    </div>
						@endforeach	
					</div>

					<!--<div class="fwmaincontnt">-->
					<!--	<div class="fwmc-grey">-->
					<!--		<h4>Worcester Bosch</h4>-->
					<!--		<p>-->
					<!--			Greenstar Style 8000 -->
					<!--			<br>-->
					<!--			Combi Gas Boiler-->
					<!--		</p>-->
					<!--	</div>-->
					<!--	<div class="fwmc-white">-->
					<!--		<div class="fwmc-whiteleft">-->
					<!--			<p>-->
					<!--				Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).-->
					<!--				<br>-->
					<!--				<br>-->
					<!--			</p>-->
					<!--			<ul>-->
					<!--				<li>Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).</li>-->
					<!--				<li>Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).</li>-->
					<!--				<li>Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).</li>-->
					<!--				<li>Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).</li>-->
					<!--				<li>Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).</li>-->
					<!--				<li>Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).</li>-->
					<!--			</ul>-->
					<!--			<p>-->
					<!--				Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).-->
					<!--				<br>-->
					<!--				<br>-->
					<!--			</p>-->
					<!--			<p>-->
					<!--				Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).-->
					<!--				<br>-->
					<!--				<br>-->
					<!--			</p>-->
					<!--		</div>-->
					<!--		<div class="fwmc-whitergt">-->
					<!--			<img class="fwmc-brnd" src="{{asset('images/comparison-brandlogo.png')}}" width="133" height="59" alt="" title="">-->
					<!--			<img src="{{asset('images/feature-rowimg.png')}}" width="104" height="163" alt="" title="">-->
					<!--		</div>-->
					<!--	</div>-->
					<!--</div>-->

					<!--<div class="fwmaincontnt">-->
					<!--	<div class="fwmc-grey">-->
					<!--		<h4>Worcester Bosch</h4>-->
					<!--		<p>-->
					<!--			Greenstar Style 8000 -->
					<!--			<br>-->
					<!--			Combi Gas Boiler-->
					<!--		</p>-->
					<!--	</div>-->
					<!--	<div class="fwmc-white">-->
					<!--		<div class="fwmc-whiteleft">-->
					<!--			<p>-->
					<!--				Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).-->
					<!--				<br>-->
					<!--				<br>-->
					<!--			</p>-->
					<!--			<ul>-->
					<!--				<li>Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).</li>-->
					<!--				<li>Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).</li>-->
					<!--				<li>Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).</li>-->
					<!--				<li>Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).</li>-->
					<!--				<li>Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).</li>-->
					<!--				<li>Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).</li>-->
					<!--			</ul>-->
					<!--			<p>-->
					<!--				Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).-->
					<!--				<br>-->
					<!--				<br>-->
					<!--			</p>-->
					<!--			<p>-->
					<!--				Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).-->
					<!--				<br>-->
					<!--				<br>-->
					<!--			</p>-->
					<!--		</div>-->
					<!--		<div class="fwmc-whitergt">-->
					<!--			<img class="fwmc-brnd" src="{{asset('images/comparison-brandlogo.png')}}" width="133" height="59" alt="" title="">-->
					<!--			<img src="{{asset('images/feature-rowimg.png')}}" width="104" height="163" alt="" title="">-->
					<!--		</div>-->
					<!--	</div>-->
					<!--</div>-->

				</div>
			</div>
		</div>
		<!-- features wrap -->

		<div class="features-wrap hidden-mobile hide-tablet">
			<div class="wrapper">
				<div class="fw-iner">
					<div class="fwhead">
						<h3>Features</h3>
						<p>Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).</p>
					</div>

					<div class="fwmaincontnt">
						
						@foreach($boilers as $boiler)
        					<div class="fwmc-grey">
    							<h4>{{ @$boiler->name }}</h4>
    							<!--<p>
    							   	@php
                                        if(@$boiler->description){
                                            echo $boiler->description;
                                        }
                                    @endphp
    							</p>-->
        					</div>
									
						    <div class="fwmc-white">
							    <div class="fwmc-whiteleft">
								@php
                                    if(@$boiler->features){
                                        echo $boiler->features;
                                    }
                                @endphp
							    </div>
							    <div class="fwmc-whitergt">
								    <img src="{{(@$boiler->brands->filename)?asset('images/boilerbrand/'.$boiler->brands->filename):asset('images/systemboiler.png')}}" width="98" height="46" alt="" title="">
    								<img src="{{(@$boiler->filename)?asset('images/finish/'.$boiler->filename):asset('images/systemboiler.png')}}" width="92" height="164" alt="" title="">
							    </div>
						    </div>
						@endforeach	
					</div>

					<!--<div class="fwmaincontnt">-->
					<!--	<div class="fwmc-grey">-->
					<!--		<h4>Worcester Bosch</h4>-->
					<!--		<p>-->
					<!--			Greenstar Style 8000 -->
					<!--			<br>-->
					<!--			Combi Gas Boiler-->
					<!--		</p>-->
					<!--	</div>-->
					<!--	<div class="fwmc-white">-->
					<!--		<div class="fwmc-whiteleft">-->
					<!--			<p>-->
					<!--				Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).-->
					<!--				<br>-->
					<!--				<br>-->
					<!--			</p>-->
					<!--			<ul>-->
					<!--				<li>Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).</li>-->
					<!--				<li>Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).</li>-->
					<!--				<li>Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).</li>-->
					<!--				<li>Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).</li>-->
					<!--				<li>Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).</li>-->
					<!--				<li>Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).</li>-->
					<!--			</ul>-->
					<!--			<p>-->
					<!--				Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).-->
					<!--				<br>-->
					<!--				<br>-->
					<!--			</p>-->
					<!--			<p>-->
					<!--				Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).-->
					<!--				<br>-->
					<!--				<br>-->
					<!--			</p>-->
					<!--		</div>-->
					<!--		<div class="fwmc-whitergt">-->
					<!--			<img class="fwmc-brnd" src="{{asset('images/comparison-brandlogo.png')}}" width="133" height="59" alt="" title="">-->
					<!--			<img src="{{asset('images/feature-rowimg.png')}}" width="104" height="163" alt="" title="">-->
					<!--		</div>-->
					<!--	</div>-->
					<!--</div>-->

					<!--<div class="fwmaincontnt">-->
					<!--	<div class="fwmc-grey">-->
					<!--		<h4>Worcester Bosch</h4>-->
					<!--		<p>-->
					<!--			Greenstar Style 8000 -->
					<!--			<br>-->
					<!--			Combi Gas Boiler-->
					<!--		</p>-->
					<!--	</div>-->
					<!--	<div class="fwmc-white">-->
					<!--		<div class="fwmc-whiteleft">-->
					<!--			<p>-->
					<!--				Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).-->
					<!--				<br>-->
					<!--				<br>-->
					<!--			</p>-->
					<!--			<ul>-->
					<!--				<li>Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).</li>-->
					<!--				<li>Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).</li>-->
					<!--				<li>Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).</li>-->
					<!--				<li>Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).</li>-->
					<!--				<li>Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).</li>-->
					<!--				<li>Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).</li>-->
					<!--			</ul>-->
					<!--			<p>-->
					<!--				Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).-->
					<!--				<br>-->
					<!--				<br>-->
					<!--			</p>-->
					<!--			<p>-->
					<!--				Every boiler has features that set it apart from the rest and this is the section to find out the special features of your chosen boiler(s).-->
					<!--				<br>-->
					<!--				<br>-->
					<!--			</p>-->
					<!--		</div>-->
					<!--		<div class="fwmc-whitergt">-->
					<!--			<img class="fwmc-brnd" src="{{asset('images/comparison-brandlogo.png')}}" width="133" height="59" alt="" title="">-->
					<!--			<img src="{{asset('images/feature-rowimg.png')}}" width="104" height="163" alt="" title="">-->
					<!--		</div>-->
					<!--	</div>-->
					<!--</div>-->

				</div>
			</div>
		</div>
		<!-- features wrap -->


        @endif
	    </div>	
	<!--center area section -->	
		
@endsection


