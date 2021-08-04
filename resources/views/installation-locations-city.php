<!doctype html>
<html class="no-js" lang="eng">
<head>

<title>: Welcome To Warm Zilla</title>

<!-- head Data  included -->
<?php include("includes/head_data.php") ?>
<!-- stylesheets included -->

</head>

<body>

	<!-- header included -->
	<?php include("includes/header.php") ?>
	<!-- header included -->
	
	<!--center area section -->
	<div class="site_wrap">	

		<div class="tsrtopsection tsrtopsection2">		
			<div class="wrapper">
				<div class="row align-items-center">
					<div class="leftimg col">
						<img src="{{ ($location->main_info)?asset('images/boilerlocation/'.$location->main_image):isset('images/installation-location-city.png') }} "width="368" height="368" alt="" title="">
					</div>
					<div class="righttext">
					    @php 
					        if(isset($location->main_info)){
					            echo $location->main_info;
					        }
					    @endphp
					    
<!--						<h2>Boiler Installation in-->
<!--							<br>-->
<!--<span>{{@$location->location_name}}</span></h2>-->
<!--						<p>If you’re looking for a new boiler or a boiler<br> replacement in Birmingham, then get a boiler <br> quote from WarmZilla.-->
<!--							<br>-->
<!--							<br>-->

<!--It only takes 90 seconds to get a boiler quote by <br> answering a few simple questions about your <br> home.</p>-->
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
							<img src="{{ ($location->question_image)?asset('images/boilerlocation/'.$location->question_image):isset('images/02.png') }}" width="138" height="293" alt="" title="">
						</div>
						<div class="content">
							<div id="article">
					    @php 
					        if(isset($location->question)){
					            echo $location->question;
					        }
					    @endphp
<!--								<h3>Boiler Replacement in <span>Birmingham</span></h3>-->
<!--								<p>Take the WarmZilla survey and in minutes you'll be given a fixed price quote on your boiler installation.-->
<!--									<br>-->
<!--									<br>-->

<!--Your boiler installation includes an A-rated boiler with Gas Safe installation from a local Birmingham engineer. Also included are wireless controls, system cleanse, system filter and up to ten years guarantee. One fixed price with no hidden extras.-->
<!--<br>-->
<!--<br>-->
<!--We're so convinced we offer the best prices on boiler installations in Birmingham that we offer a '<a>Best Price Guarantee</a>'. If you get a cheaper quote elsewhere, we'll beat it by £50.</p>-->

<!--								<h3>Where will my <span>heating engineer</span> come from?</h3>-->
<!--								<p>LOCAL ENGINEERS. The WarmZilla boiler comparison tool allows you to compare up to 3 boilers key stats against each other to see which new boiler would best suit your requirements.-->
<!--									<br>-->
<!--									<br>-->
<!--If you want to see boiler prices please take the WarmZilla survey and we’ll give you a boiler quote on a range of boilers suited to your home.  </p>-->
<!--								<h3>I live in a <span>remote</span> place, can I still buy a new boiler?</h3>-->
<!--								<p>The WarmZilla boiler comparison tool allows you to compare up to 3 boilers key stats against each other to see which new boiler would best suit your requirements.-->
<!--									<br>-->
<!--									<br>-->
<!--If you want to see boiler prices please take the WarmZilla survey and we’ll give you a boiler quote on a range of boilers suited to your home. </p>-->
<!--								<h3>How <span>quickly</span> can I get a boiler installed?</h3>-->
<!--								<p>The WarmZilla boiler comparison tool allows you to compare up to 3 boilers key stats against each other to see which new boiler would best suit your requirements.-->
<!--									<br>-->
<!--									<br>-->
<!--If you want to see boiler prices please take the WarmZilla survey and we’ll give you a boiler quote on a range of boilers suited to your home. </p>-->
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div><!-- boiler brand -->

		<div class="tsr04">
			<div class="wrapper">
				<div class="head-para">
					<h2>View another <span>Location</span></h2>
					<p>Choose a <span>boiler installation location</span> to view more information, you can get a quote on a new boiler where you live.</p>
				</div>
				<div class="row">
					<div class="full-width">
						<div class="cbrands">
							<ul>
								<li>
									<div class="item">
										<h5>Birmingham</h5>
										<p>Boiler installations in Birmingham</p>
										<a href="installation-locations-city.php"> <img src="images/src.png" width="19" height="19" alt="" title=""> View Location </a>
									</div>
								</li>
								<li>
									<div class="item">
										<h5>Birmingham</h5>
										<p>Boiler installations in Birmingham</p>
										<a href="installation-locations-city.php"> <img src="images/src.png" width="19" height="19" alt="" title=""> View Location </a>
									</div>
								</li>
								<li>
									<div class="item">
										<h5>Birmingham</h5>
										<p>Boiler installations in Birmingham</p>
										<a href="installation-locations-city.php"> <img src="images/src.png" width="19" height="19" alt="" title=""> View Location </a>
									</div>
								</li>
								<li>
									<div class="item">
										<h5>Birmingham</h5>
										<p>Boiler installations in Birmingham</p>
										<a href="installation-locations-city.php"> <img src="images/src.png" width="19" height="19" alt="" title=""> View Location </a>
									</div>
								</li>
								<li>
									<div class="item">
										<h5>Birmingham</h5>
										<p>Boiler installations in Birmingham</p>
										<a href="installation-locations-city.php"> <img src="images/src.png" width="19" height="19" alt="" title=""> View Location </a>
									</div>
								</li>
								<li>
									<div class="item">
										<h5>Birmingham</h5>
										<p>Boiler installations in Birmingham</p>
										<a href="installation-locations-city.php"> <img src="images/src.png" width="19" height="19" alt="" title=""> View Location </a>
									</div>
								</li>
								<li>
									<div class="item">
										<h5>Birmingham</h5>
										<p>Boiler installations in Birmingham</p>
										<a href="installation-locations-city.php"> <img src="images/src.png" width="19" height="19" alt="" title=""> View Location </a>
									</div>
								</li>
								<li>
									<div class="item">
										<h5>Birmingham</h5>
										<p>Boiler installations in Birmingham</p>
										<a href="installation-locations-city.php"> <img src="images/src.png" width="19" height="19" alt="" title=""> View Location </a>
									</div>
								</li>
								<li>
									<div class="item">
										<h5>Birmingham</h5>
										<p>Boiler installations in Birmingham</p>
										<a href="installation-locations-city.php"> <img src="images/src.png" width="19" height="19" alt="" title=""> View Location </a>
									</div>
								</li>
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
		
	<!-- footer included -->
	<?php include("includes/footer.php") ?>
	<!-- footer included -->
	
	<!-- popups Included -->
	<?php include("includes/popups.php") ?>
	<!-- popups Included -->
	
	<!-- external plugins included -->
	<?php include("includes/plugins.php") ?>
	<!-- external plugins included -->
	
</body>

</html>