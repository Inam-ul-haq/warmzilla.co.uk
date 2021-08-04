
<!-- KW POP UP -->
<!--<div class="kwpop" style="display: none;" id="viewkwpopup">-->
	<!--<form method="post" action="">-->
<!--		<div class="kwpop-top">-->
<!--			<h2>Which kW boiler do you want to add?</h2>-->
<!--			<div class="systmboilers">-->
<!--				<div class="sb-wrap">-->
<!--					<div class="filters-wrap">-->
<!--						<div class="filtrbox">-->
<!--							<span class="fbox-title">Kw Output</span>-->
							
<!--							<input class="styled-checkbox" id="viewkwpop-cbox1" name= 'kwoutput' type="radio" value="{{ url('boiler-brands/Worcester-Boilers-kWkNck/on/Worcester-Bosch-GB162-65kW-System-Gas-Boiler-PDREQd') }}"  >-->
<!--							<label for="viewkwpop-cbox1">25W</label>-->
							<!--<input class="styled-checkbox" id="kwpop-cbox2" name= 'kwoutput' type="radio" value="330"  >-->
							<!--<label for="kwpop-cbox2">21 - 30kW</label>-->
							<!--<input class="styled-checkbox" id="kwpop-cbox3" type="checkbox" value="value3">-->
							<!--<label for="kwpop-cbox3">30+ kW</label>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
			<!--</div>-->
<!-- filters -->
<!--		</div>-->
<!--		<div class="kwpop-botm">-->
<!--			<button class="btnform" type="button" name="" onclick = "goToBoilerr(this)">Apply</button>-->
<!--		</div>-->
<!-- Bottom button -->
	<!--</form>		-->
<!--</div>-->
<script>
    
    function goToBoilerr(e){
        
        var val= $("input[type='radio'][name='kwoutput']:checked").val();
        // window.location(val);
        window.location.href = val;
    }
    
// function compare(e){
// $.ajax({
// 	type: 'POST',
// 	url : "{{route('addtocompare')}}",
// 	data:{
// 		_token: '{{ csrf_token() }}',
// 		boiler_id: e,
// 	},
// 	success: function (data) {
// 		if(data == true){
// 		  //  showSessionItemsIn();
// 			alert('Added to campare');
// 			location.reload();
// 		}
// 		if(data == 'limitout'){
// 			alert('limitout');
// 		}
// 	}
// });    
    
// }  
</script>


<!-- KW POP UP -->
<!-- Compare Boiler Menu -->
<!--<div class="comp-bmenu">-->
<!--	<div class="comp-bmenuwrap">-->
<!--		<div class="cbm-box">-->
<!--			<span class="cbmbox-close"></span>-->
<!--			<p>Worcester Bosch Life 8000 - 30kW</p>-->
<!--		</div>-->
<!--		<div class="cbm-box">-->
<!--			<span class="cbmbox-close"></span>-->
<!--			<p>Worcester Bosch Life 8000 - 30kW</p>-->
<!--		</div>-->
<!--		<div class="cmbox-addmore">-->
<!--			<a href="#">+ Add another boiler</a>-->
<!--		</div>-->
<!--		<div class="cmbox-addmore cmbox-comparebtn">-->
<!--			<a href="#">+ Compare boilers</a>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->
<!-- Compare Boiler Menu -->
<!-- Compare Boiler Menu For Mobile -->
<!--<div class="comp-bmenu-mobile">-->
<!--	<button type="button">Clear <span>(3)</span></button>-->
<!--	<button type="button">+ Compare</span></button>-->
<!--</div>-->
<!-- Compare Boiler Menu For Mobile -->