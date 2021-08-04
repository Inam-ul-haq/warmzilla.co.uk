<!-- 
<div class="trustpilet-wrap">
	<div class="owl-carousel owl-theme" id="trustpoilet">
		<div class="item">
			<a href="https://uk.trustpilot.com/reviews/5dcecd83c845450918c15e6c" target="_blank" class="trustbox">
				<h3>Donna Hood</h3>
				<img src="{{asset('images/trustpilot-5-stars.jpg')}}" width="148" height="28" alt="5 stars" class="stars">
				<div class="content">
					<span>From start to finish the service was first class.</span>
				</div>
			</a>
		</div>
	</div>
	<div class="tpwrap-exclnt">
		<a href="https://uk.trustpilot.com/review/warmzilla.co.uk" target="_blank">
		    <img src="{{asset('images/trustpilot-excellent-stars.png')}}" width="340" height="26" alt="" title="" class="excelent-desktp">
			<img src="{{asset('images/trustpilot-logo-mobile.png')}}" width="280" height="31" alt="5 stars" class="excelent-mobile">
		</a>
		<p><strong>4.8</strong> out of <strong>5</strong> average score</p>
	</div>
</div> -->
<div class="trustpilet-wrap">
	<div class="owl-carousel owl-theme" id="trustpoilet">
		<div class="item">
			<a href="https://uk.trustpilot.com/reviews/5f36e3a79cc22a073c97f0ed" target="_blank" class="trustbox">
				<h3>Mrs B.</h3>
				<img src="{{asset('images/trustpilot-5-stars.jpg')}}" width="148" height="28" alt="5 stars" class="stars">
				<div class="content">
					<span>Massive saving compared to a well-known Gas company.</span>
				</div>
			</a>
		</div>
		<div class="item">
			<a href="https://uk.trustpilot.com/reviews/5f36f2929cc22a073c97f9a5" target="_blank" class="trustbox">
				<h3>Lisa Jenkinson</h3>
				<img src="{{asset('images/trustpilot-5-stars.jpg')}}" width="148" height="28" alt="5 stars" class="stars">
				<div class="content">
					<span>Sanitized where they worked including door handles.</span>
				</div>
			</a>
		</div>
		<div class="item">
			<a href="https://uk.trustpilot.com/reviews/5e2605b93c93ae04c0cfc819" target="_blank" class="trustbox">
				<h3>Mrs Li</h3>
				<img src="{{asset('images/trustpilot-5-stars.jpg')}}" width="148" height="28" alt="5 stars" class="stars">
				<div class="content">
					<span>Better spec and £1000 cheaper than British Gas.</span>
				</div>
			</a>
		</div>
		<div class="item">
			<a href="https://uk.trustpilot.com/reviews/5dcecd83c845450918c15e6c" target="_blank" class="trustbox">
				<h3>Donna Hood</h3>
				<img src="{{asset('images/trustpilot-5-stars.jpg')}}" width="148" height="28" alt="5 stars" class="stars">
				<div class="content">
					<span>From start to finish the service was first class.</span>
				</div>
			</a>
		</div>
		<div class="item">
			<a href="https://uk.trustpilot.com/reviews/5de926e6c845450894e82a16" target="_blank" class="trustbox">
				<h3>Mr. Knevett</h3>
				<img src="{{asset('images/trustpilot-5-stars.jpg')}}" width="148" height="28" alt="5 stars" class="stars">
				<div class="content">
					<span>You will not be able to find better than Warmzilla</span>
				</div>
			</a>
		</div>
		<div class="item">
			<a href="https://uk.trustpilot.com/reviews/5f2001f21a5a6907a47501a2" target="_blank" class="trustbox">
				<h3>Matthew Howard</h3>
				<img src="{{asset('images/trustpilot-5-stars.jpg')}}" width="148" height="28" alt="5 stars" class="stars">
				<div class="content">
					<span>Vastly lower price than other quotes we had.</span>
				</div>
			</a>
		</div>
		<div class="item">
			<a href="https://uk.trustpilot.com/reviews/5f21d7301a5a690a041b40f3" target="_blank" class="trustbox">
				<h3>A. Khetarpal</h3>
				<img src="{{asset('images/trustpilot-5-stars.jpg')}}" width="148" height="28" alt="5 stars" class="stars">
				<div class="content">
					<span>Simple & amazing value way to get a new Boiler</span>
				</div>
			</a>
		</div>
		<div class="item">
			<a href="https://uk.trustpilot.com/reviews/5f249a401a5a6907a4780ad1" target="_blank" class="trustbox">
				<h3>Paul Mason</h3>
				<img src="{{asset('images/trustpilot-5-stars.jpg')}}" width="148" height="28" alt="5 stars" class="stars">
				<div class="content">
					<span>Really impressed by the competitive quote.</span>
				</div>
			</a>
		</div>
		<div class="item">
			<a href="https://uk.trustpilot.com/reviews/5f2b00151a5a690a042077d7" target="_blank" class="trustbox">
				<h3>Mr. Flanagan</h3>
				<img src="{{asset('images/trustpilot-5-stars.jpg')}}" width="148" height="28" alt="5 stars" class="stars">
				<div class="content">
					<span>Could not be happier that I used this company!!!</span>
				</div>
			</a>
		</div>
	</div>
	<div class="tpwrap-exclnt">
		<a href="https://uk.trustpilot.com/review/warmzilla.co.uk" target="_blank">
			<img src="{{asset('images/trustpilot-excellent-stars.png')}}" width="340" height="26" alt="" title="" class="excelent-desktp">
			<img src="{{asset('images/trustpilot-logo-mobile.png')}}" width="280" height="31" alt="5 stars" class="excelent-mobile">
		</a>
		<p><strong>4.8</strong> out of <strong>5</strong> average score</p>
	</div>
</div>



<div id = "sessionItems">
    
</div>

<script>
$(document).ready(function(){
  
  var fa= '<?php echo getSessionBoilers2() ?>';
  if(fa != 'empty'){
    $('#sessionItems').html(fa);    
  }
});    


function showSessionItems2(){
    var fa= '<?php echo getSessionBoilers2() ?>';
        if(fa != 'empty'){
            $('#sessionItems').empty();    
            $('#sessionItems').html(fa);    
        }
        else{
            $('#sessionItems').empty();    
        }
}

function deleteSessionItems(slug){
// alert(slug);
// var slug = JSON.parse(slug);
// alert(slug);
    $.ajax({
    	type: 'POST',
    	url : "{{route('deleteSessionItems')}}",
    	data:{
    		_token: '{{ csrf_token() }}',
    		slug: slug,
    	},
    	success: function (data) {
    	   // alert(data);
    		if(data == true){
    		    location.reload();
    		    showSessionItems2();
    		}
    	}
    });
	// addtocompare

}    
</script>

<div class="partnrs-wrap">
	<div class="pw-inr">
		<span>Secure & Reliable.</span>
		<div class="prtnr-row">
			<di id="partners" class="owl-carousel owl-theme">
				<div class="item">
					<img src="{{asset('images/partner/adey-logo-white.svg')}}" width="130" height="127" alt="partner" title="">
				</div>
				<div class="item">
					<img src="{{asset('images/partner/fca-logo-white.svg')}}" width="130" height="127" alt="partner" title="">
				</div>
				<div class="item">
					<img src="{{asset('images/partner/google-logo-white.svg')}}" width="130" height="127" alt="partner" title="">
				</div>
				<div class="item">
					<img src="{{asset('images/partner/hive-logo-white.svg')}}" width="130" height="127" alt="partner" title="">
				</div>
				<div class="item">
					<img src="{{asset('images/partner/ico-logo-white.svg')}}" width="130" height="127" alt="partner" title="">
				</div>
				<div class="item">
					<img src="{{asset('images/partner/nest-logo-white.svg')}}" width="130" height="127" alt="partner" title="">
				</div>
				<div class="item">
					<img src="{{asset('images/partner/stripe-white-logo.svg')}}" width="130" height="127" alt="partner" title="">
				</div>
				<div class="item">
					<img src="{{asset('images/partner/trustpilot-logo-white.svg')}}" width="130" height="127" alt="partner" title="">
				</div>
				<div class="item">
					<img src="{{asset('images/partner/vaillant-logo-white.svg')}}" width="130" height="127" alt="partner" title="">
				</div>
				<div class="item">
					<img src="{{asset('images/partner/vendigo-logo-white.svg')}}" width="130" height="127" alt="partner" title="">
				</div>
				<div class="item">
					<img src="{{asset('images/partner/worcester-logo-white.svg')}}" width="130" height="127" alt="partner" title="">
				</div>
			</div>	
		</div>
	</div>
</div><!-- partners wrap -->
<footer class="footer">
	<div class="wrapper">
		<div class="fotr-widget">
			<h2>Help & Support</h2>
			<ul class="fotr-menu">
				<li><a href="https://warmzilla.co.uk/how-it-works">How it Works</a></li>
				<li><a href="https://www.warmzilla.co.uk/faqs">FAQs</a></li>
				<li><a href="https://www.warmzilla.co.uk/become-an-installer">Become an Installer</a></li>
				<li><a href="https://www.warmzilla.co.uk/blog">Blog</a></li>
			</ul>
		</div>
		<div class="fotr-widget followus">
			<h2>Follow Us</h2>
			<form method="post" action="">
				<div class="newsltr">
					<label>Sign Up For Our Newsletter</label>
					<div class="newsltr-group">
						<input type="text" name="" value="" placeholder="Email Address" required>
						<button type="submit" name="" value="">Subscribe</button>
					</div>	
				</div>
			</form>
			<ul class="ftr-social">
				<li><a href="https://www.facebook.com/WarmZilla" target="_blank"><i class="fa fa-facebook"></i></a></li>
				<li><a href="https://twitter.com/WarmZilla/" target="_blank"><i class="fa fa-twitter"></i></a></li>
				<li><a href="https://www.instagram.com/WarmZilla/" target="_blank"><i class="fa fa-instagram"></i></a></li>
			</ul>
		</div>
		<div class="fotr-widget contactus">
			<h2>Contact Us</h2>
			<div class="contctbox">
				<img src="{{asset('images/add-marker.svg')}}" width="20" height="25" alt="" title="">
				<p>
					<a href="https://www.warmzilla.co.uk/">WarmZilla Limited</a>
					<br>
					3rd Floor Capital Tower,
					<br>
					Greyfriars Road, Cardiff, 
					<br>
					CF10 3AG
				</p>
			</div>
			<div class="contctbox">
				<img src="{{asset('images/call.svg')}}" width="20" height="25" alt="" title="">
				<p>
					<a href="tel:03335779090">0333 577 9090</a>
				</p>
			</div>
			<div class="contctbox">
				<img src="{{asset('images/mail.svg')}}" width="20" height="25" alt="" title="">
				<p>
					<a href="mailto:ask@warmzilla.co.uk">ask@warmzilla.co.uk</a>
				</p>
			</div>
		</div>
		<div class="mfotr-authoriz">
			<p>Registered in England & Wales Company No. 09301554</p>
			<p>WarmZilla Limited are Authorised and regulated by the Financial Conduct Authority FRN 815093 for credit broking.</p>
		</div>
	</div>
	<div class="ftr-copyright">
		<div class="wrapper">
			<p>© 2021 WarmZilla. All rights reserved.</p>
			<ul class="cright-menu">
				<li><a href="https://www.warmzilla.co.uk/terms-conditions">Terms & Conditions</a></li>
				<li><a href="https://www.warmzilla.co.uk/privacy-policy">Privacy Policy</a></li>
				<li><a href="https://www.warmzilla.co.uk/cookie-policy">Cookie Policy</a></li>
			</ul>
		</div>
	</div>
</footer>
