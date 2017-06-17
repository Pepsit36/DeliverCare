<?php
	require_once 'include/header.php'
?>

<div class="row">
	<div class="col-sm-3">
		Pharmacies
	</div>
	<div class="col-md-8 col-md-offset-1">
		<div id="map"></div>
	</div>
</div>

    <script>

      // This example adds a marker to indicate the position of Bondi Beach in Sydney,
      // Australia.
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: {lat: -33, lng: 151}
        });

        var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
        var beachMarker = new google.maps.Marker({
          position: {lat: -33.890, lng: 151.274},
          map: map,
          icon: image
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCFwzQLkfiY7bk5RY3mF41VER5smY-NM8&callback=initMap">
    </script>
	
	
<?php
	require_once 'include/footer.php'
?>