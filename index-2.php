<script src="jquery.min.js"></script>

<script>
$(document).ready(function(){

	$('#btn').click(function(){
	$('#output').html('');
	  var url = $('[name="url"]').val();
	  if( url !== ""){
		$('#status').show();			
		$.ajax({
		    url : 'checkUrl.php',
		    type : 'GET',
		    data : {
		        'url' : url
		    },
			statusCode: {
				404: function() {
					//console.log("file to validate the url is not found");
					$('#status').hide();
					$('#output').html("file to validate the url is not found");					
				}
			},
		    //dataType:'json',
		    success : function(data) {          
		        //console.log(data);
		        $('#status').hide();
		        $('#output').html(data);  
		    },
		    error : function(request,error)
		    {
				console.log(error);
				$('#status').hide();
				$('#output').html("page not found");				
		    }
		});
	  }else{
	  	$('#output').html('Can not check empty url.');
	  }

	});

});
</script>


<p>**Please include https:// or http:// along with the url(example:www.abc.com, abc.com).</p>
<input type="text" name="url"> <button id="btn">Check</button>

<div>
	<img src="spinner.svg" height="30px"  id="status" style="display: none"/>
	<p id="output"></p>
</div>

