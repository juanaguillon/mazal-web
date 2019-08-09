<section id="section_banner_intern" class="section_high">
  <div id="section_banner_carousel">
    <div class="banner_item">
      <div class="banner_image">

        <!-- <img src="<?php bloginfo("template_url") ?>/images/interna/image15.jpg" alt=""> -->
        <video loop autoplay muted poster="<?php bloginfo("template_url") ?>/videos/mazal_video_cover.jpg">
          <source src="<?php bloginfo("template_url") ?>/videos/mazal.mp4" type="video/mp4">
          <source src="<?php bloginfo("template_url") ?>/videos/mazal.ogv" type="video/ogg">
          <source src="<?php bloginfo("template_url") ?>/videos/mazal.webm" type="video/webm">
        </video>
      </div>
      <div class="banner_caption">
        <h3 class="text-yellow font-2">Segundo Item</h3>
        <p class="text-white font-2">Lorem ipsum dolor sit amet consectetur <br>adipisicing elit. Commodi, nam!</p>
        <button class="button general_button mt-3 ml-0">
          <span data-title="Ver más">Ver Más</span>
        </button>
      </div>
    </div>
    <div class="banner_item">
      <div class="banner_image">

        <img src="<?php bloginfo("template_url") ?>/images/interna/image14.jpg" alt="">
      </div>
      <div class="banner_caption">
        <h3 class="text-yellow font-2">Primer Item</h3>
        <p class="text-white font-2">Lorem ipsum dolor sit amet consectetur <br>adipisicing elit. Commodi, nam!</p>
        <button class="button general_button mt-3 ml-0">
          <span data-title="Ver más">Ver Más</span>
        </button>
      </div>
    </div>

  </div>
  <div class="banner_navigation_buttons">
    <button class="button" id="banner_nav_prev"><i class="icon-arrow_left"></i></button>
    <button class="button" id="banner_nav_next"><i class="icon-arrow_right"></i></button>
  </div>

</section>


<section id="section_galeria" class="section_high">
  <div class="container">
    <div class="row">
      <div class="col-md-6 wow slideInLeft" data-wow-offset="20">
        <div class="galeria_container">
          <div class="galeria_principal_image">
            <a class="gallery_light" href="<?php bloginfo("template_url") ?>/images/interna/image6.jpg">
              <img class="img_fill" src="<?php bloginfo("template_url") ?>/images/interna/image6.jpg" alt="">
            </a>
          </div>
          <div class="galeria_photos">
            <div class="galeria_photo_wrap left_to_right_container">
              <a class="gallery_light" href="<?php bloginfo("template_url") ?>/images/interna/image3.jpg">
                <img class="img_fill left" src="<?php bloginfo("template_url") ?>/images/interna/image3.jpg" alt="">
                <img class="img_fill right" src="<?php bloginfo("template_url") ?>/images/interna/image3.jpg" alt="">
              </a>
            </div>
            <div class="galeria_photo_wrap left_to_right_container">
              <a class="gallery_light" href="<?php bloginfo("template_url") ?>/images/interna/image4.jpg">
                <img class="img_fill left" src="<?php bloginfo("template_url") ?>/images/interna/image4.jpg" alt="">
                <img class="img_fill right" src="<?php bloginfo("template_url") ?>/images/interna/image4.jpg" alt="">
              </a>
            </div>
            <div class="galeria_photo_wrap left_to_right_container">
              <a class="gallery_light" href="<?php bloginfo("template_url") ?>/images/interna/image5.jpg">
                <img class="img_fill left" src="<?php bloginfo("template_url") ?>/images/interna/image5.jpg" alt="">
                <img class="img_fill right" src="<?php bloginfo("template_url") ?>/images/interna/image5.jpg" alt="">
              </a>
            </div>
            <div class="galeria_photo_wrap left_to_right_container">
              <a class="gallery_light" href="<?php bloginfo("template_url") ?>/images/interna/image9.jpg">
                <img class="img_fill left" src="<?php bloginfo("template_url") ?>/images/interna/image9.jpg" alt="">
                <img class="img_fill right" src="<?php bloginfo("template_url") ?>/images/interna/image9.jpg" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 d-md-flex wow slideInRight" data-wow-offset="20">
        <div class="galeria_title_container">

          <h3 class="font-2 text-yellow text-light uppercase"><span>Quienes</span><br>Somos</h3>

        </div>
        <p class="galeria_description font-1 text-light">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam voluptas veritatis hic porro debitis
          cumque ea ducimus illum similique odio.

          <br><br>

          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minima vel id deserunt nulla qui non natus enim
          obcaecati tempore corporis animi esse vero numquam, voluptas fuga cum odit? Praesentium, laborum.
          <button class="mt-5 button general_button text-yellow">
            <span class="text-yellow" data-title="Ver Galería">
              Ver Galería
            </span>
          </button>
        </p>
      </div>
    </div>
  </div>
</section>




<?php get_template_part("contents/content", "interna_lineas"); ?>
<?php get_template_part("contents/content", "interna_360"); ?>






<section id="section_before_after" class="section section_high">
  <div class="container">
    <div class="bef_aft_background">
      <div class="row no-gutters h-100">
        <div class="col-md-6 bg-white"></div>
        <div class="col-md-6 bg-gray"></div>
      </div>
    </div>
    <div class="bef_aft_title_container mb-5">
      <h3 class="text-center wow slideInDown font-2 text-regular text-dark-gray">ANTES & DESPUÉS</h3>
    </div>

    <div class="row no-gutters">
      <div class="col-lg-1 col-md-12 col-sm-12 ">
        <div class="bef_aft_images_container">
          <div class="arrow_up arrows"><i class="icon-arrow_up"></i></div>
          <div class="bef_aft_images_gallery">
            <div class="bef_aft_image_photo">
              <img data-before="<?php bloginfo("template_url") ?>/images/interna/image3.jpg" data-after="<?php bloginfo("template_url") ?>/images/interna/image3.jpg" class="img_fill" src="<?php bloginfo("template_url") ?>/images/interna/image3.jpg" alt="">
            </div>
            <div class="bef_aft_image_photo">
              <img data-before="<?php bloginfo("template_url") ?>/images/interna/image4.jpg" data-after="<?php bloginfo("template_url") ?>/images/interna/image4.jpg" class="img_fill" src="<?php bloginfo("template_url") ?>/images/interna/image4.jpg" alt="">
            </div>
            <div class="bef_aft_image_photo">
              <img data-before="<?php bloginfo("template_url") ?>/images/interna/image8.jpg" data-after="<?php bloginfo("template_url") ?>/images/interna/image8.jpg" class="img_fill" src="<?php bloginfo("template_url") ?>/images/interna/image8.jpg" alt="">
            </div>
            <div class="bef_aft_image_photo">
              <img data-before="<?php bloginfo("template_url") ?>/images/interna/image10.jpg" data-after="<?php bloginfo("template_url") ?>/images/interna/image10.jpg" class="img_fill" src="<?php bloginfo("template_url") ?>/images/interna/image10.jpg" alt="">
            </div>
            <div class="bef_aft_image_photo">
              <img data-before="<?php bloginfo("template_url") ?>/images/interna/mazal_hoteles.jpg" data-after="<?php bloginfo("template_url") ?>/images/interna/mazal_hoteles.jpg" class="img_fill" src="<?php bloginfo("template_url") ?>/images/interna/mazal_hoteles.jpg" alt="">
            </div>
            <div class="bef_aft_image_photo">
              <img data-before="<?php bloginfo("template_url") ?>/images/interna/mazal_banos.jpg" data-after="<?php bloginfo("template_url") ?>/images/interna/mazal_banos.jpg" class="img_fill" src="<?php bloginfo("template_url") ?>/images/interna/mazal_banos.jpg" alt="">
            </div>
          </div>
          <div class="arrow_down arrows"><i class="icon-arrow_down"></i></div>
        </div>
      </div>
      <div class="col-lg-11 wow slideInRight">
        <div class="bf_image_sized">
          <img src="<?php bloginfo("template_url") ?>/images/interna/image3.jpg" alt="">
          <img src="<?php bloginfo("template_url") ?>/images/interna/image3.jpg" alt="">
        </div>
        <div class="bef_aft_sides">
          <div class="bef_aft_left_side wow slideInLeft">
            <div class="bef_aft_descriptions_container flex-center-xy text-gray">
              <span class="bef_aft_number font-2">1</span>
              <p class="font-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque ipsa reprehenderit
                similique error
                possimus ipsam natus architecto nemo. Fugiat consequatur nobis necessitatibus, ab laborum molestiae
                beatae repudiandae atque dolores quae!</p>
            </div>
          </div>
          <div class="bef_aft_right_side wow slideInRight">

            <div class="bef_aft_descriptions_container flex-center-xy text-gray">
              <span class="bef_aft_number font-2">2</span>
              <p class="font-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque ipsa reprehenderit
                similique error
                possimus ipsam natus architecto nemo. Fugiat consequatur nobis necessitatibus, ab laborum molestiae
                beatae repudiandae atque dolores quae!</p>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>

</section>


<section id="section_portafolio" class="section_high">
  <div class="row no-gutters flex-lg-row flex-column-reverse">
    <div class="col-lg-9">

      <div class="row no-gutters">
        <div class="col-lg-8 col-md-6 wow fadeInLeft">
          <div class="portafolio_single_image">
            <img class="img_fill" src="<?php bloginfo("template_url") ?>/images/interna/image1.jpg" alt="">
            <div class="black_background"></div>
            <div class="portafolio_mazal_logo">
              <figure>
                <img src="<?php bloginfo("template_url") ?>/images/icons/logo_min.svg" alt="">
              </figure>
            </div>
            <div class="portafolio_single_image_context">
              <h3 class="font-2">Piso Cerámico</h3>
              <p>Lorem ipsum dolor sit amet consectetur.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInDown">
          <div class="portafolio_single_image">

            <img class="img_fill" src="<?php bloginfo("template_url") ?>/images/interna/image10.jpg" alt="">
            <div class="black_background"></div>
            <div class="portafolio_mazal_logo">
              <figure>
                <img src="<?php bloginfo("template_url") ?>/images/icons/logo_min.svg" alt="">
              </figure>
            </div>
            <div class="portafolio_single_image_context">
              <h3 class="font-2">Mueble</h3>
              <p>Lorem ipsum dolor sit amet consectetur.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-4 col-md-6 wow fadeInLeft">
          <div class="portafolio_single_image">

            <img class="img_fill" src="<?php bloginfo("template_url") ?>/images/interna/image4.jpg" alt="">
            <div class="black_background"></div>
            <div class="portafolio_mazal_logo">
              <figure>
                <img src="<?php bloginfo("template_url") ?>/images/icons/logo_min.svg" alt="">
              </figure>
            </div>
            <div class="portafolio_single_image_context">
              <h3 class="font-2">Amoblado</h3>
              <p>Lorem ipsum dolor sit amet consectetur.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-md-6 wow fadeInUp">
          <div class="portafolio_single_image">

            <img class="img_fill" src="<?php bloginfo("template_url") ?>/images/interna/image16.jpg" alt="">
            <div class="black_background"></div>
            <div class="portafolio_mazal_logo">
              <figure>
                <img src="<?php bloginfo("template_url") ?>/images/icons/logo_min.svg" alt="">
              </figure>
            </div>
            <div class="portafolio_single_image_context">
              <h3 class="font-2">Habitaciones</h3>
              <p>Lorem ipsum dolor sit amet consectetur.</p>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="col-lg-3 wow fadeInRight">
      <div class="portafolio_show_more_wrap">
        <div class="black_background"></div>
        <img class="portfolio_show_more_image h-100 w-init" src="<?php bloginfo("template_url") ?>/images/interna/image7.jpg" alt="">
        <div class="portafolio_show_more_content">
          <div class="portafilio_title">
            <h3 class="text-yellow font-2 capitalize text-regular">PORTAFOLIO</h3>
          </div>
          <div class="portafolio_button">
            <button class="button general_button text-yellow"><span data-title="Ver Más">Ver Más</span></button>
          </div>
        </div>
      </div>
    </div>
  </div>


</section>


<section id="section_clientes" class="section wow fadeIn" data-wow-offset="40" data-wow-delay="0.5s">
  <div class="container">
    <h3 class="text-center mb-4 text-regular font-2 text-dark-gray">CLIENTES</h3>
    <ul class="clietes_list">
      <li><img src="<?php bloginfo("template_url") ?>/images/clientes/amarillo.png" alt=""></li>
      <li><img src="<?php bloginfo("template_url") ?>/images/clientes/babaria.png" alt=""></li>
      <li><img src="<?php bloginfo("template_url") ?>/images/clientes/claro.png" alt=""></li>
      <li><img src="<?php bloginfo("template_url") ?>/images/clientes/club.png" alt=""></li>
      <li><img src="<?php bloginfo("template_url") ?>/images/clientes/huawei.png" alt=""></li>
      <li><img src="<?php bloginfo("template_url") ?>/images/clientes/amarillo.png" alt=""></li>
      <li><img src="<?php bloginfo("template_url") ?>/images/clientes/babaria.png" alt=""></li>
    </ul>
  </div>
</section>
<?php get_template_part("contents/content", "contact_map"); ?>