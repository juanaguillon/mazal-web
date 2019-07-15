<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mazal</title>
  <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url') ?>/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,700|Lato:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/custom.min.css">
</head>

<body class="<?php if (is_front_page()) echo "index_body_class" ?>">

  <main id="main_interna">

    <?php
    if (is_front_page() || is_page(7)) {
      get_template_part("contents/content", "header_index");
    } else {

      if (mazal_is_hogar_page()) {
        $ulList = array(
          "lineas1" => array(
            "text" => "Carpintería",
            "has_dynamic" => true,
            "dynamic" => "dynamic_data_1"
          ),
          "lineas2" => array(
            "text" => "Mobiliario",
            "has_dynamic" => true,
            "dynamic" => "dynamic_data_2"
          ),
          "tres60" => "Clásico",
          "portafolio" => "Proyectos",
          "clientes" => "Clientes",
          "contacto" => "Contacto",
        );
      } else if (mazal_is_arquitectura_page()) {


        $ulList = array(
          "lineas1" => "Diseño Interior",
          "tres60" => "Arquitectura",
          "arq_sos" => "Arq. Sostenible",
          "obra_nueva" => "Obra Nueva",
          "before_after" => "Remodelación",
          "clientes" => "Clientes",
          "contacto" => "Contacto",
        );
      } else if (mazal_is_corporativo_page()) {
        $ulList = array(
          "constructoras" => "Constructoras",
          "oficinas" => "Oficinas",
          "hoteles" => "Hoteles",
          "centry_commercial" => "Centros Comerciales",
          "restaurantes" => "Restaurantes",
          "clientes" => "Clientes",
          "contacto" => "Contacto",
        );
      }
      ?>

      <header>
        <div class="black_background"></div>
        <nav class="header_top">
          <div class="header_top_left">
            <div class="menu_logo_li">
              <h1 class="menu_logo">
                <a class="text-white" href="<?php echo home_url() ?>">
                  <i class="icon-logo"></i>
                </a>
              </h1>
            </div>

          </div>
          <div class="header_top_right flex-center-xy">
            <ul class="header_top_list">

              <?php foreach ($ulList as $kli => $li) : ?>

                <?php
                $className = $kli;
                if (is_array($li)) $className .= " has_dynamic";
                ?>

                <li class="<?php echo $className ?>" data-dynamic="<?php if (is_array($li)) echo $li["dynamic"] ?>">
                  <a class="text-white" data-scroll="<?php echo $kli ?>"><?php echo (is_array($li)) ? $li["text"] : $li ?></a>
                </li>
              <?php endforeach; ?>


              <li class="languages_header">

                <button class="button" id="language_en">
                  EN
                </button>
                <button class="button" id="language_es">
                  ES
                </button>
              </li>
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
            <form>
              <div class="field">
                <input placeholder="¿Qué Buscas?" type="text" class="text">
              </div>
              <div class="field">
                <button class="button general_button text-white"><span data-title="Buscar">Buscar</span></button>
              </div>
            </form>
          </div>

        </div>

        <div class="dynamic_header_top">
          <div class="dynamic_data dynamic_data_1">
            <div class="row no-gutters">

              <div class="col-md-3">
                <!-- <ul class="dynamic_list">
                                            <li>Videos</li>
                                            <li>Imágenes</li>
                                            <li>Galería</li>
                                            <li>Proyectos</li>
                                          </ul> -->
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
          <div class="dynamic_data dynamic_data_2">
            <div class="row no-gutters">

              <div class="col-md-3">
                <!-- <ul class="dynamic_list">
                                            <li>Videos</li>
                                            <li>Imágenes</li>
                                            <li>Galería</li>
                                            <li>Proyectos</li>
                                          </ul> -->
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