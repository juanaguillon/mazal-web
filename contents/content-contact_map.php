<section id="section_contacto" class="section_high">
  <div class="row no-gutters h-100vh contacto_and_map_wrap">
    <div class="col-md-7 wow slideInLeft" style="background-image: url(<?php bloginfo("template_url") ?>/images/interna/image2.jpg) ">
      <div class="black_background"></div>
      <div class="contacto_container">
        <div class="contacto_title">
          <h3 class="text-center text-white text-light font-2">CONTACTO</h3>
        </div>
        <div class="contacto_form_container">
          <form id="contacto_form">
            <div class="field">
              <input placeholder="Nombre" type="text" class="text">
            </div>
            <div class="field">
              <input placeholder="Email" type="email" class="text">
            </div>
            <div class="field">
              <input placeholder="Teléfono" type="number" class="text">
            </div>
            <div class="field">
              <textarea placeholder="Mensaje" cols="30" rows="7" class="text"></textarea>
            </div>
            <div class="field">
              <button class="button general_button text-white"><span data-title="Enviar">Enviar</span></button>
            </div>
          </form>
        </div>

      </div>
    </div>
    <div class="col-md-5">
      <div class="map h-100" id="mapFoot"></div>

      <script>
        function initMap() {

          var uluruFoot = {

            lat: 4.6856936,

            lng: -74.0569894

          };

          var color1 = [{
              "elementType": "geometry",
              "stylers": [{
                "color": "#242f3e"
              }]
            },
            {
              "elementType": "labels.text.fill",
              "stylers": [{
                "color": "#746855"
              }]
            },
            {
              "elementType": "labels.text.stroke",
              "stylers": [{
                "color": "#242f3e"
              }]
            },
            {
              "featureType": "administrative.locality",
              "elementType": "labels.text.fill",
              "stylers": [{
                "color": "#d59563"
              }]
            },
            {
              "featureType": "poi",
              "elementType": "labels.text.fill",
              "stylers": [{
                "color": "#d59563"
              }]
            },
            {
              "featureType": "poi.park",
              "elementType": "geometry",
              "stylers": [{
                "color": "#263c3f"
              }]
            },
            {
              "featureType": "poi.park",
              "elementType": "labels.text.fill",
              "stylers": [{
                "color": "#6b9a76"
              }]
            },
            {
              "featureType": "road",
              "elementType": "geometry",
              "stylers": [{
                "color": "#38414e"
              }]
            },
            {
              "featureType": "road",
              "elementType": "geometry.stroke",
              "stylers": [{
                "color": "#212a37"
              }]
            },
            {
              "featureType": "road",
              "elementType": "labels.text.fill",
              "stylers": [{
                "color": "#9ca5b3"
              }]
            },
            {
              "featureType": "road.highway",
              "elementType": "geometry",
              "stylers": [{
                "color": "#746855"
              }]
            },
            {
              "featureType": "road.highway",
              "elementType": "geometry.stroke",
              "stylers": [{
                "color": "#1f2835"
              }]
            },
            {
              "featureType": "road.highway",
              "elementType": "labels.text.fill",
              "stylers": [{
                "color": "#f3d19c"
              }]
            },
            {
              "featureType": "transit",
              "elementType": "geometry",
              "stylers": [{
                "color": "#2f3948"
              }]
            },
            {
              "featureType": "transit.station",
              "elementType": "labels.text.fill",
              "stylers": [{
                "color": "#d59563"
              }]
            },
            {
              "featureType": "water",
              "elementType": "geometry",
              "stylers": [{
                "color": "#17263c"
              }]
            },
            {
              "featureType": "water",
              "elementType": "labels.text.fill",
              "stylers": [{
                "color": "#515c6d"
              }]
            },
            {
              "featureType": "water",
              "elementType": "labels.text.stroke",
              "stylers": [{
                "color": "#17263c"
              }]
            }
          ];

          var mapFoot = new google.maps.Map(document.getElementById('mapFoot'), {
            zoom: 17,
            disableDefaultUI: true,
            gestureHandling: 'greedy',
            scrollwheel: false,
            center: uluruFoot,
            styles: color1,
            draggable: true

          });

          var markerFoot = new google.maps.Marker({
            position: uluruFoot,
            map: mapFoot,
          });
        }
      </script>

      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDL38SPiX3ET5uymp-IWbCS2eDio-O_a8A&callback=initMap"></script>


    </div>
  </div>
</section>