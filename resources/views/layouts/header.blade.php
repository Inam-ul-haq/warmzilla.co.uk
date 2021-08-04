<header class="header-container">

	<div class="topbar">
		<div class="header-wrap">
			<div class="tbar-left">
				<div class="htp-phone">Freephone:<a href="tel:0333 577 9090">0333 577 9090</a></div>
				<div class="htp-email"><a href="mailto:ask@warmzilla.co.uk">ask@warmzilla.co.uk</a></div>
			</div>
			<div class="tbar-rgt">
				<ul class="social">
					<li><a href="https://www.facebook.com/WarmZilla" target="_blank"><i class="fa fa-facebook"></i></a></li>
					<li><a href="https://twitter.com/WarmZilla/" target="_blank"><i class="fa fa-twitter"></i></a></li>
					<li><a href="https://www.instagram.com/WarmZilla/" target="_blank"><i class="fa fa-instagram"></i></a></li>
				</ul>
				<!-- <div class="login"><a href="{{url('boiler/login')}}">Login</a></div> -->
				<div class="login"><a href="https://www.warmzilla.co.uk/login">Login</a></div>
			</div>
		</div>
	</div><!-- header topbar -->

	<div class="logo-nav">
		<div class="header-wrap">
			<div class="logo">
				<a href=" {{ url('/') }} ">
					<img src="{{asset('images/warmzilla-logo.svg')}}" width="344" height="68" alt="Warm Zilla" title="">
				</a>
			</div><!--  logo -->

			<div class="headr-btn"><a href="https://www.warmzilla.co.uk/find-a-boiler" class="primry-btn">Get your Quote</a></div><!-- button -->
			
			<nav class="mainbar animated slideInRight2">
				<ul>
					<!--<li><a href=" {{ url('/') }} ">Home</a></li>-->
					<!--<li><a href="{{url('boiler-brands')}}">Boilers</a></li>-->
					<!--<li><a href="{{url('boiler-comparison')}}">Boilers Comparison</a></li>	
									-->
					<li>
					    <a href="https://www.warmzilla.co.uk/">Home</a>   
					</li>
					<li>
					    <a href="javascript:void(0)">Boilers<i class="fa fa-angle-down"></i></a>
					    <ul class="submenu">
							<li>

								<a href="{{url('boiler/boiler-brand')}}" class="nav-link">Boiler Brands</a>
								<li><a href="{{url('boiler/boiler-comparison')}}">Boilers Comparison</a></li>

								
								<li><a href="{{url('boiler/boiler-finance')}}">Boiler Finance</a></li>
								<li><a href="{{url('boiler/boiler-installation-locations')}}">Boiler Installation Locations</a></li>
								<li><a href="{{url('boiler/combi-boilers')}}">Combi Boiler </a></li>
								<li><a href="{{url('boiler/regular-boilers')}}">Regular Boiler </a></li>
								<li><a href="{{url('boiler/system-boilers')}}">System Boiler </a></li>
												
								
							</li>
						</ul>
					</li>
                    <li>
					    <a href="https://www.warmzilla.co.uk/about-us">About Us<i class="fa fa-angle-down"></i></a>
					    <ul class="submenu">
							<li>
								<a href="https://warmzilla.co.uk/how-it-works" class="nav-link">How it Works</a>
								<a href="https://warmzilla.co.uk/best-boiler-price-guarantee" class="nav-link">Best Boiler Price Guarantee</a>
								<a href="https://warmzilla.co.uk/1-in-100-boilers-free" class="nav-link">1-in-100 Boilers Free</a>
								

							</li>
						</ul>
					</li>					
					<li><a href="https://www.warmzilla.co.uk/faqs">FAQs<i class="fa fa-angle-down"></i></a>
						 <ul class="submenu">
							<li>
								<a href="https://www.warmzilla.co.uk/faqs/installation" class="nav-link">Boiler Installation</a>
								<a href="https://www.warmzilla.co.uk/faqs/whats-included" class="nav-link">What's Included</a>
								<a href="https://www.warmzilla.co.uk/faqs/payment" class="nav-link">Payment</a>
								<a href="https://www.warmzilla.co.uk/faqs/survey-questions" class="nav-link">Survey Questions</a>
								<a href="https://www.warmzilla.co.uk/faqs/general" class="nav-link">General</a>
								<a href="https://www.warmzilla.co.uk/faqs/landlord" class="nav-link">Landlord</a>
								

							</li>
						</ul>
					</li>
					<li><a href="https://www.warmzilla.co.uk/blog">Blog<i class="fa fa-angle-down"></i></a>
						 <ul class="submenu">
							<li>
								<a href="https://www.warmzilla.co.uk/blog/category/fuel-types" class="nav-link">Fuel Types</a>
								<a href="https://www.warmzilla.co.uk/blog/category/guides" class="nav-link">Boiler Guides</a>
								<a href="https://www.warmzilla.co.uk/blog/category/news" class="nav-link">News</a>
								<a href="https://www.warmzilla.co.uk/blog/category/reviews" class="nav-link">Reviews</a>
								<a href="https://www.warmzilla.co.uk/blog/category/saving-money" class="nav-link">Saving Money</a>
								<a href="https://www.warmzilla.co.uk/blog/category/smart-technology" class="nav-link">Smart Technology</a>
								

							</li>
						</ul>
					</li>
					<li><a href="https://www.warmzilla.co.uk/contact-us">Contact Us</a></li>
				</ul>
			</nav><!-- navbar -->
			
			<!-- Menu For Mobile -->
			 <div class="mobilemenu-overlay" style="display:none;"></div>
			<nav class="mobile-menu">
			  <!-- Menu Toggle btn-->
			  <div class="menu-toggle">
			      <button type="button" id="menu-btn">
			          <div class="hamburger-menu">
						<img src="{{asset('images/Burger-Menu-icon.png')}}" width="29" height="21" alt="" title="">
					  </div>
			      </button>
			  </div>
			  <!-- Responsive Menu Structure-->
			  <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
			  <ul id="respMenu" class="ace-responsive-menu">
			  	  <div class="mobilecloseico" style="display:none;"></div>		
			  	  <div class="quick-icons">
			  	  	<a href="{{url('boiler/login')}}">
			  	  		<i class="fa fa-user-o"></i>
			  	  		<span>account</span></a>
					<a href="tel:0333 577 9090">
						<i class="fa fa-phone"></i>
						<span>call</span>
					</a>
					<a href="mailto:ask@warmzilla.co.uk">
						<i class="fa fa-envelope-o"></i>
						<span>email</span>
					</a>
				  </div>
				  <li><a href="https://www.warmzilla.co.uk/find-a-boiler">Find a Boiler</a></li>
				  <li><a href="https://www.warmzilla.co.uk/">Home</a></li>		
			      <li>
			      	<a href="javascript:void(0)">Boilers</a>
			      	<i class="fa fa-angle-down level1click"></i>
			          <ul class="level1">
			              
							<li><a href="{{url('/boiler/')}}">Boiler Brands</a></li>
							<li><a href="{{url('boiler/boiler-brands')}}">Boiler Comparison</a></li>
							
							<li><a href="{{url('boiler/boiler-finance')}}">Boiler Finance</a></li>
							<li><a href="{{url('boiler/boiler-installation-locations')}}">Boiler Installation Locations</a></li>
							<li><a href="{{url('boiler/combi-boilers')}}">Combi Boiler </a></li>
							<li><a href="{{url('boiler/regular-boilers')}}">Regular Boiler </a></li>
							<li><a href="{{url('boiler/system-boilers')}}">System Boiler </a></li>

			          </ul>
			      </li>
			      <li>
			          <a href="https://www.warmzilla.co.uk/about-us">About Us</a>
			          <i class="fa fa-angle-down level2click"></i>
			          <!-- Level Two-->
			          <ul class="level2">
			              <li>
								<a href="https://warmzilla.co.uk/how-it-works">How it Works</a></li>
								<li><a href="https://warmzilla.co.uk/best-boiler-price-guarantee">Best Price Guarantee</a></li>
								<li><a href="https://warmzilla.co.uk/1-in-100-boilers-free">1 in 100 boilers free</a>
							</li>
			          </ul>
			      </li>
			      <li>
			      	<a href="https://www.warmzilla.co.uk/faqs">FAQs</a>
			      	<i class="fa fa-angle-down level3click"></i>
			      	<!-- Level Three-->
			          <ul class="level3">
							<li><a href="https://www.warmzilla.co.uk/faqs/installation">Boiler Installation</a></li>
							<li><a href="https://www.warmzilla.co.uk/faqs/whats-included">What's Included</a></li>
							<li><a href="https://www.warmzilla.co.uk/faqs/payment">Payment</a></li>
							<li><a href="https://www.warmzilla.co.uk/faqs/survey-questions">Survey Questions</a></li>
							<li><a href="https://www.warmzilla.co.uk/faqs/general">General</a></li>
							<li><a href="https://www.warmzilla.co.uk/faqs/landlord">Landlord</a>
							</li>
			          </ul>
			      </li>
			      <li>
			      	<a href="https://www.warmzilla.co.uk/blog">Blog</a>
			      	<i class="fa fa-angle-down level4click"></i>
			      	<!-- Level four-->
			          <ul class="level4">
							<li><a href="https://www.warmzilla.co.uk/blog/category/fuel-types">Fuel Types</a></li>
							<li><a href="https://www.warmzilla.co.uk/blog/category/guides">Boiler Guides</a></li>
							<li><a href="https://www.warmzilla.co.uk/blog/category/news">News</a></li>
							<li><a href="https://www.warmzilla.co.uk/blog/category/reviews">Reviews</a></li>
							<li><a href="https://www.warmzilla.co.uk/blog/category/saving-money">Saving Money</a></li>
							<li><a href="https://www.warmzilla.co.uk/blog/category/smart-technology">Smart Technology</a></li>
			          </ul>
			      </li>
			      <li><a href="https://www.warmzilla.co.uk/contact-us">Contact Us</a></li>
			      <div class="social-mobile">
			      	<a href="https://www.facebook.com/WarmZilla" target="_blank"><i class="fa fa-facebook"></i></a>
			      	<a href="https://twitter.com/WarmZilla/" target="_blank"><i class="fa fa-twitter"></i></a>
			      	<a href="https://www.instagram.com/WarmZilla/" target="_blank"><i class="fa fa-instagram"></i></a>
			      </div>
			  </ul>

			</nav>
			<!-- Menu For Mobile -->
			
		</div>
	</div><!-- logo + Main Nav -->

</header>
