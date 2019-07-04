<?php

/**
 * Mostrar una seccion 360.
 * @param String $id_container ID HTML para la sección
 * @param String $title Titulo de la sección
 * @param Sring $description Descripcion de la sección.
 * @param Sring $image Imagen que se mostrará que estará internamente en la carpeta images/interna/
 * @param Boolean $in_right ¿El título, descripción y botón se mostrará a el lado derecho en modo escritorio?
 * @param Array $button Botón de sección Arra("text" => "Texto de botón", "link"=> "Link de botón");
 */
function single_360_content($id_container, $title, $description, $image, $in_right = true, $button = array())
{
  if (empty($button)) {
    $button = array(
      "text" => "Ver más",
      "link" => "#"
    );
  }
  ?>

  <section id="<?php echo $id_container ?>" class="section_high tres60_section <?php if (!$in_right) echo "section_left" ?>" style="background-image: url(<?php bloginfo("template_url") ?>/images/interna/<?php echo $image ?>)">
    <div class="container-fluid p-0 h-100">
      <div class="row no-gutters h-100">
        <!-- <div class="col-md-6 tres60_container">
                                        <div class="tres60_wrap_single left">
                                        </div>
                                      </div> -->
        <div class="col-md-6 tres60_container wow fadeInDown <?php if ($in_right) echo "offset-md-6" ?>">
          <div class="tres_60_white_wrap">
            <div class="tres60_title_container">
              <h3 class="font-2 text-regular text-dark-gray"><?php echo mb_strtoupper($title, "UTF-8"); ?></h3>
            </div>
            <p><?php echo $description ?></p>
            <div class="tres60_button_container">
              <a href="<?php echo $button["link"] ?>" class="button general_button button_dark text-yellow mt-4">
                <span data-title="<?php echo $button["text"] ?>"><?php echo $button["text"] ?></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php } ?>

<?php
if (mazal_is_arquitectura_page()) :
  // Seccion Diseo Interior
  single_360_content(
    "section_lineas1",
    "Diseño Interior",
    "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique corrupti consequuntur odit mollitia soluta at!",
    "image3.jpg",
    false
  );
  // Seccion Arquitectura
  single_360_content(
    "section_tres60",
    "Arquitectura",
    "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique corrupti consequuntur odit mollitia soluta at!",
    "image23.jpg"
  );

  // Sección Arqitectura Sostenible
  single_360_content(
    "section_arq_sos",
    "Arquitectura Sostenible",
    "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique corrupti consequuntur odit mollitia soluta at!",
    "image10.jpg",
    false
  );

  // Sección Obra Nueva
  single_360_content(
    "section_obra_nueva",
    "Obra Nueva",
    "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique corrupti consequuntur odit mollitia soluta at!",
    "image19.jpg"
  );
endif;
?>

<?php
if (mazal_is_hogar_page()) :
  // Sección Clásico
  single_360_content(
    "section_arq_sos",
    "Clásico",
    "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique corrupti consequuntur odit mollitia soluta at!",
    "image15.jpg"
  );

endif;
?>


<?php
if (mazal_is_corporativo_page()) :
  // Sección Constructoras
  single_360_content(
    "section_constructoras",
    "Constructoras",
    "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique corrupti consequuntur odit mollitia soluta at!",
    "image15.jpg"
  );
  // Seccion Oficinas
  single_360_content(
    "section_oficinas",
    "Oficinas",
    "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique corrupti consequuntur odit mollitia soluta at!",
    "image3.jpg",
    false
  );
  // Seccion Holetes
  single_360_content(
    "section_hoteles",
    "Holetes",
    "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique corrupti consequuntur odit mollitia soluta at!",
    "image23.jpg"
  );

  // Sección Arqitectura Sostenible
  single_360_content(
    "section_centry_commercial",
    "Centros Comerciales",
    "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique corrupti consequuntur odit mollitia soluta at!",
    "image10.jpg",
    false
  );

  // Sección Obra Nueva
  single_360_content(
    "section_restaurantes",
    "Restaurantes",
    "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique corrupti consequuntur odit mollitia soluta at!",
    "image19.jpg"
  );

endif;
?>