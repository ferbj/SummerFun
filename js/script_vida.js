var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;

function initialize(){
  directionsDisplay = new google.maps.DirectionsRenderer();
  var Pimentel = new google.maps.LatLng(-6.8385667, -79.9376798); //Punto Centro
  var mapOptions = {
    zoom: 12,
    center: Pimentel
  }
  
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  let url = location.origin
  var image = url + '/imagenes/icon/vida.png';

  $.ajax({
    url: url +"/rest_vida.php"
  }).done(function(data) {
      $.each(data.vidas, function(i, vida){
        var position = {lat: vida.lat, lng: vida.lng};
        var title = vida.nombre;
        var marker = new google.maps.Marker({
        map: map,
        position: position,
        title: title,
        icon: image
        });

        attachSecretMessage(marker, 
                          "<div><strong>"+ vida.nombre + "</strong></div>");
        });
    
  });


 // directionsDisplay.setMap(map);
  
}


function attachSecretMessage(marker, secretMessage) {
  var infowindow = new google.maps.InfoWindow({
    content: secretMessage
  });

  marker.addListener('click', function() {
    infowindow.open(marker.get('map'), marker);
  });
}


google.maps.event.addDomListener(window, 'load', initialize);