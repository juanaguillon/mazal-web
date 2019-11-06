<section id="section_contacto" class="section_high">

  <div class="row no-gutters contacto_and_map_wrap">

    <div class="col-md-7 wow slideInLeft" style="background-image: url(<?php bloginfo("template_url") ?>/images/interna/image2.jpg) ">

      <div class="black_background"></div>

      <div class="contacto_container">

        <div class="contacto_title">

          <h3 class="text-center text-white text-light font-2"><?php echo strtoupper(mazal_get_acf_field("contacto_titulo_")) ?></h3>

        </div>

        <div class="contacto_form_container">

          <form id="contacto_form">

            <p class="text-white bold"><?php echo mazal_get_acf_field("contacto_descripcion_") ?></p>

            <ul class="datos">

              <li class="text-white"><i class="icon-phone text-white hover-white"></i><span><?php echo mazal_get_acf_field("contacto_telefono_") ?>:</span> (57)(1)602 6541</li>
              <li class="text-white"><i class="icon-envelope text-white hover-white"></i><span>Email:</span> sebastian.camacho@mazal.co</li>
              <li class="text-white"><i class="icon-location text-white hover-white"></i><span><?php echo mazal_get_acf_field("contacto_direccion_") ?>:</span> Calle 109 # 18b - 52 Local 102</li>

            </ul>

            <div class="field">

              <input placeholder="<?php echo mazal_get_acf_field("contacto_campo_nombre_") ?>" type="text" class="text">

            </div>

            <div class="field">

              <input placeholder="<?php echo mazal_get_acf_field("contacto_campo_email_") ?>" type="email" class="text">

            </div>

            <div class="field">

              <input placeholder="<?php echo mazal_get_acf_field("contacto_campo_telefono_") ?>" type="number" class="text">

            </div>

            <div class="field">

              <textarea placeholder="<?php echo mazal_get_acf_field("contacto_campo_mensaje_") ?>" cols="30" rows="7" class="text"></textarea>

            </div>

            <div class="field">

              <button class="button general_button text-white"><span data-title="<?php echo mazal_get_acf_field("contacto_boton_") ?>"><?php echo mazal_get_acf_field("contacto_boton_") ?></span></button>

            </div>

          </form>

          <ul class="contact_social">

            <li><a target="_blank" href="https://www.facebook.com/MAZAL-Arquitectura-Dise%C3%B1o-Interior-2072804912955149/"> <i class="text-white icon-facebook hover-white"></i></a></li>

            <li><a target="_blank" href="https://www.instagram.com/mazal_mobiliario_disenoint/?hl=es-la"> <i class="text-white icon-instagram hover-white"></i></a></li>

            <li><a target="_blank" href="https://www.houzz.com/pro/sebastian-camacho/mazal-diseno-interior-and-arquitectura"> <i class="text-white icon-houzz hover-white"></i></a></li>

            <li id="whatsapp_contact"><a id="whatsapp_contact"><a href="https://wa.me/573108613043?text=Hola, estoy interesad@ en los productos de mazal." target="_blank"> <i class="text-white icon-whatsapp hover-white"></i></a></li>

          </ul>

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
      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZ3yCG6_GLgMsCtkrHklPn9EwUhkGHOJM&callback=initMap"></script>

    </div>
  </div>
</section>