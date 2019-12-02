<?php $producst = mazal_get_favorite_products();  ?>
<?php get_header(); ?>


<?php
$producto = get_queried_object();

?>

<div class="pagina-producto">

  <section class="migadepan container" style="padding: 0 30px;">

    <div class="direccion-pagina">
      <div class="direccion-back">
        <a href="<?= $_SERVER['HTTP_REFERER']; ?>" class="button fill-button add">
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
      <div class="col-md-7" id="container_slick_product">
        <div class="loading_container show" id="loading_slick_product">
          <div class="loading_spinner"></div>
        </div>

        <div class="swiper-container gallery-top">
          <div class="swiper-wrapper" id="image_product_slick">
            <div data-src="<?= get_field("imagen_de_producto", $producto)["original_image"]["url"] ?>" class="item_image_product swiper-slide item-swipper-image" style="background-image:url(<?php echo get_field("imagen_de_producto", $producto)["sizes"]["large"] ?>)">
              <div class="swiper-zoom-container" data-swiper-zoom="5">
              </div>
            </div>
            <?php
            $galeria = get_field("galeria", $producto);
            if ($galeria && count($galeria) > 0) :
              foreach ($galeria as $imgGall) :
                ?>
                <div data-src="<?= $imgGall["url"] ?>" class="swiper-slide item_image_product item-swipper-image" style="background-image:url(<?php echo $imgGall["sizes"]["large"] ?>)">
                  <div class="swiper-zoom-container" data-swiper-zoom="5">
                  </div>
                </div>
            <?php
              endforeach;
            endif;
            ?>

            <!-- 
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
          <div class="swiper-button-prev">
            <i class="icon-arrow_left"></i>
          </div>
          <div class="swiper-wrapper" id="gallery_product_slick">
            <div class="swiper-slide item-swipper-gallery" style="background-image:url(<?php echo get_field("imagen_de_producto", $producto)["sizes"]["large"] ?>)"></div>
            <?php
            if ($galeria && count($galeria) > 0) :
              foreach ($galeria as $imgGall) :
                ?>
                <div class="swiper-slide item-swipper-gallery" style="background-image:url(<?php echo $imgGall["sizes"]["medium_large"] ?>)"></div>
            <?php
              endforeach;
            endif;
            ?>
            <!-- 
            <div class="swiper-slide" style="background-image:url(http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/background-call-action.jpg)"></div>
            <div class="swiper-slide" style="background-image:url(http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/background-call-action.jpg)"></div>
            <div class="swiper-slide" style="background-image:url(http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/background-call-action.jpg)"></div> -->
          </div>

          <div class="swiper-button-next">
            <i class="icon-arrow_right"></i>
          </div>
        </div>


      </div>


      <div class="col-md-5">
        <div class="item-information">
          
          <h2 class="item-title"><?php echo $producto->post_title; ?></h2>
          <?php
          if (get_field("mostar_referencia", $producto)) {
            ?>
            <span class="item-ref">Ref: <?php echo get_field("referencia", $producto) ?></span>
          <?php
          }
          ?>

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
            </div> 
            <div class="feature">
              <span>Color: </span><span id="color_changer">Natural</span>
            </div> -->
          </div>
          <?php
          $colors =  get_field("colores", $producto);
          if ($colors && count($colors) > 0) : ?>
            <div class="color-item-feature">
              <div class="color-scheme-item">
                <ul>
                  <?php
                    if ($colors && count($colors) > 0) :
                      foreach ($colors as $color) : ?>
                      <li><span data-color="<?php echo $color["nombre"] ?>" style="background:<?php echo $color["color"] ?>"></span></li>
                  <?php endforeach;
                    endif;
                    ?>
                </ul>
              </div>
            </div>
          <?php endif; ?>


          <div class="action-for-item">

            <button id="open_modal_cotizar" class="button fill-button add">
              <span>
                <?php
                if (mazal_is_language()) : ?>
                  Solicitar cotización
                <?php else : ?>
                  Request quote
                <?php endif; ?>
              </span>
            </button>
            <?php
            $classNameLove = "";
            if (isset($producst["ids"]) && in_array($producto->ID, $producst["ids"])) {
              $classNameLove = " active";
            }
            ?>
            <a href="#" class="add-love <?php echo $classNameLove ?>" data-fav="<?php echo $producto->ID ?>">
              <i class="icon-heart-o"></i>
              <i class="icon-heart"></i>
            </a>
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
                  <a target="_blank" href="https://wa.me/573108613043?text=Hola, estoy interesado en el siguiente producto: <?php echo esc_url(get_permalink($producto)) ?>... Me gustaría recibir más información." id="share_whatsapp_product" class="share-whatsapp"><img src="http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/whastapp-social-media.svg" alt=""></a>
                </li>
                <li>
                  <a class="facebook_share" data-nombre="<?php echo $producto->post_title ?>" data-descrip="<?php echo $producto->post_content ?>" data-urlimg="<?php echo get_field("imagen_de_producto", $producto)["sizes"]["medium"] ?>">
                    <i class="icon-facebook"></i>
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
        <div class=" col-md-5 ">
          <div class="form-suscription">
            <input id="text_mailchimp_sub" type="text" placeholder="someexampleemail@gmail.com">
            <?php if (mazal_is_language()) : ?>

              <input id="send_mailchimp_sub" type="submit" value="Enviar">
            <?php else : ?>

              <input id="send_mailchimp_sub" type="submit" value="Send">
            <?php endif; ?>

            <div class="loading_container" id="loading_contact_subscribe">
              <div class="loading_spinner"></div>
            </div>

          </div>
          <div class="mailchimp_message">
            <?php if (mazal_is_language()) : ?>
              <p class="message-danger">Error, intente nuevamente.</p>
              <p class="message-success">Gracias por subscribirse.</p>
            <?php else : ?>
              <p class="message-danger">Error, try again.</p>
              <p class="message-success">Thanks for subscribe</p>

            <?php endif; ?>
          </div>

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
          <a href="<?php echo get_permalink($relProducto) ?>">
            <div class="related-item">
              <div class="image-related-item item">
                <img src="<?php echo get_field("imagen_de_producto", $relProducto)["sizes"]["medium"] ?>" alt="">
                <div class="item-content">
                  <span class="item-nombre-proyecto"><?php echo $relProducto->post_title ?></span>
                </div>
              </div>
              <h4><?php echo $relProducto->post_title ?></h4>
              <?php $relProdCat = get_the_terms($relProducto, "categoria")[0]; ?>
              <span class="related_category"><?php echo $relProdCat->name ?></span>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

</div>
<div class="modal_mazal" id="modal_product_cotize">
  <div class="modal_container">
    <div class="modal_title">
      <div class="modal_title_left">
        <i class="text-white icon-logo"></i>

        <h4><?= $producto->post_title ?></h4>
        <?php
        if (get_field("mostar_referencia", $producto)) {
          ?>
          <span class="item-ref">Ref: <?php echo get_field("referencia", $producto) ?></span>
        <?php
        }
        ?>
      </div>
      <div class="modal_title_right">
        <button class="button button-cuadro button_close_modal">x</button>
      </div>
    </div>
    <div class="modal_bcontent">
      <div class="loading_container" id="loading_cotizar">
        <div class="loading_spinner"></div>
      </div>
      <form id="send_cotizaction">
        <input type="hidden" id="image_cotizar" value="<?php echo get_field("imagen_de_producto", $producto)["sizes"]["medium"] ?>">
        <input type="hidden" id="url_cotizar" value=<?php echo get_permalink($producto) ?>>
        <input type="hidden" id="name_cotizar" value="<?php echo $producto->post_title ?>">
        <?php
        if (mazal_is_language()) {
          $namePh = "Nombres y apellidos";
          $emailph = "Email";
          $phonePh = "Teléfono";
          $cityph = "Ciudad";
          $messagePh = "Mensaje";
          $buttonReq = "Cotizar";
        } else {
          $namePh = "Names and Lastname";
          $emailph = "Email";
          $phonePh = "Phone";
          $cityph = "City";
          $messagePh = "Message";
          $buttonReq = "Request";
        }
        ?>
        <div class="row">
          <div class="col-12">
            <div class="field">
              <img style="width: 210px;" src="<?php echo get_field("imagen_de_producto", $producto)["sizes"]["medium"] ?>" alt="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="field">
              <input id="cotization_name" class="text light" placeholder="<?php echo $namePh ?>" type="text">
            </div>
          </div>
          <div class="col-md-6">
            <div class="field">
              <input id="cotization_email" class="text light" placeholder="<?php echo $emailph ?>" type="text">
            </div>
          </div>
          <div class="col-md-6">
            <div class="field">
              <input id="cotization_phone" class="text light" placeholder="<?php echo $phonePh ?>" type="number">
            </div>
          </div>
          <div class="col-md-6">
            <div class="field">
              <input id="cotization_city" class="text light" placeholder="<?php echo $cityph ?>" type="text">
            </div>
          </div>
          <div class="col-12">
            <div class="field">
              <textarea id="cotization_message" rows="4" class="text light" placeholder="<?php echo $messagePh ?>" type="text"></textarea>
            </div>
            <div class="field">
              <div id="cotizar_message" class="cotizar_message">
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
                <span class="cotizar_error"><?php echo $mensajeError ?></span>
                <span class="cotizar_success"><?php echo $mensajeSuccess ?></span>
              </div>

              <button type="submit" id="button_cotizar_producto" href="https://mazal.co/en" class="button general_button">
                <span data-title="<?php echo $buttonReq ?>"><?php echo $buttonReq ?></span>
              </button>
            </div>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>

<?php get_footer(); ?>