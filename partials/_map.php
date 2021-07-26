<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript">
	x = navigator.geolocation;
	x.getCurrentPosition(success, failure);

	function success(position)
	{
		var mylat = position.coords.latitude;
		var mylong = position.coords.longitude;
			/*$('#lat').html(mylat);
			$('#long').html(mylong);*/

			// Google-API ready lat and long string
			var coords = new google.maps.LatLng(mylat, mylong);

			// Setting up google map
			var mapOptions = {
				zoom: 16,
				center: coords,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			}

			// Create the map
			var map = new google.maps.Map(document.getElementById("map"), mapOptions);

			//create maker
			var maker = new google.maps.Marker({map: map, position: coords});
		}

		function failure()
		{
			$('#lat').html("<p>Map failed!</p>");			
		}
	</script>

	<?php  

	$map = "
		<div id='map'>

		</div>	
	"

	?>
