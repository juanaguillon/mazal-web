<?php

/**
 * Mostrar una seccion de contenido simple.
 * @param String $id_container ID HTML para la sección
 * @param String $title Titulo de la sección
 * @param Sring $description Descripcion de la sección.
 * @param Sring $image Imagen que se mostrará que estará internamente en la carpeta images/interna/
 * @param Boolean $in_right ¿El título, descripción y botón se mostrará a el lado derecho en modo escritorio?
 * @param Array $button Botón de sección Arra("text" => "Texto de botón", "link"=> "Link de botón");
 */
function mazal_simple_content($term, $in_right = true)
{
  $image =  get_field("imagen", $term);
  $button = array(
    "link" => get_term_link($term),
    "text" => mazal_is_language() ? "Ver Más" : "See more"
  );

  ?>

  <section id="section_<?php echo $term->slug ?>" class="section_high tres60_section <?php if (!$in_right) echo "section_left" ?>" style="background-image: url(<?php echo $image["url"] ?>)">
    <div class="container-fluid p-0 h-100">
      <div class="row no-gutters h-100">
        <div class="col-md-6 tres60_container wow fadeInDown <?php if ($in_right) echo "offset-md-6" ?>">
          <div class="tres_60_white_wrap">
            <div class="tres60_title_container">
              <h3 class="font-2 text-regular blanco"><?php echo mb_strtoupper($term->name, "UTF-8"); ?></h3>
            </div>
            <p><?php echo $term->description ?></p>
            <div class="tres60_button_container">
              <a href="<?php echo $button["link"] ?>" class="button general_button text-yellow mt-4">
                <span data-title="<?php echo $button["text"] ?>"><?php echo $button["text"] ?></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php }

/**
 * Mostrar una subcategoría dentro de el diseño de "Subcategorías"
 *
 * @param $title Titulo de la línea
 * @param $description Descripción de la linea
 * @param $image Imagen que estará dentro de la carpeta images/interna
 * @return void
 */
function mazal_single_subcat($title, $description, $image, $link, $colNumber)
{
  ?>
  <div class="<?php echo $colNumber ?>">
    <a href="<?php echo $link ?>">

      <div class="single_linea_wrapper">
        <div class="single_linea_image">
          <img class="img_fill" src="<?php echo $image ?>" alt="">
        </div>
        <div class="single_linea_context">
          <h3><?php echo $title ?></h3>
          <p><?php echo $description ?></p>
        </div>
        <div class="single_linea_zoom">
          <i class="icon-new-tab"></i>
        </div>
      </div>
    </a>

  </div>

<?php
}

/**
 * Mostrar diseño de "subcategorías"
 *
 * @param string $taxonomy Taxonomy Term
 * @param boolean $labelToLeft La etiqueta de la categoría irá a la izquierda?
 * @return void
 */
function mazal_subcat_content($taxonomy, $labelToLeft, $subcats)
{
  ?>
  <section id="section_<?php echo $taxonomy->slug ?>" class="section_high">
    <div class="container-fluid p-0">
      <div class="lineas_container">
        <?php if ($labelToLeft) {
            $classContainer = "row_linea_container_left";
          } else {
            $classContainer = "row_linea_container_right";
          }
          ?>

        <?php if ($labelToLeft) : ?>
          <div class="linea_label left"><span><?php echo $taxonomy->name ?></span></div>
        <?php endif; ?>
        <div class="row no-gutters h-100 <?= $classContainer ?>">
          <?php
            $colNumber = "col-3";
            $countSub = count($subcats);
            if ($countSub == 1 || $countSub == 2) {
              $colNumber = "col-6";
            } else if ($countSub == 3) {
              $colNumber = "col-4";
            }
            foreach ($subcats as $subcat) :
              $minitext = get_field("minitexto", $subcat);
              $imagen = get_field("imagen", $subcat);
              $link = get_term_link($subcat);
              mazal_single_subcat($subcat->name, $minitext, $imagen["url"], $link, $colNumber);
            endforeach;
            ?>
        </div>
        <?php if (!$labelToLeft) : ?>
          <div class="linea_label right"><span><?php echo $taxonomy->name ?></span></div>
        <?php endif; ?>

      </div>
    </div>

  </section>

<?php
}

$terms = get_terms(array(
  "taxonomy" => "categoria",
  "parent" => 0,
  "hide_empty" => false
));


// Obtener el term id de la categoría dependiendo el idioma y la página actual
// printcode( $terms );
$dataFilter = null;

// Página Arquitectura
if (mazal_is_arquitectura_page()) {
  if (mazal_is_language()) {
    $dataFilter = 91;
  } else {
    $dataFilter = 97;
  }
}

// Página Corporativa
if (mazal_is_corporativo_page()) {
  if (mazal_is_language()) {
    $dataFilter = 93;
  } else {
    $dataFilter = 101;
  }
}

// Página Hogar
if (mazal_is_hogar_page()) {
  if (mazal_is_language()) {
    $dataFilter = 89;
  } else {
    $dataFilter = 99;
  }
}



$categoriesArr = get_terms(array(
  "taxonomy" => "categoria",
  "parent" => $dataFilter,
  "hide_empty" => false
));


foreach ($categoriesArr as $catID => $catVal) {
  $toRight = $catID % 2 === 0;

  if (get_field("diseno_", $catVal)  === "Diseño simple") {
    mazal_simple_content(
      $catVal,
      $toRight
    );
  } else {
    $childCats = get_terms(array(
      "parent" => $catVal->term_id,
      "taxonomy" => $catVal->taxonomy,
      "hide_empty" => false,
      "number" => 4
    ));
    mazal_subcat_content($catVal, $toRight, $childCats);
  }
}

?>