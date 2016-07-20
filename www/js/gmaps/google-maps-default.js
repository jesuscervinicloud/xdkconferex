var map;

function initialize() {
  var myLatlng = new google.maps.LatLng(20.6628299,-100.4405128);
  var mapOptions = {
    zoom: 16,
	scrollwheel: false,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  map = new google.maps.Map(document.getElementById('mapCanvas'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
	  animation: google.maps.Animation.DROP,
      title: 'Conferex'
  });
  
  var contentString = '<div class="info-window-content"><h2>Conferex</h2>'+
  					  '<h3>Hacia una mejor comunicacion</h3>'+
					  '<p>Aqui van las indicaciones para llegar</p></div>';
					  
  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });
  
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

$('a[data-type="gmap"]').on('shown.bs.tab', function (e) {
  initialize();
})