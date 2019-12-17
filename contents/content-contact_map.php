<section id="section_contacto" class="section_high">
  <div class="row no-gutters contacto_and_map_wrap">
    <div class="col-md-6 col-lg-7 wow slideInLeft" style="background-image: url(<?php bloginfo("template_url") ?>/images/interna/image2.jpg) ">
      <div class="black_background"></div>
      <div class="loading_container" id="loading_contact_map">
        <div class="loading_spinner"></div>
      </div>
      <div class="contacto_container">
        <div class="contacto_title">
          <h3 class="text-center text-white text-light font-2"><?php echo strtoupper(mazal_get_acf_field("contacto_titulo_")) ?></h3>
        </div>
        <div class="contacto_form_container">
          <form id="contacto_form">
            <p class="text-white bold"><?php echo mazal_get_acf_field("contacto_descripcion_") ?></p>
            <ul class="datos">
              <li class="text-white"><i class="icon-phone text-white hover-white"></i><span><?php echo mazal_get_acf_field("contacto_telefono_") ?>:</span> <?php echo mazal_get_acf_field("telefono_valor_") ?></li>
              <li class="text-white"><i class="icon-envelope text-white hover-white"></i><span><?php echo mazal_get_acf_field("contacto_email_") ?></span>: <?php echo mazal_get_acf_field("email_valor_") ?></li>
              <li class="text-white"><i class="icon-location text-white hover-white"></i><span><?php echo mazal_get_acf_field("contacto_direccion_") ?>:</span> <?php echo mazal_get_acf_field("direccion_valor_") ?></li>
            </ul>
            <div class="field">
              <div id="contact_map_message" class="contact_map_message">
                <?php
                $mensajeError = "";
                $mensajeSuccess = "";
                if (mazal_is_language()) {
                  $mensajeSuccess = "Mensaje enviado correctamente. Nos pondremos en contacto lo más pronto posible.";
                  $mensajeError = "Debe completar todos los campos correctamente.";
                } else {
                  $mensajeError = "You must complete all fields correctly.";
                  $mensajeSuccess = "Message send successfully. We will get in touch as soon as possible.";
                }
                ?>
                <span class="contact_map_error"><?php echo $mensajeError ?></span>
                <span class="contact_map_success"><?php echo $mensajeSuccess ?></span>
              </div>
              <input id="contact_name" placeholder="<?php echo mazal_get_acf_field("contacto_campo_nombre_") ?>" type="text" class="text">
            </div>
            <style>
              .sprm_fld {
                position: absolute;
                opacity: 0;
                z-index: -99999;
                height: 0px;
                width: 0px;
                margin: 0px !important;
                padding: 0px !important;
              }
            </style>
            <div class="field">
              <input tabindex="-1" type="text" id="sprm_fld" placeholder="Omit if you are human" class="sprm_fld">
              <input tabindex="-1" type="text" id="sprm_fld2" placeholder="Omit if you are human" class="sprm_fld">

              <input id="contact_email" placeholder="<?php echo mazal_get_acf_field("contacto_campo_email_") ?>" type="email" class="text">
            </div>
            <div class="field">
              <input id="contact_phone" placeholder="<?php echo mazal_get_acf_field("contacto_campo_telefono_") ?>" type="number" class="text">
            </div>
            <div class="field">
              <input id="contact_city" placeholder="<?php echo mazal_get_acf_field("contacto_campo_ciudad_") ?>" type="text" class="text">
            </div>
            <div class="field">
              <textarea id="contact_message" placeholder="<?php echo mazal_get_acf_field("contacto_campo_mensaje_") ?>" cols="30" rows="4" class="text"></textarea>
            </div>
            <div class="field">
              <button class="button general_button text-white"><span data-title="<?php echo mazal_get_acf_field("contacto_boton_") ?>"><?php echo mazal_get_acf_field("contacto_boton_") ?></span></button>
            </div>
          </form>
          <ul class="contact_social">

            <?php mazal_get_socials() ?>

          </ul>
        </div>

      </div>
    </div>
    <div class="col-md-6 col-lg-5">
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
            draggable: false
          });

          var icon = {
            url: "https://mazal.co/wp-content/themes/mazal/images/icons/logo_min.svg", // url
            scaledSize: new google.maps.Size(30, 30), // scaled size
            origin: new google.maps.Point(0, 0), // origin
            anchor: new google.maps.Point(0, 0) // anchor
          };

          var markerFoot = new google.maps.Marker({
            position: uluruFoot,
            map: mapFoot,
            icon: icon
          });
        }
      </script>
      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvsMTc7o7m8nBMjvMvl_Y_A5y0B3pawmc&callback=initMap"></script>
    </div>
  </div>
</section>