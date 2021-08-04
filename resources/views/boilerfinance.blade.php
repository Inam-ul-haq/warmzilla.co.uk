@extends('layouts.master')
@section('content')	
	<!--center area section -->
	<div class="site_wrap boiler-finacne">

		<div class="tsrtopsection">			
			<div class="wrapper">
				<div class="row align-items-center">
					<div class="leftimg col">
						
                        <?php  
                            $finance = getOption('finance_byingstep_img'); 
                               if($finance){
                                  $image = $finance->value;
                                //   echo $questionsHtml;
                               }
                        ?>						
						
						<img src="{{ (@$image)?asset('images/boilerfinance/'.$image):asset('images/01.jpg') }}" width="653" height="432" alt="finance" title="">
					</div>
					<div class="righttext">
                    <?php  
                       $questions = getOption('finance_firstcontainer'); 
                       if($questions){
                          $questionsHtml = $questions->value;
                          echo $questionsHtml;
                       }
                    ?>
					</div>
				</div>
			</div>
		</div><!-- page banner -->


		<div class="site_wrap tsr05">
			<div class="wrapper">
				<div class="row">
					<div class="full-width">
						<h3>Buying a <span>Boiler on Finance</span> with WarmZilla is easy</h3>
						<div class="cse">
							<ul>
								<li>
									<div class="item">
									    
									    <?php  
                                            $finance_byingstep_img1 = getOption('finance_byingstep_img1'); 
                                               if($finance_byingstep_img1){
                                                  $finance_byingstep_img1 = $finance_byingstep_img1->value;
                                               }
                                        ?>
										<img src="{{ (@$finance_byingstep_img1)?asset('images/boilerfinance/'.@$finance_byingstep_img1):asset('images/c1.png') }}" width="355" height="209" alt="finance_byingstep_img" title="">
										    <?php  
                                                $finance_byingstep_text1 = getOption('finance_byingstep_text1'); 
                                                   if($finance_byingstep_text1){
                                                      $finance_byingstep_text1 = $finance_byingstep_text1->value;
                                                      echo $finance_byingstep_text1;
                                                   }
                                            ?>		
									</div>
								</li>
								<li>
									<div class="item">
										<?php  
                                            $finance_byingstep_img2 = getOption('finance_byingstep_img2'); 
                                               if($finance_byingstep_img2){
                                                  $finance_byingstep_img2 = $finance_byingstep_img2->value;
                                               }
                                        ?>
										<img src="{{ (@$finance_byingstep_img2)?asset('images/boilerfinance/'.@$finance_byingstep_img2):asset('images/c1.png') }}" width="355" height="209" alt="finance_byingstep_img" title="">
										 <?php  
                                                $finance_byingstep_text2 = getOption('finance_byingstep_text2'); 
                                                   if($finance_byingstep_text2){
                                                      $finance_byingstep_text2 = $finance_byingstep_text2->value;
                                                      echo $finance_byingstep_text2;
                                                   }
                                            ?>		
									</div>
								</li>
								<li>
									<div class="item">
										<?php  
                                            $finance_byingstep_img3 = getOption('finance_byingstep_img3'); 
                                               if($finance_byingstep_img3){
                                                  $finance_byingstep_img3 = $finance_byingstep_img3->value;
                                               }
                                        ?>
										<img src="{{ (@$finance_byingstep_img3)?asset('images/boilerfinance/'.@$finance_byingstep_img3):asset('images/c1.png') }}" width="355" height="209" alt="finance_byingstep_img" title="">
										 <?php  
                                            $finance_byingstep_text3 = getOption('finance_byingstep_text3'); 
                                               if($finance_byingstep_text3){
                                                  $finance_byingstep_text3 = $finance_byingstep_text3->value;
                                                  echo $finance_byingstep_text3;
                                               }
                                            ?>		
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!-- buying a boiler -->

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
							<img src="{{asset('images/t1.png')}}" width="148" height="156" alt="boiler finance" title="">
						</div>
						<div class="content">
							<div id="article-boilerfinance">
                            <?php  
                              $questions = getOption('finance_questions'); 
                              if($questions){
                                  $questionsHtml = $questions->value;
                                  echo $questionsHtml;
                              }
                            ?>								
								<!--<h3>Why buy a boiler using <span>boiler finance</span>?</h3>-->
								<!--<p>There are a lot of factors involved in choosing the right boiler for your home. For some it may be finding the cheapest boiler, for others it may be making sure you get the best looking boiler or the best performing boiler.-->
								<!--<br>-->
								<!--<br>-->
								<!--Whatever you’re looking for the WarmZilla <a href="#">Boiler Comparison</a> Tool can make the process of finding a new boiler much easier. You can also take the <a href="#">WarmZilla Survey</a> and get a fixed price boiler quote online in 90 seconds, without giving any personal details.</p>-->

								<!--<h3><span>Boiler finance </span>package examples</h3>-->
								<!--<p>The WarmZilla boiler comparison tool allows you to compare up to 3 boilers key stats against each other to see which new boiler would best suit your requirements.-->
								<!--<br>-->
								<!--<br>-->
								<!--If you want to see boiler prices please take the WarmZilla survey and we’ll give you a boiler quote on a range of boilers suited to your home. </p>-->
								<!--<h3>How much will my <span>monthly repayments </span>be?</h3>-->
								<!--<p>The WarmZilla boiler comparison tool allows you to compare up to 3 boilers key stats against each other to see which new boiler would best suit your requirements.-->
								<!--	<br>-->
								<!--	<br>-->
								<!--If you want to see boiler prices please take the WarmZilla survey and we’ll give you a boiler quote on a range of boilers suited to your home. </p>-->
								<!--<h3>How much <span>boiler deposit</span> do I need to pay?</h3>-->
								<!--<p>The WarmZilla boiler comparison tool allows you to compare up to 3 boilers key stats against each other to see which new boiler would best suit your requirements.-->
								<!--<br>-->
								<!--<br>-->
								<!--If you want to see boiler prices please take the WarmZilla survey and we’ll give you a boiler quote on a range of boilers suited to your home. </p>-->
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div><!-- boiler finacne content -->

		<div class="getyourcode">
			<div class="wrapper">
				<div class="getcode-cntnt">
					<p>Get an instant fixed price quote on your new boiler in 90 seconds</p>
					<a href="https://www.warmzilla.co.uk/find-a-boiler">Get Your Quote</a>
				</div>
			</div>
		</div><!-- get your quote -->
		<?php //exit('ff');?>
		<div class="bestprice">
			<div class="wrapper">
				<div class="bp-contnt">
					<img class="bpc-lftimg" src="{{asset('images/best-price-img.png')}}" width="115" height="205" alt="best-price-img" title="">
					<div class="bpc-descrp">
						@php  
                            $guaranteed_slot = getOption('guaranteed_slot'); 
                               if($guaranteed_slot){
                                  $guaranteed_slot = $guaranteed_slot->value;
                                  echo $guaranteed_slot;
                               }
                        @endphp	
						<!--<h3>Best Price, Guaranteed</h3>-->
						<!--<p>-->
						<!--	We guarantee to offer the best price on your new boiler. If you find a better price elsewhere, we’ll take £50 off the price of your boiler.-->
						<!--</p>-->
						<a href="#" class="primry-btn">Learn more</a>
					</div>
					<img class="bpc-rgtimg" src="{{asset('images/best-price-ico.png')}}" width="115" height="194" alt="best-price-img" title="">
					<img class="bbc-chair" src="{{asset('images/best-price-image-chair.png')}}" width="440" height="231" alt="best-price-img" title="">
				</div>
			</div>
		</div><!-- Best Price -->

		<div class="faqs-wrap">
			<div class="wrapper">
				<div class="head-para">
					<h2><span>FAQ’s</span></h2>
					<p>Below, we’ve listed some of the most common questions we get asked about WarmZilla</p>
				</div>

				<div id="accordion" class="accordion-container">
					<article class="content-entry">
						<h4 class="article-title"><i></i>How does boiler finance work?</h4>
						<div class="accordion-content">
							<p>Our boiler finance option is simple. When selecting your boiler, you’ll see a 'view finance options' button. Our super-easy to use finance calculator will show you a few different options and you can increase or decrease the payments over time to suit you. 
<br>
<br>
When you go through the checkout process you will be redirected by our finance provider - Vendigo, where you will fill out an application form to apply for finance on your new boiler. The acceptance rate is high, so even if you have bad credit you could still be approved for finance.
<br>
<br>
You can read more about our <a href="https://www.warmzilla.co.uk/blog/buying-a-new-boiler-on-finance" target="_blank">boiler finance</a> options in our blog post.</p>
						</div>
						<!--/.accordion-content-->
					</article>
					<article class="content-entry">
						<h4 class="article-title"><i></i>Can I pay off the finance balance early?</h4>
						<div class="accordion-content">
							<p>Yes. You’ll need to contact Vendigo (our finance provider) for this and they will provide you with a settlement figure.</p>
						</div>
						<!--/.accordion-content-->
					</article>
					<article class="content-entry">
						<h4 class="article-title"><i></i>Do I need to pay a deposit for finance?</h4>
						<div class="accordion-content">
							<p>No, the deposit is optional. You can put anything from 0 - 50% of the total amount for a deposit on your new boiler.</p>
						</div>
						<!--/.accordion-content-->
					</article>
				</div>
			</div>
		</div><!-- Faqs -->
			
	</div>	
	<!--center area section -->	
		
@endsection
