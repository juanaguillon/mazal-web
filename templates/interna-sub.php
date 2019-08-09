<?php

/**
 * Template Name: Interna subcategoria
 */
?>

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

<?php get_header(); ?>
<section class="banner-categoria">
<div>
   <h2 class="fw-4">Diseño interior</h2>
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto eum laboriosam, perferendis optio odit. Quasi incidunt amet, molestiae eius dolore dolorem, ipsam sunt fugiat magnam est architecto, enim voluptatibus rerum.
</div>
   
    <i class="icon-arrow_down"></i>
    
</section>
<!--<section class="bread-crumb">
    <ul>
        <li>Arquitectura</li>
        <li>Arquitectura</li>
        <li>Arquitectura</li>
        <li>Arquitectura</li>
    </ul>
    
</section>-->

<!--<section class="container-fluid contenido-proyectos">
   
   <h3 class="t-proyectos fw-4">Proyectos</h3>
   <div class="row">
       
   <div class="t-categoria col-md-2">
       <h4>Categoria</h4>
   </div>
   
   <div class="exp-proyectos col-md-10">
        <div class="row">    

            <div class="col-4">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, non. Vero cum iste fugit illum praesentium, beatae nihil expedita, quia voluptas.</p>
            </div>
            <div class="col-4">
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius distinctio quos at quidem quaerat laborum sequi! Itaque, nostrum assumenda .</p> 
            </div>
            <div class="col-4">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum aperiam totam pariatur? Ducimus, nobis eos ex? Voluptatibus non laboriosam, hic vero exce.</p>  
            </div>

        </div>
      
       
   </div>
       
   </div>
   
</section>-->
<section id="section_lineas1" class="projects-prev">
    <div class="container-fluid p-0">
      <div class="lineas_container projects-prev">
        <div class="linea_label left"><span>CARPINTERÍA</span></div>
        <div class="row no-gutters h-100 row_linea_container_left ">
          <?php single_linea("Cocina", "Lorem, ipsum dolor.", "image9.jpg") ?>
          <?php single_linea("Closets", "Lorem, ipsum dolor.", "image8.jpg") ?>
          <?php single_linea("Muebles", "Lorem, ipsum dolor.", "image7.jpg") ?>
          <?php single_linea("Puertas", "Lorem, ipsum dolor.", "image6.jpg") ?>
        </div>

      </div>
    </div>

  </section>

  <section id="section_lineas2" class="projects-prev">
    <div class="container-fluid p-0">

      <div class="lineas_container projects-prev">
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







<?php get_footer(); ?>