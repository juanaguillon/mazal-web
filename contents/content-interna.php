<section id="section_banner_intern" class="section_high">
  <div id="section_banner_carousel">
    <?php

    $bannerCategory = 0;

    if (mazal_is_hogar_page()) {
      $bannerCategory = pll_get_term(730);
    } else if (mazal_is_arquitectura_page()) {
      $bannerCategory = pll_get_term(725);
    } else if (mazal_is_corporativo_page()) {
      $bannerCategory = pll_get_term(734);
    }

    $banners = new WP_Query(array(
      "post_type" => "banner",
      "tax_query" => array(
        array(
          "taxonomy" => "banner_categoria",
          "terms" => $bannerCategory
        )
      )
    ));
    $bannerPosts = $banners->posts;
    foreach ($bannerPosts as $banner) :

      $url = get_term_link(get_field("link_banner", $banner), "categoria");
      $textoLink = get_field("texto_link_banner", $banner);
    ?>
      <div class="banner_item">
        <div class="banner_image">
          <img src="<?php echo get_field("imagen_banner", $banner) ?>" alt="">
        </div>
        <div class="banner_caption">
          <div class="banner_caption_inner">
            <h3 class="text-yellow font-1"><?php echo mb_strtoupper($banner->post_title, "UTF-8") ?></h3>
            <p class="text-white font-2"><?php echo $banner->post_excerpt ?></p>
            <a href="<?php echo $url ?>" class="button general_button button-m mt-3 ml-0">
              <span data-title="<?php echo $textoLink ?>"><?php echo $textoLink ?></span>
            </a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

  </div>
  <!-- <div class="banner_navigation_buttons">
    <button class="button" id="banner_nav_prev"><i class="icon-arrow_left"></i></button>
    <button class="button" id="banner_nav_next"><i class="icon-arrow_right"></i></button>
  </div> -->
  <div class="banner_caption_v2">
    <div class="banner_caption_inner">
      <h3 class="text-yellow font-1"><?php echo mb_strtoupper($banner->post_title, "UTF-8") ?></h3>
      <p class="text-white font-2"><?php echo $banner->post_excerpt ?></p>
      <a href="<?php echo $url ?>" class="button general_button button-m mt-3 ml-0">
        <span data-title="<?php echo $textoLink ?>"><?php echo $textoLink ?></span>
      </a>
    </div>
  </div>
</section>


<section id="section_galeria" class="section_high">
  <div class="container">
    <div class="row flex-md-row flex-column-reverse">
      <div class="col-md-7 wow slideInLeft" data-wow-offset="20">
        <div class="mansory-gallery">

          <div class="columna-1">
            <div class="mansory-item uno">
              <img src="https://mazal.co/wp-content/uploads/2019/11/13-2_900x600_acf_cropped.jpg?v=1576681969" alt="">
            </div>
            <div class="mansory-item dos">
              <img src="https://mazal.co/wp-content/uploads/2019/11/72045331_1684827818318490_5113012670143922176_n.jpg?v=1576682307" alt="">
            </div>
          </div>
          <div class="columna-2">
            <div class="mansory-item tres">
              <img src="https://mazal.co/wp-content/uploads/2019/11/aa.jpg?v=1576682176" alt="">
            </div>
            <div class="mansory-item cuatro">
              <img src="https://mazal.co/wp-content/uploads/2020/01/home.jpeg" alt="">
            </div>
          </div>

        </div>


      </div>
      <div class="col-md-5 wow slideInRight short-descripcion-nosotros d-flex align-items-center" data-wow-offset="20">
        <?php

        // Quienes | Somos
        $titleQuienes = explode(" | ", mazal_get_acf_field("quienes_titulo_")); // [0 => "Quienes",1 => "Somos"]
        ?>
        <div>
        <div class="galeria_title_container no_rotate">

          <h3 class="font-1 text-yellow text-light uppercase"><span><?php echo $titleQuienes[0] ?></span><br><?php echo $titleQuienes[1] ?></h3>

          </div>
          <p class="galeria_description font-2 text-regular no_rotate">
          <?php echo mazal_get_acf_field("quienes_texto_") ?>

          </p>
          <?php

          if (mazal_is_language()) {
          $buttonNosot = "Ver más";
          } else {
          $buttonNosot = "See more";
          }

        if (mazal_is_arquitectura_page()) {
          $postNosotros = esc_url(get_permalink(pll_get_post(877))) . "?subsection=arq";
        } else if (mazal_is_corporativo_page()) {
          $postNosotros = esc_url(get_permalink(pll_get_post(884))) . "?subsection=corp";
        } else if (mazal_is_hogar_page()) {
          $postNosotros = esc_url(get_permalink(pll_get_post(884))) . "?subsection=hogar";
        }

        ?>
        <a href="<?php echo $postNosotros; ?>" class="button button_dark general_button font-2" style="margin:initial;">
          <span class="text-black"><?php echo $buttonNosot ?></span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- <section id="section_galeria" class="section_high">
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
        <?php
        $titleQuienes = explode(" | ", mazal_get_acf_field("quienes_titulo_")); // [0 => "Quienes",1 => "Somos"]
        ?>
        <div class="galeria_title_container">

          <h3 class="font-2 text-yellow text-light uppercase"><span><?php echo $titleQuienes[0] ?></span><br><?php echo $titleQuienes[1] ?></h3>

        </div>
        <p class="galeria_description font-1 text-light">
          <?php echo mazal_get_acf_field("quienes_texto_") ?>
        </p>
      </div>
    </div>
  </div>
</section> -->

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
      <h3 class="text-center wow slideInDown font-1 text-light text-dark-gray">
        <?php echo mazal_get_acf_field("antesdes_titulo_") ?>
      </h3>
    </div>

    <div class="row no-gutters">
      <?php
      $antesDesQuery = new WP_Query(array(
        "post_type" => "before_after",
        "posts_per_page" => -1
      ));
      $antesDesImg = $antesDesQuery->posts;
      ?>
      <div class="col-lg-1 col-md-12 col-sm-12 ">
        <div class="bef_aft_images_container">
          <div class="arrow_up arrows"><i class="icon-arrow_up"></i></div>
          <div class="bef_aft_images_gallery">
            <?php foreach ($antesDesImg as $imgs) : ?>

              <div class="bef_aft_image_photo">
                <img data-tb="<?= get_field("bef_aft_descripcion", $imgs) ?>" data-before="<?php echo get_field("imagen_antigua", $imgs)["sizes"]["large"] ?>" data-after="<?php echo get_field("imagen_nueva", $imgs)["sizes"]["large"] ?>" class="img_fill" src="<?php echo get_field("imagen_nueva", $imgs)["sizes"]["medium"] ?>" alt="">
              </div>
            <?php endforeach; ?>
          </div>
          <div class="arrow_down arrows"><i class="icon-arrow_down"></i></div>
        </div>
      </div>
      <div class="col-lg-11 wow slideInRight">
        <?php
        $oldImg = get_field("imagen_antigua", $antesDesImg[0]);
        $newimg = get_field("imagen_nueva", $antesDesImg[0]);
        $descImg = get_field("bef_aft_descripcion", $antesDesImg[0]);
        ?>
        <div class="bf_image_sized">
          <img src="<?php echo $oldImg["sizes"]["large"] ?>" alt="">
          <img src="<?php echo $newimg["sizes"]["large"] ?>" alt="">
        </div>
        <div class="bef_aft_sides">
          <div class="bef_aft_left_side wow slideInLeft">
            <div class="bef_aft_descriptions_container flex-center-xy text-gray">
              <p id="bef_aft_before" class="font-2"><?php echo $descImg ?></p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

</section>

<section id="section_portafolio" class="section_high">

  <?php
  $permalinkTerm = null;

  if (mazal_is_hogar_page()) {
    $permalinkTerm = 89;
  } else if (mazal_is_arquitectura_page()) {
    $permalinkTerm = 91;
  } else if (mazal_is_corporativo_page()) {
    $permalinkTerm = 93;
  }
  if (mazal_is_language("en")) {
    $permalinkTerm = pll_get_term($permalinkTerm, "en");
  }

  $postsRelatives = new WP_Query(array(
    "post_type" => "producto",
    "posts_Per_page" => 4,
    "orderby" => "rand",

    "tax_query" => array(
      array(
        "taxonomy" => "categoria",
        "terms" => $permalinkTerm
      ),
    )
  ));

  if (count($postsRelatives->posts) > 3) {
    $prpf1 = $postsRelatives->posts[0];
    $prpf2 = $postsRelatives->posts[1];
    $prpf3 = $postsRelatives->posts[2];
    $prpf4 = $postsRelatives->posts[3];
  } else {
    $projectsPfolio =  get_field("portafolio_-_mostrar_proyectos", "option");
    $prpf1 = $projectsPfolio[0]["proyecto"];
    $prpf2 = $projectsPfolio[1]["proyecto"];
    $prpf3 = $projectsPfolio[2]["proyecto"];
    $prpf4 = $projectsPfolio[3]["proyecto"];
  }



  function mazal_send_portfolio($post)
  {
    ob_start();
  ?>
    <a href="<?php echo esc_url(get_permalink($post)); ?>">
      <div class="portafolio_single_image">
        <img class="img_fill" src="<?php echo get_field("imagen_de_producto", $post)["sizes"]["large"] ?>" alt="">
        <div class="black_background"></div>
        <div class="portafolio_mazal_logo">
          <figure>
            <img src="<?php bloginfo("template_url") ?>/images/icons/logo_min.svg" alt="">
          </figure>
        </div>
        <div class="portafolio_single_image_context">
          <h3 class="font-1"><?php echo $post->post_title ?></h3>
          <p><?php
              $catsOfPortfolio = get_the_terms($post, "categoria");
              $counterTerms = count($catsOfPortfolio);
              if ($counterTerms > 1) {
                $counterTerms = $counterTerms - 1;
              }
              $randNumber = rand(0, $counterTerms);
              echo $catsOfPortfolio[$randNumber]->name;
              ?></p>
        </div>
      </div>
    </a>

  <?php
    return ob_get_clean();
  }

  ?>
  <div class="row no-gutters flex-lg-row ">
    <div class="col-md-7 col-lg-9">

      <div class="row no-gutters images-portfolio">
        <div class="col_portfolio col-lg-8 col-md-12 wow fadeInLeft">
          <?php echo mazal_send_portfolio($prpf1) ?>
        </div>
        <div class="col_portfolio col-lg-4 col-md-6 wow fadeInDown">
          <?php echo mazal_send_portfolio($prpf2) ?>
        </div>
        <div class="col_portfolio col-lg-4 col-md-6 wow fadeInLeft">
          <?php echo mazal_send_portfolio($prpf3) ?>
        </div>
        <div class="t-none col_portfolio col-lg-8 col-md-6 wow fadeInUp">
          <?php echo mazal_send_portfolio($prpf4) ?>
        </div>
      </div>


    </div>
    <div class="col-md-5 col-lg-3 wow fadeInRight">
      <div class="portafolio_show_more_wrap">
        <div class="black_background"></div>
        <img class="portfolio_show_more_image h-100 w-init" src="<?php bloginfo("template_url") ?>/images/interna/image7.jpg" alt="">
        <div class="portafolio_show_more_content">
          <div class="portafilio_title">
            <h3 class="text-yellow font-1 capitalize text-light">
              <?php echo mb_strtoupper(strtolower(mazal_get_acf_field("portafolio_titulo_")), "UTF-8") ?>
            </h3>
          </div>
          <div class="portafolio_button">


            <a href="<?php echo esc_url(get_term_link($permalinkTerm)) ?>" class="button general_button text-yellow">
              <span data-title="<?php echo mazal_get_acf_field("portafolio_boton_") ?>"><?php echo mazal_get_acf_field("portafolio_boton_") ?>
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>


</section>


<section id="section_clientes" class="section wow fadeIn" data-wow-offset="40" data-wow-delay="0.5s">
  <div class="container">
    <?php if (mazal_is_language()) : ?>
      <h3 class="text-center mb-4 font-1 text-light text-dark-gray">CLIENTES</h3>
    <?php else : ?>
      <h3 class="text-center mb-4 font-1 text-light text-dark-gray">CUSTOMERS</h3>
    <?php endif; ?>
    <ul class="clietes_list">
      <?php
      $clientesQ = new WP_Query(array(
        "post_type" => "cliente",
        "posts_per_page" => -1
      ));
      foreach ($clientesQ->posts as $client) : ?>
        <li><img src="<?php echo get_the_post_thumbnail_url($client, "full") ?>" alt="<?php echo esc_attr($client->post_title) ?>"></li>
      <?php endforeach; ?>

    </ul>
  </div>
</section>
<?php get_template_part("contents/content", "contact_map"); ?>