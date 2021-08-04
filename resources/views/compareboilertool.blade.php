@extends('layouts.master')
@section('content')
	<!--center area section -->
	<div class="site_wrap">	

		<div class="cbtol-tbox">
			<div class="cbtbox-cntnt">
				<ul class="cbtbc-menu">
					<li class="active"><a href="#">Compare Boilers</a></li>
					<li><a href="#">Boiler Types</a></li>
					<li><a href="#">kW Output</a></li>
					<li><a href="#">Boiler Brands</a></li>
				</ul>
				<div class="cbtbc-dtails">
					<div class="cbtbc-dlft">
						<h3>Using the boiler comparison tool</h3>
						<p>
							We know that when you’re searching for a new boiler, the results can be overwhelming. You get a list of boilers that all look the same. How are you supposed to choose?
<br>
<br>
By using the WarmZilla boiler comparison tool below! 
<br>
<br>
You can select up to three boilers to compare against each other to see which is the best boiler to buy for your home.
						</p>
					</div>
					<div class="cbtbc-drgt">
						<img src="{{asset('images/compareboiler-img.png')}}" width="782" height="351" alt="" title="">
					</div>
				</div>
			</div>
		</div>
		<!-- compare boiler tool top box -->

		<div class="intrst-notifc">
			<span>Now available</span> - 0% interest free credit over 2 years on selected boilers
		</div>
		<!-- Intrust Notification -->

		<div class="systmboilers">
			<div class="sb-wrap">
				<div class="filters-wrap">
					<h6>Filter</h6>
					<form method="post" action="">
						<div class="filtrbox">
							<span class="fbox-title">Fuel Type</span>
							<input class="styled-checkbox" id="styled-checkbox-1" type="checkbox" value="value1">
    						<label for="styled-checkbox-1">Gas</label>
    						<input class="styled-checkbox" id="styled-checkbox-2" type="checkbox" value="value2">
    						<label for="styled-checkbox-2">Oil</label>
    						<input class="styled-checkbox" id="styled-checkbox-3" type="checkbox" value="value3">
    						<label for="styled-checkbox-3">LPG</label>
						</div>
						<div class="filtrbox">
							<span class="fbox-title">kW Output</span>
							<input class="styled-checkbox" id="styled-checkbox-4" type="checkbox" value="value4">
    						<label for="styled-checkbox-4">11 - 20kW</label>
    						<input class="styled-checkbox" id="styled-checkbox-5" type="checkbox" value="value5">
    						<label for="styled-checkbox-5">21 - 30kW</label>
    						<input class="styled-checkbox" id="styled-checkbox-6" type="checkbox" value="value6">
    						<label for="styled-checkbox-6">30+ kW</label>
						</div>
						<div class="filtrbox">
							<span class="fbox-title">Boiler Brand</span>
							<input class="styled-checkbox" id="styled-checkbox-7" type="checkbox" value="value7">
    						<label for="styled-checkbox-7">Alpha</label>
    						<input class="styled-checkbox" id="styled-checkbox-8" type="checkbox" value="value8">
    						<label for="styled-checkbox-8">Baxi</label>
    						<input class="styled-checkbox" id="styled-checkbox-9" type="checkbox" value="value9">
    						<label for="styled-checkbox-9">Ideal</label>
						</div>
					</form>
				</div><!-- filters -->
				<div class="sbthumbs-wrap">
					<div class="head-para">
						<h2>Boiler <span>Comparison </span>Tool</h2>
						<p>Currently displaying WarmZilla’s <span>best-selling new boilers.</span> Use the filter to create your own custom <span>boiler comparison search.</span></p>
						<span class="hidefiltr">Hide Filter</span>
					</div>
					<div class="sthmb-boxwrap">
						<div class="sthmb-box">
							<div class="stbox-lft">
								<img src="{{asset('images/systemboiler.png')}}" width="143" height="225" alt="" title="">
							</div>
							<div class="stbox-rgt">
								<img src="{{asset('images/brand.png')}}" width="134" height="59" alt="" title="" />
								<h4>Worcester Bosch</h4>
								<p>Greenstar Style 8000 Combi Gas Boiler</p>
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
									<a href="#" class="comprmenuopen">+ Compare this Boiler</a>
									<a href="#">View this Boiler</a>
								</div>
							</div>
						</div>
						<div class="sthmb-box">
							<div class="stbox-lft">
								<img src="{{asset('images/systemboiler.png')}}" width="143" height="225" alt="" title="">
							</div>
							<div class="stbox-rgt">
								<img src="{{asset('images/brand.png')}}" width="134" height="59" alt="" title="" />
								<h4>Worcester Bosch</h4>
								<p>Greenstar Style 8000 Combi Gas Boiler</p>
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
									<a href="#" class="comprmenuopen">+ Compare this Boiler</a>
									<a href="#">View this Boiler</a>
								</div>
							</div>
						</div>
						<div class="sthmb-box">
							<div class="stbox-lft">
								<img src="{{asset('images/systemboiler.png')}}" width="143" height="225" alt="" title="">
							</div>
							<div class="stbox-rgt">
								<img src="{{asset('images/brand.png')}}" width="134" height="59" alt="" title="" />
								<h4>Worcester Bosch</h4>
								<p>Greenstar Style 8000 Combi Gas Boiler</p>
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
									<a href="#" class="comprmenuopen">+ Compare this Boiler</a>
									<a href="#">View this Boiler</a>
								</div>
							</div>
						</div>
						<div class="sthmb-box">
							<div class="stbox-lft">
								<img src="{{asset('images/systemboiler.png')}}" width="143" height="225" alt="" title="">
							</div>
							<div class="stbox-rgt">
								<img src="{{asset('images/brand.png')}}" width="134" height="59" alt="" title="" />
								<h4>Worcester Bosch</h4>
								<p>Greenstar Style 8000 Combi Gas Boiler</p>
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
									<a href="#" class="comprmenuopen">+ Compare this Boiler</a>
									<a href="#">View this Boiler</a>
								</div>
							</div>
						</div>
						<div class="sthmb-box">
							<div class="stbox-lft">
								<img src="{{asset('images/systemboiler.png')}}" width="143" height="225" alt="" title="">
							</div>
							<div class="stbox-rgt">
								<img src="{{asset('images/brand.png')}}" width="134" height="59" alt="" title="" />
								<h4>Worcester Bosch</h4>
								<p>Greenstar Style 8000 Combi Gas Boiler</p>
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
									<a href="#" class="comprmenuopen">+ Compare this Boiler</a>
									<a href="#">View this Boiler</a>
								</div>
							</div>
						</div>
						<div class="sthmb-box">
							<div class="stbox-lft">
								<img src="{{asset('images/systemboiler.png')}}" width="143" height="225" alt="" title="">
							</div>
							<div class="stbox-rgt">
								<img src="{{asset('images/brand.png')}}" width="134" height="59" alt="" title="" />
								<h4>Worcester Bosch</h4>
								<p>Greenstar Style 8000 Combi Gas Boiler</p>
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
									<a href="#" class="comprmenuopen">+ Compare this Boiler</a>
									<a href="#">View this Boiler</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- system boilers -->

		<div class="getyourcode">
			<div class="wrapper">
				<div class="getcode-cntnt">
					<p>Get an instant fixed price quote on your new boiler in 90 seconds</p>
					<a href="https://www.warmzilla.co.uk/find-a-boiler">Get Your Quote</a>
				</div>
			</div>
		</div><!-- get your quote -->

		<div class="systmboilers">
			<div class="sb-wrap">
				<div class="sbthumbs-wrap">
					<div class="sthmb-boxwrap">
						<div class="sthmb-box">
							<div class="stbox-lft">
								<img src="{{asset('images/systemboiler.png')}}" width="143" height="225" alt="" title="">
							</div>
							<div class="stbox-rgt">
								<img src="{{asset('images/brand.png')}}" width="134" height="59" alt="" title="" />
								<h4>Worcester Bosch</h4>
								<p>Greenstar Style 8000 Combi Gas Boiler</p>
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
									<a href="#" class="comprmenuopen">+ Compare this Boiler</a>
									<a href="#">View this Boiler</a>
								</div>
							</div>
						</div>
						<div class="sthmb-box">
							<div class="stbox-lft">
								<img src="{{asset('images/systemboiler.png')}}" width="143" height="225" alt="" title="">
							</div>
							<div class="stbox-rgt">
								<img src="{{asset('images/brand.png')}}" width="134" height="59" alt="" title="" />
								<h4>Worcester Bosch</h4>
								<p>Greenstar Style 8000 Combi Gas Boiler</p>
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
									<a href="#" class="comprmenuopen">+ Compare this Boiler</a>
									<a href="#">View this Boiler</a>
								</div>
							</div>
						</div>
						<div class="sthmb-box">
							<div class="stbox-lft">
								<img src="{{asset('images/systemboiler.png')}}" width="143" height="225" alt="" title="">
							</div>
							<div class="stbox-rgt">
								<img src="{{asset('images/brand.png')}}" width="134" height="59" alt="" title="" />
								<h4>Worcester Bosch</h4>
								<p>Greenstar Style 8000 Combi Gas Boiler</p>
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
									<a href="#" class="comprmenuopen">+ Compare this Boiler</a>
									<a href="#">View this Boiler</a>
								</div>
							</div>
						</div>
						<div class="sthmb-box">
							<div class="stbox-lft">
								<img src="{{asset('images/systemboiler.png')}}" width="143" height="225" alt="" title="">
							</div>
							<div class="stbox-rgt">
								<img src="{{asset('images/brand.png')}}" width="134" height="59" alt="" title="" />
								<h4>Worcester Bosch</h4>
								<p>Greenstar Style 8000 Combi Gas Boiler</p>
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
									<a href="#" class="comprmenuopen">+ Compare this Boiler</a>
									<a href="#">View this Boiler</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- system boilers -->

	</div>	
	<!--center area section -->
	@endsection