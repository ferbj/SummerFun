var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;

function initialize(){
  directionsDisplay = new google.maps.DirectionsRenderer();
  var Yuyos = new google.maps.LatLng(-12.153916, -77.025337); //Punto Centro
  var mapOptions = {
    zoom: 12,
    center: Yuyos
  }
  
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var image = 'http://localhost/sf/imagenes/icon/no_beach.png';

  $.ajax({
    url: "http://localhost/sf/rest_no.php"
  }).done(function(data) {
      $.each(data.beaches, function(i, beach){
        var position = {lat: beach.lat, lng: beach.lng};
        var title = beach.nombre;
        var marker = new google.maps.Marker({
        map: map,
        position: position,
        title: title,
        icon: image
        });

        attachSecretMessage(marker, 
                          "<div><strong>"+ beach.nombre + "</strong></div>" +
                          "<hr><div>Temperatura: " + beach.temp + "</div>" +
                          "<div>Velocidad del Viento: " + beach.velviento + "</div>" +
                          "<div>Direccion del Viento: " + beach.dirvie + "</div>" +
                          "<div>Humedad: " + beach.hum + "</div>" +
                          "<div>Presion: " + beach.pres + "</div>");

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