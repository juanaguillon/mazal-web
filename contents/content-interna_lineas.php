<?php

/**
 * Crear una nueva linea.
 * @param $title Titulo de la línea
 * @param $description Descripción de la linea
 * @param $image Imagen que estará dentro de la carpeta images/interna
 */
function single_linea($title, $description, $image)
{
  ?>
  <div class="col-md-3">
    <div class="single_linea_wrapper">
      <div class="single_linea_image">
        <img class="img_fill" src="<?php bloginfo("template_url") ?>/images/interna/<?php echo $image ?>" alt="">
      </div>
      <div class="single_linea_context">
        <h3><?php echo $title ?></h3>
        <p><?php echo $description ?></p>
      </div>
      <div class="single_linea_zoom">
        <i class="icon-search"></i>
      </div>
    </div>
  </div>
<?php
}
?>

<?php if (mazal_is_hogar_page()) : ?>

  <section id="section_lineas1" class="section_high">
    <div class="container-fluid p-0">
      <div class="lineas_container">
        <div class="linea_label left"><span>CARPINTERÍA</span></div>
        <div class="row no-gutters h-100 row_linea_container_left">
          <?php single_linea("Cocina", "Lorem, ipsum dolor.", "image9.jpg") ?>
          <?php single_linea("Closets", "Lorem, ipsum dolor.", "image8.jpg") ?>
          <?php single_linea("Muebles", "Lorem, ipsum dolor.", "image7.jpg") ?>
          <?php single_linea("Puertas", "Lorem, ipsum dolor.", "image6.jpg") ?>
        </div>

      </div>
    </div>

  </section>

  <section id="section_lineas2" class="section_high">
    <div class="container-fluid p-0">

      <div class="lineas_container">
        <div class="row no-gutters h-100 row_linea_container_right">
          <?php single_linea("Sala", "Lorem, ipsum dolor.", "image13.jpg") ?>
          <?php single_linea("Comedor", "Lorem, ipsum dolor.", "image12.jpg") ?>
          <?php single_linea("Habitación", "Lorem, ipsum dolor.", "image11.jpg") ?>
          <?php single_linea("Studio", "Lorem, ipsum dolor.", "image10.jpg") ?>

        </div>
        <div class="linea_label right"><span>MOBILIARIO</span></div>
      </div>
    </div>
  </section>

<?php endif; ?>

<?php if (mazal_is_arquitectura_page()) : ?>

  <!-- <section id="section_lineas1" class="section_high">
          <div class="container-fluid p-0">
            <div class="lineas_container">
              <div class="linea_label left"><span>DISEÑO INTERIOR</span></div>
              <div class="row no-gutters h-100 row_linea_container_left">
                <?php single_linea("Muebles", "Lorem, ipsum dolor.", "image11.jpg") ?>
                <?php single_linea("Superficie", "Lorem, ipsum dolor.", "image10.jpg") ?>
                <?php single_linea("Techos", "Lorem, ipsum dolor.", "image9.jpg") ?>
                <?php single_linea("Alineaciones", "Lorem, ipsum dolor.", "image8.jpg") ?>
              </div>

            </div>
          </div>

        </section> -->

<?php endif; ?>