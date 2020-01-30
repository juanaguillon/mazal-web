<!DOCTYPE html>
<html lang="<?php echo pll_current_language() ?>">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-TL9XL53');
  </script>
  <!-- End Google Tag Manager -->

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php if (is_front_page()) : ?>
    <title>Mazal | Diseño interior y Arquitectura</title>
  <?php else : ?>
    <title><?php wp_title("") ?> | Mazal</title>
  <?php endif; ?>

  <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url') ?>/favicon.ico">
  <!-- <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,600,700&display=swap" rel="stylesheet"> -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:200,400,700|Work+Sans:100,300,400,500&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/custom.min.css">
  <meta name="description" content="Somos una compañía basada en diseño interior, arquitectura y productos mobiliarios.">
  <meta property="og:locale" content="es_ES" />
  <meta property="og:site_name" content="Mazal" />

  <?php
  if (is_singular("producto")) :
    $producto = get_queried_object(); ?>
    <meta property="og:title" content="Mazal | <?php echo $producto->post_title ?>" />
    <meta property="og:description" content="<?php echo $producto->post_content ?>" />
    <meta property="og:url" content="<?php echo get_permalink($producto) ?>" />
    <meta property="og:image" content="<?php echo get_field("imagen_de_producto", $producto)["sizes"]["medium"] ?>" />
  <?php endif; ?>
  <meta property="og:type" content="article" />
  <meta property="fb:app_id" content="397559747817271">
  <script>
    var mailUrl = "<?php echo get_template_directory_uri() . "/includes/envioform.php" ?>"
    var chimpUrl = "<?php echo get_template_directory_uri() . "/includes/addmailchimpmail.php" ?>"
    var ajaxUrl = "<?php echo admin_url("admin-ajax.php") ?>"
    var isSpanish = <?php echo mazal_is_language() ? "true" : "false" ?>
  </script>

  <?php

  $chocolate = get_theme_mod("mazal_color_chocolate", "#201818");
  $dorado = get_theme_mod("mazal_color_dorado", "#8c7d6c");
  $yellow = get_theme_mod("mazal_color_yellow", "#dab27c");

  ?>
  <style id="style_rootsheet">
    :root {
      --chocolate: <?php echo $chocolate ?>;
      --dorado: <?php echo $dorado ?>;
      --yellowcolor: <?php echo $yellow ?>;
    }
  </style>
</head>

<body class="<?php if (is_front_page()) echo "index_body_class" ?>">

  <main id="main_interna">

    <?php
    if (mazal_is_front_page()) {
      get_template_part("contents/content", "header_index");
    } else {

      $classHeader = "";
      $showBlackBg = "";
      if (is_singular("producto") || is_search() || mazal_is_nosotros_page()) {
        $showBlackBg = "display:none;";
        $classHeader = "in_scroll";
      } else {
        $showBlackBg = "display:block;";
        $classHeader = "enable_scroll";
      }

    ?>

      <header class="<?php echo $classHeader ?>">
        <div class="black_background" style="<?php echo $showBlackBg ?>"></div>
        <nav class="header_top">
          <div class="header_top_left">
            <div class="menu_logo_li">
              <h1 class="menu_logo" title="Mazal | Diseño interior y Arquitectura" style="font-size: 0.1px;">
                <a class="text-white d-flex" href="<?php echo esc_attr(home_url())  ?>">
                  <i class="icon-logo"></i>Mazal | Diseño interior y Arquitectura
                </a>
              </h1>
            </div>

          </div>
          <div class="header_top_right flex-center-xy">
            <ul class="header_top_list">

              <?php

              // Max parent será un objeto con una propiedad "term_id" ( $maxParent->term_id). Este term_id determinará en termino superior relativo a la pagina actual, y mostrará una lista de las categorías hijas de dicha categoría.
              $maxParent = null;
              $link = null;
              $linkSearch = true;
              /** Verificar si la página/taxonomía está traducida. */
              // $inTransaled = false;
              $nosotrosLink = esc_url(get_permalink(pll_get_post(808)));
              if (is_singular("producto")) {
                // Obtener la primera categoria de el actual producto
                $termsProducto = get_the_terms(get_queried_object(), "categoria")[0];
                $maxParent = mazal_get_term_top_most_parent($termsProducto->term_id, "categoria");

                // Verificar a que página enviar, si será arquitectura, hogar o corporativo.
                if ($maxParent->term_id == 91 || $maxParent->term_id == 97) {
                  // Si es arquitectura
                  $linkSend = pll_get_post(11);
                } else if ($maxParent->term_id == 99 || $maxParent->term_id == 89) {
                  // Si es Hogar
                  $linkSend = pll_get_post(9);
                } else if ($maxParent->term_id == 93 || $maxParent->term_id == 101) {
                  // Si es Corporativo
                  $linkSend = pll_get_post(25);
                }
                $chLink =  get_queried_object()->ID;
                if (mazal_is_language("es")) {
                  $linkID = pll_get_post($chLink, "en");
                } else {
                  $linkID = pll_get_post($chLink, "es");
                }
                $link = get_permalink($linkID);
                if ($link === get_permalink($chLink)) {
                  $linkSearch = false;
                }
              } else  if (is_page()) {
                $maxParent = new stdClass();

                $termIDHogar = pll_get_term(89);
                $termIDArq = pll_get_term(91);
                $termIDCorp = pll_get_term(93);

                if (mazal_is_hogar_page()) {
                  $maxParent->term_id = $termIDHogar;
                  $nosotrosLink = "#";
                } else if (mazal_is_arquitectura_page()) {
                  $maxParent->term_id = $termIDArq;
                  $nosotrosLink = "#";
                } else if (mazal_is_corporativo_page()) {
                  $maxParent->term_id = $termIDCorp;
                  $nosotrosLink = "#";
                } else {

                  if (mazal_is_nosotros_page() && isset($_GET["subsection"])) {
                    $getSection = $_GET["subsection"];
                    switch ($getSection) {
                      case 'arq':
                        $maxParent->term_id = $termIDArq;
                        break;
                      case 'corp':
                        $maxParent->term_id = $termIDCorp;
                        break;
                      case 'hogar':
                        $maxParent->term_id = $termIDHogar;
                        break;

                      default:
                        $maxParent->term_id = $termIDArq;
                        break;
                    }
                  } else {
                    $maxParent->term_id = 0;
                  }
                }

                $chLink =  get_queried_object()->ID;
                if (mazal_is_language("es")) {
                  $linkID = pll_get_post($chLink, "en");
                } else {
                  $linkID = pll_get_post($chLink, "es");
                }
                $link = get_permalink($linkID);

                if ($link === get_permalink($chLink)) {
                  $linkSearch = false;
                }
              } else if (is_tax("categoria")) {
                $chLink =  get_queried_object()->term_id;
                $maxParent = mazal_get_term_top_most_parent($chLink, "categoria");

                // Verificar a que página enviar, si será arquitectura, hogar o corporativo.
                if ($maxParent->term_id == 91 || $maxParent->term_id == 97) {
                  // Si es arquitectura
                  $linkSend = pll_get_post(11);
                } else if ($maxParent->term_id == 99 || $maxParent->term_id == 89) {
                  // Si es Hogar
                  $linkSend = pll_get_post(9);
                } else if ($maxParent->term_id == 93 || $maxParent->term_id == 101) {
                  // Si es Corporativo
                  $linkSend = pll_get_post(25);
                }

                if (mazal_is_language()) {
                  $linkID = pll_get_term($chLink, "en");
                } else {
                  $linkID = pll_get_term($chLink, "es");
                }
                $link = get_term_link($linkID);
              } else {
                $maxParent = new stdClass();
                $maxParent->term_id = 0;

                // Obtener el home url en el lenguaje inverso
                $formULR = mazal_is_language("es") ? "en" : "es";
                $link = pll_home_url($formULR);
              }
              ?>
              <li class="galeria <?= mazal_is_nosotros_page() ? "active" : "" ?>">
                <a href="<?= $nosotrosLink ?>" class="text-white" data-scroll="galeria"><?= mazal_is_language() ? "Nosotros" : "About Us" ?></a>
              </li>

              <?php

              $directChilds = get_terms(array(
                "taxonomy" => "categoria",
                "parent" => $maxParent->term_id,
                "hide_empty" => false
              ));

              $navDynamics = array();
              foreach ($directChilds as $childNav) :
                $dataDyn = "";
                $className = $childNav->slug;

                /**
                 * Todas las páginas que tengan el "parent" con valor 0 ( Como la página interna quienes somos), signifca que es una página distinta a "Corporativo","Hogar","Arquitectura" por lo tanto, no debe hacer scroll de sus secciones ( Algo que las páginas corporativo y arquitectura si hacen )
                 */
                $isInnerPage = false;
                if ($childNav->parent == 0) {
                  $isInnerPage = true;
                }

                // Necesitamos hacer la traducción con la función pll_get_term Para obtener las imagenes de esta y las subcategorias
                // Ya que ha no hemos logrado traducir las imagenes de las categorias ( Taxonomía categoría ).
                $childNavTranslated = get_term(pll_get_term($childNav->term_id, "es"), "categoria");
                if (get_field("diseno_", $childNavTranslated) == "Diseño con Subcategorías") {
                  $navDynamics[$childNav->slug] = get_terms(array(
                    "taxonomy" => "categoria",
                    "hide_empty" => false,
                    "number" => 4,
                    "parent" => $childNav->term_id
                  ));
                  $className .= " has_dynamic";
                  $dataDyn = sprintf("data-dynamic='nav_dynamic_%s'", $childNav->slug);
                }
              ?>

                <li class="<?php echo $className ?>" <?php echo $dataDyn ?>>
                  <?php
                  /**
                   * Se crea este condicional para verificar si hacer scroll o ir a la pagina de categoría.
                   */
                  if (is_page() && !$isInnerPage) {
                    $href = "#";
                  } else {
                    $href = get_term_link($childNav, "categoria");
                  }

                  ?>
                  <a rel="nofollow" href="<?php echo $href ?>" class="text-white" data-scroll="<?php echo $childNav->slug ?>"><?php echo $childNav->name ?></a>
                  <?php
                  if (isset($navDynamics[$childNav->slug])) {
                    $subItemsOfCurrentTerm = $navDynamics[$childNav->slug];
                    echo "<ul class='header_top_submenu'>";
                    foreach ($subItemsOfCurrentTerm as $sioct) {
                      echo "<li><a href='" . get_term_link($sioct, "categoria") . "'>" . $sioct->name . "</a></li>";
                    }
                    echo "</ul>";
                  }

                  ?>

                </li>
              <?php endforeach; ?>
              <script>
                var _head__sectionsSelector = [
                  <?php
                  foreach ($directChilds as $cld) {
                    echo "'" . $cld->slug . "',";
                  }
                  ?>
                ]
              </script>
              <?php


              if (mazal_is_nosotros_page()) {
                $ullist  = array();
              } else {
                /**
                 * Secciones de las páginas.
                 */
                $ullist = array(
                  // "galeria" => mazal_is_language() ? "Nosotros" : "About Us",
                  "portafolio" => strtoupper(mazal_get_acf_field("portafolio_titulo_")),
                  "contacto" => strtoupper(mazal_get_acf_field("contacto_titulo_")),
                  // "before_after" => mazal_is_language() ? "Remodelación" : "Restyling",
                  // "clientes" => mazal_is_language() ? "Clientes" : "Customers",
                );
              }

              foreach ($ullist as $ulkey => $ullnm) :
                $linkLI = $link;
                if (is_tax("categoria") || is_singular("producto")) {
                  if ($ulkey == 'portafolio') {
                    $linkTaxMaxParent = get_term_link($maxParent);
                    $linkLI = "href='{$linkTaxMaxParent}'";
                  } else {
                    // $nosotrosLink =
                    $linkLI = "href='" . esc_url(get_permalink($linkSend) . "?section=" . $ulkey)  . "'";
                  }
                }


              ?>
                <li class="<?php echo $ulkey ?>">
                  <a <?php echo $linkLI ?> class="text-white" data-scroll="<?php echo $ulkey ?>"><?php echo $ullnm ?></a>
                </li>
                <?php endforeach;
              if (!is_wp_error($link)) :
                // Debe tomar el get en caso que esté buscando en la web
                if (is_search()) {
                  $link .= "?s=" . $_GET["s"];
                }

                if ($linkSearch) :
                ?>
                  <li class="languages_header">
                    <a rel="nofollow" href="<?php echo esc_attr($link); ?>">
                      <?php $isEs = mazal_is_language(); ?>
                      <span class="language <?php echo $isEs ? "language_active" : "" ?>" id="language_es">
                        ES
                      </span>
                      <span>/</span>
                      <span class="language <?php echo !$isEs ? "language_active" : "" ?>" id="language_en">
                        EN
                      </span>
                    </a>

                  </li>
              <?php
                endif;

              endif; ?>

            </ul>
            <button id="icon_search" class="button button_small direct_header_button">
              <i class="icon-search text-white hover-white"></i>
            </button>

            <div id="icon_favorites" class="button button_small direct_header_button">
              <?php
              $productsFav = mazal_get_favorite_products();
              $hasFavs = $productsFav && count($productsFav["posts"]) > 0;
              ?>
              <i class="icon-heart<?php echo !$hasFavs ? "-o" : "" ?> text-white hover-white"></i>
              <div id="favorites_header">
                <?php if ($hasFavs) : ?>
                  <ul id="favorites_ul_header">
                    <?php foreach ($productsFav["posts"] as $pr) : ?>
                      <li>
                        <div class="checkbox">
                          <input type="checkbox" class="checkbox-custom favorites_checkbox" value="<?= $pr->ID ?>" checked>
                          <label class="checkbox-custom-label active"></label>
                        </div>

                        <a rel="nofollow" href="<?php echo get_permalink($pr) ?>">
                          <div class="single_favorite">
                            <div class="single_favorite_img">
                              <img src="<?php echo get_field("imagen_de_producto", $pr)["sizes"]["thumbnail"] ?>" alt="">
                            </div>
                            <div class="single_favorite_title">
                              <span><?php echo $pr->post_title ?></span>
                              <div class="qty">
                                <span class="minus bg-dark">-</span>
                                <input type="number" class="count" value="1">
                                <span class="plus bg-dark">+</span>
                              </div>
                            </div>
                          </div>
                        </a>
                        <div class="action_delete">
                          <span class="action_delete_item">
                            <i class="icon-heart"></i>
                          </span>
                          <span data-delete="<?= $pr->ID ?>" class="confirm_delete_item">
                            <?php if (mazal_is_language("es")) {
                              echo "¿Eliminar ítem?";
                            } else {
                              echo "Delete item?";
                            } ?>

                          </span>
                        </div>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                  <div class="cotizar-favoritos">
                    <?php
                    if (mazal_is_language("es")) {
                      $message = "Debe seleccionar al menos un producto para cotizar.";
                      $cotizar = "Cotizar";
                    } else {
                      $message = "You must select at least a product to quote.";
                      $cotizar = "Quote";
                    }
                    ?>
                    <span id="cotizar_lote_error_minimum" class="cotizar_error"><?= $message ?></span>
                    <button id="cotizar_lote" class="button general_button font-2 fill-button">
                      <span class="">
                        <?= $cotizar ?>
                      </span>
                    </button>
                  </div>
                <?php
                endif;
                ?>
              </div>
            </div>
            <button class="button hover-white button_small direct_header_button" id="open_shares">
              <i class="icon-share"></i>
              <ul>
                <?php mazal_get_socials() ?>
              </ul>
            </button>

            <button id="icon_bars" class="button button_small">
              <i class="text-white icon-bars hover-white"></i>
            </button>

          </div>

        </nav>

        <div class="search_modal_form">
          <button class="button button-cuadro button_abs "><i class="icon-cross"></i></button>
          <div class="search_modal_form_wrap">
            <?php
            if (mazal_is_language("es")) {
              $suffix = "es";
            } else {
              $suffix = "en";
            }
            $placeholder = get_field("campo_buscar_-_" . $suffix, "option");
            $search = get_field("boton_enviar_-_" . $suffix, "option");


            ?>
            <form id="form_search_general" action="<?php echo home_url() ?>">
              <div class="field">
                <?php
                if (mazal_is_language("es")) {
                  $debeProporcionar = "Debe proporcionar un texto";
                } else {
                  $debeProporcionar = "You must provide a text";
                }


                ?>
                <input data-message="<?= $debeProporcionar ?>" id="form_search_text" name="s" placeholder="<?php echo $placeholder; ?>" type="text" class="text">
                <div class="danger_form d-none" id="danger_form_search" id=""><span></span></div>
              </div>
              <div class="field">
                <button type="submit" class="button general_button text-white"><span data-title="<?php echo $search; ?>"><?php echo $search; ?></span></button>
              </div>
            </form>
          </div>

        </div>

        <div class="modal_mazal" id="modal_favorites_cotize">
          <div class="modal_container">
            <div class="modal_title">
              <div class="modal_title_left">
                <!-- <i class="text-white icon-logo"></i> -->
                <?php
                if (mazal_is_language("es")) {
                  $solicitudcotizacion = "Solicitud de cotización";
                } else {
                  $solicitudcotizacion = "Request for quotation";
                }
                ?>
                <h4 class=""><?= $solicitudcotizacion ?></h4>
              </div>
              <div class="modal_title_right">
                <button class="button cuadro button_close_modal"><i class="icon-cross"></i></button>
              </div>
            </div>
            <div class="modal_bcontent">
              <div class="loading_container white" id="cotization_lote_loading">
                <div class="loading_spinner"></div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <?php
                  if (mazal_is_language("es")) {
                    $listaproductos = "Productos";
                  } else {
                    $listaproductos = "Products";
                  }
                  ?>
                  <h4 class="lista-cotizacion"><?= $listaproductos ?></h4>
                  <div id="fav_cotizar_wrap" class="fav_cotizar_wrap">
                  </div>
                </div>
                <div class="col-md-6">
                  <form id="send_lote_cotizacion" data-prefix="cotization_lote_">
                    <div class="row">
                      <div class="col-12">
                        <div class="field">
                          <input id="cotization_lote_name" class="text light" placeholder="Nombres y apellidos" type="text">
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="field">
                          <input tabindex="-1" type="text" id="sprm_fld" placeholder="Omit if you are human" class="sprm_fld">
                          <input tabindex="-1" type="text" id="sprm_fld2" placeholder="Omit if you are human" class="sprm_fld">
                          <input id="cotization_lote_email" class="text light" placeholder="Email" type="text">
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="field">
                          <input id="cotization_lote_phone" class="text light" placeholder="Teléfono" type="number">
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="field">
                          <input id="cotization_lote_city" class="text light" placeholder="Ciudad" type="text">
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="field">
                          <textarea id="cotization_lote_msj" rows="4" class="text light" placeholder="Mensaje" type="text"></textarea>
                        </div>
                        <div class="field">
                          <div id="cotization_lote_message" class="cotizar_message">
                            <span class="cotizar_error">Debe completar todos los campos correctamente.</span>
                            <span class="cotizar_success">Mensaje enviado correctamente. Nos pondremos en contacto con usted lo más pronto posible.</span>
                          </div>

                          <button type="submit" id="button_cotization_lote_producto" class="button general_button button_dark">
                            <span data-title="Cotizar">Cotizar</span>
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>

              </div>

            </div>
          </div>
        </div>

        <div class="dynamic_header_top">
          <!-- Se mostrará en caso que se agregue el attr data-dynamic="dynamic_data_1" y class="has_dynamic" en el li del header -->
          <?php foreach ($navDynamics as $navKey => $navDyn) : ?>
            <div class="dynamic_data nav_dynamic_<?php echo $navKey ?>">
              <div class="row no-gutters">

                <div class="col-md-3">

                  <!-- <p class="dynamyc_description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil dolor quasi aspernatur
                    unde, et molestiae.</p> -->
                </div>

                <div class="col-md-9">
                  <div class="dynamic_images">

                    <?php foreach ($navDyn as $navDeep) :
                      /**
                       * Se debe obtener la imagen de la taxonomia en español
                       */
                      $imageTranslated = get_term(pll_get_term($navDeep->term_id, "es"), "categoria");
                    ?>
                      <a href="<?php echo esc_url(get_term_link($navDeep, "categoria")); ?>">
                        <div class="dynamic_image_single left_to_right_container">
                          <div class="dynamic_image_container ">
                            <img class="img_fill left" src="<?php echo get_field("imagen", $imageTranslated)["sizes"]["medium"] ?>" alt="">
                            <img class="img_fill right" src="<?php echo get_field("imagen", $imageTranslated)["sizes"]["medium"] ?>" alt="">
                          </div>
                          <div class="dynamic_image_text">
                            <?php echo $navDeep->name ?>
                          </div>
                        </div>
                      </a>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>


        </div>

      </header>

    <?php } ?>