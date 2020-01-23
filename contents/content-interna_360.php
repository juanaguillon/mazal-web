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
  if (mazal_is_language("en")) {
    $termES = pll_get_term($term->term_id, "es");
    $imageES = get_field("imagen", "categoria_" . $termES);
  } else {
    $imageES =  get_field("imagen", $term);
  }
  $button = array(
    "link" => get_term_link($term),
    "text" => mazal_is_language() ? "Ver más" : "See more"
  );

?>

  <section id="section_<?php echo $term->slug ?>" class="section_high tres60_section <?php if (!$in_right) echo "section_left contrast-seccion-white" ?>" style="background-image: url(<?php echo $imageES["sizes"]["large"] ?>)">
    <div class="container-fluid p-0 h-100">
      <div class="row no-gutters h-100">
        <div class="col-md-8 col-lg-6 tres60_container wow fadeInDown <?php if ($in_right) echo "offset-md-4 offset-lg-6" ?>">
          <div class="tres_60_white_wrap">
            <div class="categoria-contenedor">
              <div class="tres60_title_container">
                <h3 class="font-1 text-light blanco"><?php echo mb_strtoupper($term->name, "UTF-8"); ?></h3>
              </div>
              <p><?php echo $term->description ?></p>
              <div class="tres60_button_container">
                <a href="<?php echo $button["link"] ?>" class="button general_button text-yellow mt-4 <?php if (!$in_right) echo "button_dark" ?>">
                  <span data-title="<?php echo $button["text"] ?>"><?php echo $button["text"] ?></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <img class="tres60_image_direct" src="<?= $imageES["sizes"]["large"] ?>">
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
      <div class="lineas_container <?= !$labelToLeft ? "lefting" : "" ?>">
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
          $colNumber = "col-md-6 col-lg-3";
          $countSub = count($subcats);
          if ($countSub == 1 || $countSub == 2) {
            $colNumber = "col-md-6";
          } else if ($countSub == 3) {
            $colNumber = "col-md-4";
          }
          foreach ($subcats as $subcat) :

            // Mostrar el minitexto e images en español.
            if (mazal_is_language("en")) {
              $termES = pll_get_term($subcat->term_id, "es");
              $imagen = get_field("imagen", "categoria_" . $termES);
              $minitext = mazal_get_acf_field("minitexto_", "categoria_" . $termES);
            } else {
              $imagen = get_field("imagen", $subcat);
              $minitext = mazal_get_acf_field("minitexto_", $subcat);
            }

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

  $catDesign = $catVal;

  // Se dificulta traducir el campo tipo de diseño de la taxonomia
  // Se forza a obtener el termino y valores en español.
  if (mazal_is_language("en")) {
    $catDesign = get_term(pll_get_term($catVal->term_id, "es"));
  }
  if (get_field("diseno_", $catDesign)  === "Diseño con Subcategorías") {
    $childCats = get_terms(array(
      "parent" => $catVal->term_id,
      "taxonomy" => $catVal->taxonomy,
      "hide_empty" => false,
      "number" => 4
    ));
    mazal_subcat_content($catVal, $toRight, $childCats);
  } else {
    mazal_simple_content(
      $catVal,
      $toRight
    );
  }
}

?>