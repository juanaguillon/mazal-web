<?php
/* Template Name: Quienes somos */
get_header();
?>

<section class="quienes-somos-page section_high">

  <div class="container-fluid p-0">

    <div class="row full-height m-0">

      <div class="col-md-5 col-lg-7 p-0">
        <?php
        $idurl = 11;
        if (isset($_GET["subsection"])) {
          $subsection = $_GET["subsection"];
          switch ($subsection) {
            case 'arq':
              $idurl = 11;
              break;
            case 'corp':
              $idurl = 25;
              break;
            case 'hogar':
              $idurl = 9;
              break;

            default:
              $idurl = 11;
              break;
          }
        }
        $url = esc_url(get_permalink(pll_get_post($idurl)));

        ?>
        <div class="desc-nosotros-img" style="background-image:url(<?= get_field("imagen_quienes_somos")["sizes"]["large"] ?>);">
        </div>
      </div>
      <div class="col-md-7 col-lg-5 p-0 d-flex align-items-center justify-content-center">
        <div class="categoria-contenedor desc-nosotros">
          <div class="direccion-back">
            <a href="<?= $url ?>" class="button add">
              <i class="icon-arrow_left"></i>
            </a>
            <?php
            if (mazal_is_language("es")) {
              $atras = "Atrás";
            } else {
              $atras = "Back";
            }
            echo $atras;
            ?>
          </div>
          <div class="tres60_title_container">
           
            <h3 class="font-1 text-light text-dark-gray">
              <?= get_field("titulo_quienes_somos") ?>
            </h3>
          </div>
          <p>
            <?php the_field('quienes_somos_texto'); ?>
          </p>
        </div>
      </div>

    </div>
    <div class="row full-height m-0">
      <div class="col-md-7 col-lg-5 p-0 d-flex align-items-center justify-content-center" style="background-color:#201818;">
        <div class="categoria-contenedor desc-nosotros">
          <div class="tres60_title_container">
            <h3 class="font-1 text-light blanco">
              <?= get_field("titulo_quien_trabajamos") ?>
            </h3>
          </div>
          <p class="text-white">
            <?php the_field('con_quien_trabajamos'); ?>
          </p>
        </div>
      </div>
      <div class="col-md-5 col-lg-7 p-0">
        <div class="row no-gutters flex-lg-row flex-column-reverse ">
          <div class="col-lg-12 p-0">

            <div class="row no-gutters seccion-trabajamoscon" id="con_quien_trabajamos">
              <?php
              $galeriaTrabajamos = get_field("imagenes_quienes_trabajamos");

              ?>
              <div class=" col-md-12 col-sm-6 col-12 col-lg-12 wow fadeInDown animated animated animated animated img-work animated" style="visibility: visible; animation-name: fadeInDown;">
                <div class=" portafolio_single_image" style="overflow: hidden; position: relative;">
                  <a class="trabajamos_con" href="<?= $galeriaTrabajamos[0]["url"] ?>">
                    <img class="img_fill w-100" src="<?= $galeriaTrabajamos[0]["sizes"]["large"] ?>" alt="" style="position: absolute; ">
                  </a>
                </div>
              </div>
              <div class=" col-md-12 col-sm-6 col-12 col-lg-12 wow fadeInLeft animated animated animated animated img-work animated" style="visibility: visible; animation-name: fadeInLeft;">
                <div class=" portafolio_single_image" style="overflow: hidden; position: relative;">
                  <a class="trabajamos_con" href="<?= $galeriaTrabajamos[1]["url"] ?>">
                    <img class="img_fill w-100" src="<?= $galeriaTrabajamos[1]["sizes"]["large"] ?>" alt="" style="position: absolute; ">
                  </a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="row full-height historia-quienes-somos m-0">

      <div class="col-md-5 col-lg-7 p-0 h-100">
        <div class="row no-gutters h-100 " id="quienes_somos_lg">

          <?php
          function printHistoryImage($image)
          {
          ?>
            <div class="portafolio_single_image" style="overflow: hidden; position: relative;">
              <a class="quienes_somos_link" href="<?= $image["url"] ?>">
                <img class="img_fill" src="<?= $image["sizes"]["large"] ?>" alt="" style="position: absolute; width: auto; height: 346.6px; top: 0px; left: -49.7009px;">
              </a>
            </div>
          <?php
          }
          $histriaImages = get_field("imagenes_historia");
          ?>

          <div class=" col-lg-6 col-md-12 col-sm-6 col-12 wow fadeInLeft animated" style=" visibility: visible; animation-name: fadeInLeft;">
            <?php printHistoryImage($histriaImages[0]) ?>
          </div>
          <div class=" col-lg-6 col-md-12 col-sm-6 col-12 wow fadeInDown animated" style=" visibility: visible; animation-name: fadeInDown;">
            <?php printHistoryImage($histriaImages[1]) ?>
          </div>
          <div class=" col-lg-6 col-md-12 col-sm-6 col-12 wow fadeInLeft animated " style=" visibility: visible; animation-name: fadeInLeft;">
            <?php printHistoryImage($histriaImages[2]) ?>
          </div>
          <div class=" col-lg-6 col-md-12 col-sm-6 col-12 wow fadeInUp animated " style=" visibility: visible; animation-name: fadeInUp;">
            <?php printHistoryImage($histriaImages[3]) ?>
          </div>
        </div>
      </div>
      <div class="col-md-7 col-lg-5 p-0 d-flex align-items-center justify-content-center">
        <div class="categoria-contenedor desc-nosotros">
          <div class="tres60_title_container">
            <h3 class="font-1 text-light text-dark-gray">
              <?= get_field("titulo_nuestra_historia") ?>
            </h3>
          </div>
          <p>
            <?php the_field('nuestra_historia'); ?>
          </p>
        </div>
      </div>

    </div>
  </div>
</section>
<?php get_footer(); ?>