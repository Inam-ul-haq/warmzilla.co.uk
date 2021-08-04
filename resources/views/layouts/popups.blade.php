
<script>
    
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
    		if(data == true){
    		//	alert('Added to campare');
    			location.reload();
    		}
    		if(data == 'limitout'){
    			alert('Only three Boilers can be added');
    		}
    	}
    }); 
}  
</script>

