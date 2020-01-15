<?php
/* Template Name: Quienes somos */
get_header();
?>

<section class="quienes-somos-page section_high">
  <div class="container-fluid p-0">
    <div class="row full-height m-0">

      <div class="col-md-5 col-lg-7 p-0">
        <div class="desc-nosotros-img">

        </div>
      </div>
      <div class="col-md-7 col-lg-5 p-0 d-flex align-items-center justify-content-center">
        <div class="categoria-contenedor desc-nosotros">
          <div class="tres60_title_container">
            <?php

            if (mazal_is_language("es")) {
              $quienesSOmos = "QUIENES SOMOS";
              $trabajamos = "CON QUIEN TRABAJAMOS";
              $historia = "NUESTRA HISTORIA";
            }
            ?>
            <h3 class="font-1 text-light text-dark-gray">
              <?= $quienesSOmos ?>
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
              <?= $trabajamos ?>
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
              <div class=" col-md-12 col-sm-6 col-12 col-lg-12 wow fadeInDown animated animated animated animated img-work animated" style="visibility: visible; animation-name: fadeInDown;">
                <div class=" portafolio_single_image" style="overflow: hidden; position: relative;">
                  <a class="trabajamos_con" href="https://mazal.co/wp-content/themes/mazal/images/interna/home.jpg">
                    <img class="img_fill w-100" src="https://mazal.co/wp-content/themes/mazal/images/interna/home.jpg" alt="" style="position: absolute; ">
                  </a>
                </div>
              </div>
              <div class=" col-md-12 col-sm-6 col-12 col-lg-12 wow fadeInLeft animated animated animated animated img-work animated" style="visibility: visible; animation-name: fadeInLeft;">
                <div class=" portafolio_single_image" style="overflow: hidden; position: relative;">
                  <a class="trabajamos_con" href="https://mazal.co/wp-content/themes/mazal/images/interna/sofa.jpg">
                    <img class="img_fill w-100" src="https://mazal.co/wp-content/themes/mazal/images/interna/sofa.jpg" alt="" style="position: absolute; ">
                  </a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="row full-height historia-quienes-somos m-0">

      <div class="col-md-5 col-lg-7 p-0">
        <div class="row no-gutters h-100" id="quienes_somos_lg">
          <div class=" col-lg-6 col-md-12 col-sm-6 col-12 wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">
            <div class="portafolio_single_image" style="overflow: hidden; position: relative;">
              <a class="quienes_somos_link" href="https://mazal.co/wp-content/uploads/2019/11/d_720x460_acf_cropped-1.jpg?v=1576681982"><img class="img_fill" src="https://mazal.co/wp-content/uploads/2019/11/d_720x460_acf_cropped-1.jpg?v=1576681982" alt="" style="position: absolute; width: auto; height: 346.6px; top: 0px; left: -49.7009px;"></a>
            </div>
          </div>
          <div class=" col-lg-6 col-md-12 col-sm-6 col-12 wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
            <div class="portafolio_single_image" style="overflow: hidden; position: relative;">
              <a class="quienes_somos_link" href="https://mazal.co/wp-content/uploads/2019/11/l-631x1024.jpg?v=1576682137"><img class="img_fill" src="https://mazal.co/wp-content/uploads/2019/11/l-631x1024.jpg?v=1576682137" alt="" style="position: absolute; width: 443.1px; height: auto; top: -186.23px; left: 0px;"></a>
            </div>
          </div>
          <div class=" col-lg-6 col-md-12 col-sm-6 col-12 wow fadeInLeft animated " style="visibility: visible; animation-name: fadeInLeft;">
            <div class="portafolio_single_image" style="overflow: hidden; position: relative;">
              <a class="quienes_somos_link" href="https://mazal.co/wp-content/uploads/2019/11/v-1024x686.jpg?v=1576682105"><img class="img_fill" src="https://mazal.co/wp-content/uploads/2019/11/v-1024x686.jpg?v=1576682105" alt="" style="position: absolute; width: auto; height: 346.6px; top: 0px; left: -37.137px;"></a>
            </div>
          </div>
          <div class=" col-lg-6 col-md-12 col-sm-6 col-12 wow fadeInUp animated " style="visibility: visible; animation-name: fadeInUp;">
            <div class="portafolio_single_image" style="overflow: hidden; position: relative;">
              <a class="quienes_somos_link" href="https://mazal.co/wp-content/uploads/2019/11/e-1024x576.jpg?v=1576682163"><img class="img_fill" src="https://mazal.co/wp-content/uploads/2019/11/e-1024x576.jpg?v=1576682163" alt="" style="position: absolute; width: auto; height: 346.6px; top: 0px; left: -86.5363px;"></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-7 col-lg-5 p-0 d-flex align-items-center justify-content-center">
        <div class="categoria-contenedor desc-nosotros">
          <div class="tres60_title_container">
            <h3 class="font-1 text-light text-dark-gray">
              <?= $historia ?>
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