<?php get_header(); ?>


<?php
$producto = get_queried_object();

?>

<div class="pagina-producto">

  <section class="migadepan container" style="padding: 0 30px;">

    <div class="direccion-pagina">
      <div class="direccion-back">
        <a href="" class="button fill-button add">
          <i class="icon-arrow_left"></i>
        </a>
      </div>

      <?php


      add_filter("term_links-categoria", function ($links) {
        $linksOut = array();
        foreach ($links as $link) {
          $linksOut[] = "<li>" . $link . "</li>";
        }
        return $linksOut;
      });

      ?>
      <ul>
        <?php echo get_the_term_list($producto, "categoria"); ?>
        <li><?php echo $producto->post_title; ?></li>
        <!-- <li><a href="#">Home</a></li>
        <li><a href="#">Mobiliario Hogar</a></li>
        <li><a href="#">Carpinteria</a></li>
        <li><a href="#">Cocinas</a></li>
        <li><a href="#">Cocinas integrales</a></li> -->
      </ul>
    </div>

  </section>

  <section class="item-view container">

    <div class="row m-0">
      <div class="col-md-7">
        <div class="swiper-container gallery-top">
          <div class="swiper-wrapper">
            <div class="swiper-slide" style="background-image:url(<?php echo get_the_post_thumbnail_url($producto, "large") ?>)">
              <div class="swiper-zoom-container" data-swiper-zoom="5">

              </div>
            </div>
            <!-- <div class="swiper-slide" style="background-image:url(http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/background-call-action.jpg)">
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
            </div> -->

          </div>
          <!-- Add Arrows -->

        </div>

        <div class="swiper-container gallery-thumbs">
          <div class="swiper-button-next"></div>
          <div class="swiper-wrapper">
            <div class="swiper-slide" style="background-image:url(<?php echo get_the_post_thumbnail_url($producto, "large") ?>)"></div>
            <!-- <div class="swiper-slide" style="background-image:url(http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/background-call-action.jpg)"></div>
            <div class="swiper-slide" style="background-image:url(http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/background-call-action.jpg)"></div>
            <div class="swiper-slide" style="background-image:url(http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/background-call-action.jpg)"></div>
            <div class="swiper-slide" style="background-image:url(http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/background-call-action.jpg)"></div> -->
          </div>
          <div class="swiper-button-prev"></div>
        </div>


      </div>


      <div class="col-md-5">
        <div class="item-information">
          <h2 class="item-title"><?php echo $producto->post_title; ?></h2>
          <span class="item-ref">Ref: 785-001</span>
          <p class="item-description"><?php echo wp_kses_post($producto->post_content); ?></p>

          <div class="item-features">
            <!-- <div class="feature">
              <span>Colección:</span><span>some text</span>
            </div>
            <div class="feature">
              <span>Dimensiones:</span><span>some text</span>
            </div> -->
            <div class="feature">
              <?php
              add_filter("term_links-categoria", function ($links) {
                $linksOut = array();
                foreach ($links as $link) {
                  // Eliminar etiqutas li
                  $linksOut[] = preg_replace('/<(\/)?li>/', '', $link);
                }
                return $linksOut;
              });
              ?>
              <span>Categoría: </span><?php echo get_the_term_list($producto, "categoria", "", ", ") ?>
            </div>
            <!-- <div class="feature">
              <span>Material: </span><?php echo get_the_term_list($producto, "material", "", ", ") ?>
            </div> -->
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
      <h3>PRODUCTOS RELACIONADOS</h3>
    <?php else : ?>
      <h3>RELATED PRODUCTS</h3>
    <?php endif; ?>


    <?php
    $tersRelated = get_the_terms($producto, "categoria");
    $termsKeys = array();
    foreach ($tersRelated as $term) {
      $termsKeys[] = $term->term_id;
    }
    // printcode($termsKeys);
    $queryRel = new WP_Query(array(
      "post_type" => "producto",
      "posts_per_page" => 3,
      "orderby" => "rand",
      "post__not_in" => array($producto->ID),
      "tax_query" => array(
        array(
          'taxonomy' => 'categoria',
          'field'    => 'term_id',
          'terms'    => $termsKeys,
        )
      )
    ));

    ?>
    <div class="row">
      <?php
      foreach ($queryRel->posts as $relProducto) : ?>
        <div class="col-md-4">
          <a href="<?php echo get_permalink($relProdCat) ?>">
            <div class="related-item">
              <div class="image-related-item item">
                <img src="<?php echo get_the_post_thumbnail_url($relProducto, "medium") ?>" alt="">
                <div class="item-content">
                  <span class="item-nombre-proyecto"><?php echo $relProducto->post_title ?></span>
                </div>
              </div>
              <h4><?php echo $relProducto->post_title ?></h4>
              <?php $relProdCat = get_the_terms($relProducto, "categoria")[0]; ?>
              <span><?php echo $relProdCat->name ?></span>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

</div>

<?php get_footer(); ?>