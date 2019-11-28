<!DOCTYPE html>
<html lang="<?php echo pll_current_language() ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php wp_title("") ?> | Mazal</title>
  <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url') ?>/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,600,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/custom.min.css">
  <?php
  if (is_singular("producto")) :
    $producto = get_queried_object(); ?>
    <meta property="og:title" content="Mazal | <?php echo $producto->post_title ?>" />
    <meta property="og:description" content="<?php echo $producto->post_content ?>" />
    <meta property="og:url" content="<?php echo get_permalink($producto) ?>" />
    <meta property="og:site_name" content="Mazal" />
    <meta property="og:image" content="<?php echo get_field("imagen_de_producto", $producto)["sizes"]["medium"] ?>" />
  <?php endif; ?>
  <meta property="og:type" content="article" />
  <meta property="fb:app_id" content="397559747817271">
  <script>
    var mailUrl = "<?php echo get_template_directory_uri() . "/includes/envioform.php" ?>"
    var chimpUrl = "<?php echo get_template_directory_uri() . "/includes/addmailchimpmail.php" ?>"
    var ajaxUrl = "<?php echo admin_url("admin-ajax.php") ?>"
  </script>
</head>

<body class="<?php if (is_front_page()) echo "index_body_class" ?>">

  <!-- <div class="loader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div> -->


  <main id="main_interna">

    <?php
    if (mazal_is_front_page()) {
      get_template_part("contents/content", "header_index");
    } else {

      $classHeader = "";
      $showBlackBg = "";
      if (is_singular("producto") || is_search()) {
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
              <h1 class="menu_logo">
                <a class="text-white" href="<?php echo esc_attr(home_url())  ?>">
                  <i class="icon-logo"></i>
                </a>
              </h1>
            </div>

          </div>
          <div class="header_top_right flex-center-xy">
            <ul class="header_top_list">
              <?php


                $maxParent = null;
                $link = null;

                /** Verificar si la página/taxonomía está traducida. */
                // $inTransaled = false;
                if (is_page() || is_singular("producto")) {
                  $maxParent = new stdClass();
                  if (mazal_is_hogar_page()) {
                    $maxParent->term_id = pll_get_term(89);
                  } else if (mazal_is_arquitectura_page()) {
                    $maxParent->term_id =  pll_get_term(91);
                  } else if (mazal_is_corporativo_page()) {
                    $maxParent->term_id = pll_get_term(93);
                  } else if (!is_page("producto")) {
                    $maxParent->term_id = 0;
                  }
                  // printcode( $maxParent );

                  $chLink =  get_queried_object()->ID;
                  if (mazal_is_language()) {
                    $linkID = pll_get_post($chLink, "en");
                  } else {
                    $linkID = pll_get_post($chLink, "es");
                  }
                  $link = get_permalink($linkID);
                } else if (is_tax("categoria")) {
                  $chLink =  get_queried_object()->term_id;
                  $maxParent = mazal_get_term_top_most_parent($chLink, "categoria");

                  // Verificar a que página enviar, si será arquitectura, hogar o corporativo.
                  if ($maxParent->term_id == 91 || $maxParent->term_id == 97) {
                    // Si es arquitectura
                    $linkSend = pll_get_post(11);
                  } else if ($maxParent->term_id == 99 || $maxParent->term_id == 89) {
                    // Si es Hogar
                    $linkSend = pll_get_post(25);
                  } else if ($maxParent->term_id == 93 || $maxParent->term_id == 101) {
                    // Si es Corporativo
                    $linkSend = pll_get_post(9);
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
                  $formULR = mazal_is_language() ? "en" : "es";
                  $link = pll_home_url($formULR);
                }

                $directChilds = get_terms(array(
                  "taxonomy" => "categoria",
                  "parent" => $maxParent->term_id,
                  "hide_empty" => false
                ));
                $navDynamics = array();
                ?>

              <?php foreach ($directChilds as $childNav) : ?>

                <?php
                    $dataDyn = "";
                    $className = $childNav->slug;
                    if (get_field("diseno_", $childNav) == "Diseño con Subcategorías") {
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
                      if (is_page()) {
                        $href = "#";
                      } else {
                        $href = get_term_link($childNav, "categoria");
                      }
                      ?>
                  <a rel="nofollow" href="<?php echo $href ?>" class="text-white" data-scroll="<?php echo $childNav->slug ?>"><?php echo $childNav->name ?></a>
                </li>
              <?php endforeach;

                /**
                 * Secciones de las páginas.
                 */
                $ullist = array(
                  // "galeria" => mazal_is_language() ? "Nosotros" : "About Us",
                  // "before_after" => mazal_is_language() ? "Remodelación" : "Restyling",
                  "portafolio" => strtoupper(mazal_get_acf_field("portafolio_titulo_")),
                  // "clientes" => mazal_is_language() ? "Clientes" : "Customers",
                  "contacto" => strtoupper(mazal_get_acf_field("contacto_titulo_")),
                );
                foreach ($ullist as $ulk => $ullnm) :
                  $linkLI = $link;
                  if (is_tax("categoria")) {
                    $linkLI = "href='" . esc_url(get_permalink($linkSend) . "?section=" . $ulk)  . "'";
                  }
                  ?>
                <li class="<?php echo $ulk ?>">
                  <a <?php echo $linkLI ?> class="text-white" data-scroll="<?php echo $ulk ?>"><?php echo $ullnm ?></a>
                </li>
              <?php endforeach;
                if (!is_wp_error($link)) :
                  // Debe tomar el get en caso que esté buscando en la web
                  if (is_search()) {
                    $link .= "?s=" . $_GET["s"];
                  }
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
              <?php endif; ?>

            </ul>
            <button id="icon_search" class="button button_small direct_header_button">
              <i class="icon-search text-white hover-white"></i>
            </button>

            <button id="icon_favorites" class="button button_small direct_header_button">
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
                        <a rel="nofollow" href="<?php echo get_permalink($pr) ?>">
                          <div class="single_favorite">
                            <div class="single_favorite_img">
                              <img src="<?php echo get_field("imagen_de_producto", $pr)["sizes"]["thumbnail"] ?>" alt="">
                            </div>
                            <div class="single_favorite_title">
                              <span><?php echo $pr->post_title ?></span>
                            </div>
                          </div>
                        </a>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                <?php
                  endif;
                  ?>
              </div>
            </button>
            <button class="button hover-white button_small direct_header_button" id="open_shares">
              <i class="icon-share"></i>
              <ul>
                <?php
                  foreach (get_field("redes_sociales", "option") as $social) : ?>
                  <li><a target="_blank" href="<?= $social["url"] ?>"><img src="<?= $social["icono"]["url"] ?>" alt=""></a></li>
                <?php endforeach; ?>
              </ul>
            </button>

            <button id="icon_bars" class="button button_small">
              <i class="text-white icon-bars hover-white"></i>
            </button>

          </div>

        </nav>

        <div class="search_modal_form">
          <button class="button button-cuadro button_abs">x</button>
          <div class="search_modal_form_wrap">
            <?php
              if ($isEs) {
                $suffix = "es";
              } else {
                $suffix = "en";
              }
              $placeholder = get_field("campo_buscar_-_" . $suffix, "option");
              $search = get_field("boton_enviar_-_" . $suffix, "option");


              ?>
            <form action="<?php echo home_url() ?>">
              <div class="field">
                <input name="s" placeholder="<?php echo $placeholder; ?>" type="text" class="text">
              </div>
              <div class="field">
                <button type="submit" class="button general_button text-white"><span data-title="<?php echo $search; ?>"><?php echo $search; ?></span></button>
              </div>
            </form>
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

                    <?php foreach ($navDyn as $navDeep) : ?>
                      <a href="<?php echo esc_url(get_term_link($navDeep, "categoria")); ?>">
                        <div class="dynamic_image_single left_to_right_container">
                          <div class="dynamic_image_container ">
                            <img class="img_fill left" src="<?php echo get_field("imagen", $navDeep)["sizes"]["medium"] ?>" alt="">
                            <img class="img_fill right" src="<?php echo get_field("imagen", $navDeep)["sizes"]["medium"] ?>" alt="">
                          </div>
                          <div class="dynamic_image_text">
                            <?php echo $navDeep->name ?>
                          </div>
                        </div>
                      </a>
                    <?php endforeach; ?>
                    <!-- <div class="dynamic_image_single left_to_right_container">
                      <div class="dynamic_image_container ">
                        <img class="img_fill left" src="<?php bloginfo("template_url") ?>/images/interna/image10.jpg" alt="">
                        <img class="img_fill right" src="<?php bloginfo("template_url") ?>/images/interna/image10.jpg" alt="">
                      </div>
                      <div class="dynamic_image_text">
                        Superfice
                      </div>
                    </div>
                    <div class="dynamic_image_single left_to_right_container">
                      <div class="dynamic_image_container ">
                        <img class="img_fill left" src="<?php bloginfo("template_url") ?>/images/interna/image9.jpg" alt="">
                        <img class="img_fill right" src="<?php bloginfo("template_url") ?>/images/interna/image9.jpg" alt="">
                      </div>
                      <div class="dynamic_image_text">
                        Techos
                      </div>
                    </div>
                    <div class="dynamic_image_single left_to_right_container">
                      <div class="dynamic_image_container ">
                        <img class="img_fill left" src="<?php bloginfo("template_url") ?>/images/interna/image8.jpg" alt="">
                        <img class="img_fill right" src="<?php bloginfo("template_url") ?>/images/interna/image8.jpg" alt="">
                      </div>
                      <div class="dynamic_image_text">
                        Alineaciones
                      </div>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>


        </div>

      </header>

    <?php } ?>