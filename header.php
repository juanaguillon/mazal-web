<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mazal</title>
  <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url') ?>/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,600,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/custom.min.css">


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


                /** Theme location o slug-menu de el menú actual, dependerá de la página en donde se esté navegando */



                // wp_nav_menu(array(
                //   "theme_location" => $menu,
                //   "walker" => new Mazal_Walker_Menu,
                //   'items_wrap' => '%3$s',
                //   "container" => ""
                // ));

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

                  if (mazal_is_language()) {
                    $linkID = pll_get_term($chLink, "en");
                  } else {
                    $linkID = pll_get_term($chLink, "es");
                  }
                  $link = get_term_link($linkID);
                } else {
                  $maxParent = new stdClass();
                  $maxParent->term_id = 0;
                }

                $directChilds = get_terms(array(
                  "taxonomy" => "categoria",
                  "parent" => $maxParent->term_id,
                  "hide_empty" => false
                ));

                if ($maxParent) :
                  foreach ($directChilds as $childNav) : ?>
                  <li class="<?php echo $childNav->slug ?>" data-dynamic="">
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

                <?php
                    endforeach;
                  endif;

                  if (!is_wp_error($link)) : ?>
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
            <button id="icon_search" class="button">
              <i class="icon-search text-white hover-white"></i>
            </button>
            <button id="icon_bars" class="button">
              <i class="text-white icon-bars hover-white"></i>
            </button>

          </div>

        </nav>

        <div class="search_modal_form">
          <button class="button button-cuadro">x</button>
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
          <div class="dynamic_data dynamic_data_1">
            <div class="row no-gutters">

              <div class="col-md-3">

                <p class="dynamyc_description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil dolor quasi aspernatur
                  unde, et molestiae.</p>
              </div>

              <div class="col-md-9">
                <div class="dynamic_images">
                  <div class="dynamic_image_single left_to_right_container">
                    <div class="dynamic_image_container ">
                      <img class="img_fill left" src="<?php bloginfo("template_url") ?>/images/interna/image11.jpg" alt="">
                      <img class="img_fill right" src="<?php bloginfo("template_url") ?>/images/interna/image11.jpg" alt="">
                    </div>
                    <div class="dynamic_image_text">
                      Muebles
                    </div>
                  </div>
                  <div class="dynamic_image_single left_to_right_container">
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
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Se mostrará en caso que se agregue el attr data-dynamic="dynamic_data_2" y class="has_dynamic" en el li del header -->
          <div class="dynamic_data dynamic_data_2">
            <div class="row no-gutters">

              <div class="col-md-3">
                <p class="dynamyc_description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil dolor quasi aspernatur unde, et molestiae.</p>
              </div>
              <div class="col-md-9">
                <div class="dynamic_images">
                  <div class="dynamic_image_single left_to_right_container">
                    <div class="dynamic_image_container ">
                      <img class="img_fill left" src="<?php bloginfo("template_url") ?>/images/interna/image7.jpg" alt="">
                      <img class="img_fill right" src="<?php bloginfo("template_url") ?>/images/interna/image7.jpg" alt="">
                    </div>
                    <div class="dynamic_image_text">
                      Muebles
                    </div>
                  </div>
                  <div class="dynamic_image_single left_to_right_container">
                    <div class="dynamic_image_container ">
                      <img class="img_fill left" src="<?php bloginfo("template_url") ?>/images/interna/image6.jpg" alt="">
                      <img class="img_fill right" src="<?php bloginfo("template_url") ?>/images/interna/image6.jpg" alt="">
                    </div>
                    <div class="dynamic_image_text">
                      Superfice
                    </div>
                  </div>
                  <div class="dynamic_image_single left_to_right_container">
                    <div class="dynamic_image_container ">
                      <img class="img_fill left" src="<?php bloginfo("template_url") ?>/images/interna/image5.jpg" alt="">
                      <img class="img_fill right" src="<?php bloginfo("template_url") ?>/images/interna/image5.jpg" alt="">
                    </div>
                    <div class="dynamic_image_text">
                      Techos
                    </div>
                  </div>
                  <div class="dynamic_image_single left_to_right_container">
                    <div class="dynamic_image_container ">
                      <img class="img_fill left" src="<?php bloginfo("template_url") ?>/images/interna/image4.jpg" alt="">
                      <img class="img_fill right" src="<?php bloginfo("template_url") ?>/images/interna/image4.jpg" alt="">
                    </div>
                    <div class="dynamic_image_text">
                      Alineaciones
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </header>

    <?php } ?>