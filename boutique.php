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
        
        var map;
        var options = {
          enableHighAccuracy: true,
          timeout: 5000,
          maximumAge: 0
        };

        function success(pos) {
          var crd = pos.coords;

          console.log('Votre position actuelle est :');
          console.log(`Latitude : ${crd.latitude}`);
          console.log(`Longitude: ${crd.longitude}`);
          console.log(`Plus ou moins ${crd.accuracy} mètres.`);
            
            var center = new google.maps.LatLng(crd.latitude, crd.longitude); 
            map.panTo(center);
            
             var cityCircle = new google.maps.Circle({
              strokeColor: '#FF0000',
              strokeOpacity: 0.8,
              strokeWeight: 2,
              fillColor: '#FF0000',
              fillOpacity: 0.35,
              map: map,
              center: center,
              radius: crd.accuracy
            });
            
           infowindow = new google.maps.InfoWindow();
            var service = new google.maps.places.PlacesService(map);
            service.nearbySearch({
              location: center,
              radius: 500,
              type: ['pharmacy']
            }, callback);
        }
        
        function callback(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
          for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
          }
        }
      }

      function createMarker(place) {
        var placeLoc = place.geometry.location;
        var marker = new google.maps.Marker({
          map: map,
          position: place.geometry.location
        });

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.setContent(place.name);
          infowindow.open(map, this);
        });
      }
        
        function error(err) {
          alert(`ERROR(${err.code}): ${err.message}`);
        }

      // This example adds a marker to indicate the position of Bondi Beach in Sydney,
      // Australia.
      function initMap() {
         
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,  
          center: {lat: 48.8665157, lng: 2.3340766}
        });

        var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
        var beachMarker = new google.maps.Marker({
          position: {lat: 48.8665157, lng: 2.3340766},
          map: map,
          icon: image
        });
          
        navigator.geolocation.getCurrentPosition(success, error, options);
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCFwzQLkfiY7bk5RY3mF41VER5smY-NM8&libraries=places&callback=initMap">
    </script>
	
	
<?php
	require_once 'include/footer.php'
?>