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
<section class="banner-categoria banner-interna">
<div class="">
   <h2 class="fw-4">CARPINTERÍA</h2>
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto eum laboriosam, perferendis optio odit. Quasi incidunt amet, molestiae eius dolore dolorem, ipsam sunt fugiat magnam est architecto, enim voluptatibus rerum.
</div>
   
    <div class="menu-page-interna">
      <ul>
        <li><a class="active" href="#">CARPINTERÍA</a></li>
        <li><a href="#">MOBILIARÍO</a></li>
        <li><a href="#">CLÁSICO</a></li>
      </ul>
    </div>
    
</section>

<section class="interna-descripcion">
  <h3>DESCRIPCIÓN</h3>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio sint enim sunt, laborum repudiandae ducimus perspiciatis totam corrupti saepe provident, earum rem modi! Sunt, voluptatibus cumque. Reiciendis laborum ipsam cum!Libero omnis voluptatibus magni soluta pariatur vero sapiente consequuntur nostrum cumque dolore aliquam ipsa deleniti dolor officia molestias, placeat impedit natus necessitatibus dolorem. Dignissimos atque blanditiis, illum aliquam voluptatibus ab.</p>
</section>

<section class="interna-categoria int-var-1">
<div class="interna-categoria-descripcion">
  <h4>COCINA</h4>
  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique atque tempora temporibus animi earum optio, explicabo numquam laborum velit praesentium vel voluptate perspiciatis labore vitae, dignissimos rem ab quae tenetur?</p>
  <button class="mt-5 button general_button text-yellow">
            <span class="text-yellow" data-title="Ver Galería">
              Ver Galería
            </span>
          </button>
</div>
<div class="interna-categoria-imagenes">
  <div class="contenido-imagen">
    <img src="<?php bloginfo("template_url") ?>/images/interna/image6.jpg" alt="">
  </div>
  <div class="contenido-imagen">
    <img src="<?php bloginfo("template_url") ?>/images/interna/image6.jpg" alt="">
  </div>
  <div class="contenido-imagen">
    <img src="<?php bloginfo("template_url") ?>/images/interna/image6.jpg" alt="">
  </div>
  <div class="contenido-imagen">
    <img src="<?php bloginfo("template_url") ?>/images/interna/image6.jpg" alt="">
  </div>
  
</div>
</section>









<?php get_footer(); ?>