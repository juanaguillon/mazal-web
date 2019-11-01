<?php get_header(); ?>


<?php
$producto = get_queried_object();

?>

<div class="pagina-producto">

  <section class="migadepan container-fluid" style="padding: 0 30px;">

    <div class="direccion-pagina">
      <div class="direccion-back">
        <a href="" class="button fill-button add">
          <i class="icon-arrow_left"></i>
        </a>
      </div>

      <?php

      // $terms = get_the_terms($producto->ID, 'categoria');
      // // $d = get_ancestors($producto->ID, "producto", "post_type");
      // echo wp_list_categories(array(
      //   "taxonomy" => "categoria",
      //   "hierarchical" => true,
      //   "include" => get_terms($terms[0]->term_id)
      // ));
      ?>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Mobiliario Hogar</a></li>
        <li><a href="#">Carpinteria</a></li>
        <li><a href="#">Cocinas</a></li>
        <li><a href="#">Cocinas integrales</a></li>
      </ul>
    </div>

  </section>

  <section class="item-view container-fluid">

    <div class="row m-0">
      <div class="col-md-7">
        <div class="swiper-container gallery-top">
          <div class="swiper-wrapper">
            <div class="swiper-slide" style="background-image:url(<?php echo get_the_post_thumbnail_url($producto, "large") ?>)">
              <div class="swiper-zoom-container" data-swiper-zoom="5">

              </div>
            </div>
            <div class="swiper-slide" style="background-image:url(http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/background-call-action.jpg)">
              <div class="swiper-zoom-container" data-swiper-zoom="5">

              </div>
            </div>
            <div class="swiper-slide" style="background-image:url(http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/background-call-action.jpg)">
              <div class="swiper-zoom-container" data-swiper-zoom="5">

              </div>
            </div>
            <div class="swiper-slide" style="background-image:url(http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/background-call-action.jpg)">
              <div class="swiper-zoom-container" data-swiper-zoom="5">

              </div>
            </div>
            <div class="swiper-slide" style="background-image:url(http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/background-call-action.jpg)">
              <div class="swiper-zoom-container" data-swiper-zoom="5">
              </div>
            </div>

          </div>
          <!-- Add Arrows -->

        </div>

        <div class="swiper-container gallery-thumbs">
          <div class="swiper-button-next"></div>
          <div class="swiper-wrapper">
            <div class="swiper-slide" style="background-image:url(<?php echo get_the_post_thumbnail_url($producto, "large") ?>)"></div>
            <div class="swiper-slide" style="background-image:url(http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/background-call-action.jpg)"></div>
            <div class="swiper-slide" style="background-image:url(http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/background-call-action.jpg)"></div>
            <div class="swiper-slide" style="background-image:url(http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/background-call-action.jpg)"></div>
            <div class="swiper-slide" style="background-image:url(http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/background-call-action.jpg)"></div>
          </div>
          <div class="swiper-button-prev"></div>
        </div>


      </div>


      <div class="col-md-5">
        <div class="item-information">
          <h2 class="item-title"><?php echo $producto->post_title; ?></h2>
          <span class="item-ref">Ref:3161516511</span>
          <p class="item-description"><?php echo wp_kses_post($producto->post_content); ?></p>

          <div class="item-features">
            <div class="feature">
              <span>Colección:</span><span>some text</span>
            </div>
            <div class="feature">
              <span>Dimensiones:</span><span>some text</span>
            </div>
            <div class="feature">
              <span>Categoría: </span><?php echo get_the_term_list($producto, "categoria", "", ", ") ?>
            </div>
            <div class="feature">
              <span>Material: </span><?php echo get_the_term_list($producto, "material", "", ", ") ?>
            </div>
            <div class="feature">
              <span>Color: </span><span id="color_changer">Natural</span>
            </div>
          </div>

          <div class="color-item-feature">
            <div class="color-scheme-item">
              <ul>
                <li><span class="brown-1"></span></li>
                <li><span class="brown-2"></span></li>
                <li><span class="brown-3"></span></li>
                <li><span class="brown-4"></span></li>
                <li><span class="brown-5"></span></li>
              </ul>
            </div>
          </div>

          <div class="action-for-item">

            <button class=" button fill-button add">
              <span>
                <?php
                if (mazal_is_language()) : ?>
                  Solicitar cotización
                <?php else : ?>
                  Request quote
                <?php endif; ?>
              </span>
            </button>
            <a href="#" class="share-whatsapp"><img src="http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/whastapp-social-media.svg" alt=""></a>
            <a href="#" class="add-love"><img src="http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/favorite.svg" alt=""></a>

          </div>

          <div class="compartir-area">
            <span>

              <?php
              if (mazal_is_language()) : ?>
                Compartir producto
              <?php else : ?>
                Share product
              <?php endif; ?>
            </span>
            <div class="redes-compartir">
              <ul class="d-flex">
                <li>
                  <a href="">
                    <i class="icon-instagram"></i>
                  </a>
                </li>
                <li>
                  <a href="">
                    <i class="icon-facebook"></i>
                  </a>
                </li>
                <li>
                  <a href="">
                    <i class="icon-houzz"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>

        </div>

      </div>
    </div>

  </section>


  <section class="container-fluid call-action">
    <div class="container">
      <div class="row">
        <div class=" col-md-7 call-action-name">
          <?php
          if (mazal_is_language()) : ?>
            <h3>Suscribete para no perderte ninguna novedad</h3>
          <?php else : ?>
            <h3>Subscribe to not miss any news</h3>
          <?php endif; ?>

        </div>
        <div class=" col-md-5 form-suscription">
          <input type="text" placeholder="someexampleemail@gmail.com">
          <input type="submit" placeholder="Enviar">
        </div>
      </div>
    </div>
  </section>

  <section class="container related-items">
    <?php
    if (mazal_is_language()) : ?>
      <h3 class="">PRODUCTOS RELACIONADOS</h3>
    <?php else : ?>
      <h3>RELATED PRODUCTS</h3>
    <?php endif; ?>


    <?php $tersRelated = get_the_terms($producto, "categoria") ?>
    <div class="row">
      <div class="col-md-4">
        <div class="related-item">
          <div class="image-related-item item">
            <a href="#"><img src="http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/cocina-7.jpg" alt=""></a>
            <div class="item-content">
              <span class="item-nombre-proyecto">Proyecto Colina Brillo</span>
            </div>
          </div>
          <h4><a href="#">Some item title</a></h4>
          <span>Some item category</span>
        </div>
      </div>
      <div class="col-md-4">
        <div class="related-item">
          <div class="image-related-item item">
            <a href="#"><img src="http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/cocina-4.jpg" alt=""></a>
            <div class="item-content">
              <span class="item-nombre-proyecto">Proyecto Colina Brillo</span>
            </div>
          </div>
          <h4><a href="#">Some item title</a></h4>
          <span>Some item category</span>
        </div>
      </div>
      <div class="col-md-4">
        <div class="related-item">
          <div class="image-related-item item">
            <a href="#"><img src="http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/cocina-2.jpg" alt=""></a>
            <div class="item-content">
              <span class="item-nombre-proyecto">Proyecto Colina Brillo</span>
            </div>
          </div>
          <h4><a href="#">Some item title</a></h4>
          <span>Some item category</span>
        </div>
      </div>
    </div>

  </section>

</div>

<?php get_footer(); ?>