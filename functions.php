<?php

include "includes/functions-post-types.php";
include "includes/class-mazal-walker-menu.php";

function printcode($code)
{
?>
  <pre>
    <?php print_r($code) ?>
  </pre>
<?php
}

/**
 * Cuando se agregue un producto a favorite, se necesita actualizar la lista de los productos en el header.
 * Esta función envia el html correspondiente.
 */
function mazal_ajax_get_favorite_products()
{
  $productsFav = mazal_get_favorite_products();
  $hasFavs = $productsFav && count($productsFav["posts"]) > 0;
?>
  <i class="icon-heart<?php echo !$hasFavs ? "-o" : "" ?> text-white hover-white"></i>

  <div id="favorites_header">
    <?php if ($hasFavs) : ?>
      <ul id="favorites_ul_header">
        <?php foreach ($productsFav["posts"] as $pr) : ?>
          <li>
            <div class="checkbox">
              <input type="checkbox" class="checkbox-custom" checked>
              <label class="checkbox-custom-label active"></label>
            </div>

            <a rel="nofollow" href="<?php echo get_permalink($pr) ?>">
              <div class="single_favorite">
                <div class="single_favorite_img">
                  <img src="<?php echo get_field("imagen_de_producto", $pr)["sizes"]["thumbnail"] ?>" alt="">
                </div>
                <div class="single_favorite_title">
                  <span><?php echo $pr->post_title ?></span>
                  <div class="qty">
                    <span class="minus bg-dark">-</span>
                    <input type="number" class="count" value="1">
                    <span class="plus bg-dark">+</span>
                  </div>
                </div>
              </div>
            </a>
            <div class="action_delete">
              <span class="action_delete_item">
                <i class="icon-heart"></i>
              </span>
              <span data-delete="<?= $pr->ID ?>" class="confirm_delete_item">
                <?php if (mazal_is_language("es")) {
                  echo "¿Eliminar ítem?";
                } else {
                  echo "Delete item?";
                } ?>

              </span>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
      <div class="cotizar-favoritos">
        <button id="cotizar_lote" class="button general_button font-2 fill-button">
          <span class="">
            <?php
            if (mazal_is_language("es")) {
              echo "Cotizar";
            } else {
              echo "Quote";
            } ?>
          </span>
        </button>
      </div>
    <?php
    endif;
    ?>
  </div>

<?php
  wp_die();
}

add_action("wp_ajax_get_favs", "mazal_ajax_get_favorite_products");
add_action("wp_ajax_nopriv_get_favs", "mazal_ajax_get_favorite_products");


/**
 * En el panel de favoritos, se enviará esta información en el modal cuando se de click en "Cotizar"
 * Dicha información será tomada de esta función.
 */
function mazal_ajax_get_products_to_cotize()
{
  // $products = mazal_get_favorite_products();
  // foreach ($products["posts"] as $post) {
  // }
  printcode($products);
  die();
}

add_action("wp_ajax_get_prods_cotize", "mazal_ajax_get_products_to_cotize");
add_action("wp_ajax_nopriv_get_prods_cotize", "mazal_ajax_get_products_to_cotize");



function mazal_get_favorite_products()
{
  if (!isset($_COOKIE["productsmz"])) return array();

  $str =  str_replace('\\', "", $_COOKIE["productsmz"]);
  $str = str_replace("\"", "", $str);
  $prds = explode(" ", $str);

  $produyctos = new WP_Query(array(
    "post_type" => "producto",
    "post__in" => $prds
  ));
  $postProducts = $produyctos->posts;

  return array(
    "ids" => $prds,
    "posts" => $postProducts
  );
}

function mazal_theme_setup()
{
  add_theme_support("post-thumbnails");
  add_image_size('product-thumb', 380, 230, true); // (cropped)

  /** Funcionamiento para cambiar colores */
  require "personalizer/sections.php";
  require "personalizer/settings.php";
  require "personalizer/controlls.php";
}
add_action("after_setup_theme", "mazal_theme_setup");

/** Funcionamiento para cambiar colores */
function mazal_customize_live()
{
  wp_enqueue_script("customize_live", get_template_directory_uri() . "/personalizer/theme-customize.js", "jquery", "1.0", "true");
}

add_action("customize_preview_init", "mazal_customize_live");


/**
 * Determinar que tipo de lenguaje está actualmente
 * Soporta "es" y "en" como parametro
 *
 * @param string $lang Tipo de lenguaje a buscar, default "es"
 * @return bool 
 */
$getLocale = get_locale();
function mazal_is_language($lang = "es")
{
  global $getLocale;
  if ($lang == "es") {
    $locale = "es_CO";
  } else if ($lang == "en") {
    $locale = "en_US";
  }
  return $getLocale === $locale;
}

/**
 * Obtener los custom fields de ACF, dependiendo de el lengaje actual.
 */
function mazal_get_acf_field($key, $post = "option")
{
  if (mazal_is_language()) {
    $suffix = "-_es";
  } else {
    $suffix = "-_en";
  }
  return get_field($key . $suffix, $post);
}


/**
 * Mostrar estructura de un producto en el loop los productos.
 * @return void
 */
function mazal_single_product($post, $filterClass = "")
{

?>
  <div class="col-item <?php echo $filterClass ?>">
    <a href="<?php echo get_permalink($post); ?>">

      <div class="item">
        <?php
        if (is_search()) : ?>

          <img src="<?php echo get_field("imagen_de_producto", $post)["sizes"]["product-thumb"] ?>" alt="">
        <?php else : ?>
          <img data-src="<?php echo get_field("imagen_de_producto", $post)["sizes"]["product-thumb"] ?>" alt="">

        <?php endif; ?>
        <div class="item-content">
          <span class="item-nombre-proyecto"><?php echo wp_kses_post($post->post_title) ?></span>
        </div>
      </div>
    </a>
  </div>
  <?php

}

function mazal_get_socials()
{
  $field = "redes_sociales";
  if (mazal_is_corporativo_page() || mazal_is_hogar_page()) {
    $field = "redes_sociales_mobiliario";
  }
  foreach (get_field($field, "option") as $social) : ?>
    <li><a target="_blank" href="<?= $social["url"] ?>"><img src="<?= $social["icono"]["url"] ?>" alt=""></a></li>
  <?php endforeach;
}

/**
 * En portafolio y en taxonomy-categoria se usa esta función para determinar las subcategorías y productos de la categoría pasada por parámetro
 * Esta función imprimirá el html correspondiente.
 * Puede ser confuso $currentObject y $currentCategory, simplemente $currentObject será la categoría general ( Categoría #2, por ejemplo carpintería ) y $currentObject es la categoría #3 ( Por ejemplo closest, muebles.)
 * @param object $currentObject Categoría general para mostrar.
 * @param object $currentCategory Categoría actual para mostrar.
 * @param bool $isSubChildren ¿Es una categoría #3? (Revisar taxonomy-categoria para entender el número de categorías).
 * @return void
 */
function mazal_get_taxonomy_data($currentObject, $currentCategory, $isSubChildren)
{

  // Se intenta obtener las categorías #3 
  // Estas se mostrarán en el select color negro como "Categoria"
  $childsCurrentObject = get_terms(array(
    "parent" => $currentObject->term_id,
    "taxonomy" => "categoria",
    "hide_empty" => false
  ));


  $queryPosts = new WP_Query(array(
    "post_type" => "producto",
    "posts_per_page" => 120,
    "tax_query" => array(
      array(
        "taxonomy" => $currentObject->taxonomy,
        "terms" => $currentObject->term_id
      )
    )
  ));
  $posts = $queryPosts->posts;
  if (count($posts) == 0) {
    if (mazal_is_language()) {
      $nofound = "Esta categoría no posee productos.";
    } else {
      $nofound = "This category don't have products.";
    }
  ?>
    <div class="found_container found_empty">
      <div class="text-center">
        <h4><?php echo $nofound ?></h4>
      </div>
    </div>
  <?php
    return;
  }
  /**
   * Se usará para mostrar los materiales disponibles en la categoría actual
   */
  $materiales = array();

  /**
   * Se usará para mostrar los productos de la categoría actual
   */
  $reposts = array();
  foreach ($posts as $post) {
    $materialTerms = get_the_terms($post, "material");
    $categoriaTerms = get_the_terms($post, "categoria");
    $reposts[] = array(
      "post" => $post,
      "material" => $materialTerms,
      "categoria" => $categoriaTerms
    );
    if ($materialTerms &&  count($materialTerms) > 0) {
      foreach ($materialTerms as $mterm) {
        $materiales[$mterm->slug] = $mterm;
      }
    }
  }
  if (mazal_is_language()) {
    $labelBoy = "Todos";
    $labelGirl = "Todas";
    $typeOf = "Tipo de ";
  } else {
    $labelBoy = "All";
    $typeOf = "Type of ";
    $labelGirl = "All";
  } ?>
  <div id="<?php echo $currentObject->slug ?>" class="filtrado">
    <ul>
      <?php if (count($childsCurrentObject) > 0) :  ?>
        <li>
          <div class="dropdown first-filter">
            <?php
            if (mazal_is_language()) {
              $catName = "Categoría";
            } else {
              $catName = "Category";
            }
            ?>
            <label class="dropdown-label" data-emplabel="<?= $catName  ?>"><?php echo $isSubChildren ? $currentCategory->name : $catName ?></label>

            <div class="dropdown-list">
              <div class="checkbox">
                <input data-filter=".<?php echo $currentObject->slug ?>" type="checkbox" class="check-unique check-all checkbox-custom" id="child_cat_filter_<?php echo $currentObject->term_id ?>" />

                <label for="child_cat_filter_<?php echo $currentObject->term_id ?>" class="checkbox-custom-label"><?= $labelBoy ?></label>
              </div>
              <?php foreach ($childsCurrentObject as $childsCat) : ?>
                <div class="checkbox">
                  <input data-countcat="<?= $childsCat->count ?>" data-subcat="<?php echo $childsCat->term_id ?>" data-filter=".<?php echo $childsCat->slug ?>" type="checkbox" name="dropdown-group-tipo-<?php echo $childsCat->slug ?>" class="check-unique check-all checkbox-custom" id="child_cat_filter_<?php echo $childsCat->term_id ?>" />
                  <label for="child_cat_filter_<?php echo $childsCat->term_id ?>" class="checkbox-custom-label"><?php echo $childsCat->name ?></label>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </li>
        <?php
        foreach ($childsCurrentObject as $childsCat) :
          $additionClass = $childsCat->term_id === $currentCategory->term_id ? "show" : "";
        ?>

          <li class="sublist_children <?php echo $additionClass ?>" id="sublist_children_<?php echo $childsCat->term_id ?>">
            <div class="dropdown">
              <label class="dropdown-label" data-emplabel="<?php echo $typeOf . $childsCat->name ?>"><?php echo $typeOf . $childsCat->name ?></label>
              <div class="dropdown-list">
                <div class="checkbox">
                  <input data-classonselect="<?= $childsCat->slug ?>" data-countcat="<?= $childsCat->count ?>" data-filter="*" type="checkbox" name="dropdown-group-tipo-<?php echo $childsCat->slug ?>" class="<?= $childsCat->slug ?> check check-all checkbox-custom" id="filter_term_<?php echo $childsCat->term_id ?>" />
                  <label for="filter_term_<?php echo $childsCat->term_id ?>" class="checkbox-custom-label"><?= $labelGirl ?></label>
                </div>
                <?php
                $argsTerms = array(
                  "taxonomy" => "categoria",
                  "child_of" => $childsCat->term_id
                );
                foreach (get_terms($argsTerms) as $subchild) : ?>
                  <div class="checkbox">
                    <input data-classonselect="<?= $childsCat->slug ?>" data-countcat="<?= $subchild->count ?>" data-filter=".<?php echo $subchild->slug ?>" type="checkbox" name="dropdown-group-tipo-<?php echo $childsCat->slug ?>" class="<?= $childsCat->slug ?> check-all check checkbox-custom" id="filter_term_<?php echo $subchild->term_id ?>" />
                    <label for="filter_term_<?php echo $subchild->term_id ?>" class="checkbox-custom-label"><?php echo $subchild->name ?></label>
                  </div>
                <?php endforeach; ?>

              </div>
            </div>
          </li>
        <?php endforeach; ?>
      <?php endif; ?>

      <li>
        <div id="dropdown_materials" class="dropdown">
          <label class="dropdown-label" data-emplabel="Material">Material</label>
          <div class="dropdown-list">
            <div class="checkbox">
              <input data-classonselect="material" data-filter="*" type="checkbox" name="dropdown-group-material" class="material check check-all checkbox-custom" id="material_check1" />
              <label for="material_check1" class="checkbox-custom-label"><?= $labelBoy ?></label>
            </div>
            <?php
            foreach ($materiales as $materialSlug => $materialTerm) : ?>
              <div class="checkbox">
                <input data-classonselect="material" data-filter=".<?php echo $materialSlug ?>" type="checkbox" name="dropdown-group-tipo-<?php echo $materialSlug ?>" class="material check check-all checkbox-custom" id="filter_term_<?php echo $materialTerm->term_id ?>" />
                <label for="filter_term_<?php echo $materialTerm->term_id ?>" class="checkbox-custom-label"><?php echo $materialTerm->name ?></label>
              </div>
            <?php endforeach; ?>


          </div>
        </div>
      </li>

    </ul>
  </div>
  <input type="hidden" id="current_category" value="<?php echo $currentCategory->slug; ?>">

  <div class="grid-item-category">
    <?php
    foreach ($reposts as $post) {
      $wpPost = $post["post"];
      $filterString = "";
      if ($post["material"] &&  count($post["material"]) > 0) {
        foreach ($post["material"] as $mat) {
          $filterString .= " {$mat->slug}";
        }
      }

      foreach ($post["categoria"] as $cat) {
        $filterString .= " {$cat->slug}";
      }
      mazal_single_product($wpPost, $filterString);
    }
    ?>
  </div>


  <div class="more-items">
    <input type="hidden" id="count_actual_items_show">
    <button data-filter="" id="load_more_filter_items" class=" m-auto button fill-button">
      <span data-title="cargar mas">
        Cargar mas +
      </span>
    </button>
  </div>
<?php
}

/**
 * Obtener el término superior dependiendo una taxonomía en específico.
 *
 * @param mixed $term ID o objeto del término
 * @return void
 */
function mazal_get_term_top_most_parent($term, $taxonomy)
{
  // Start from the current term
  $parent  = get_term($term, $taxonomy);
  // Climb up the hierarchy until we reach a term with parent = '0'
  while ($parent->parent != '0') {
    $term_id = $parent->parent;
    $parent  = get_term($term_id, $taxonomy);
  }
  return $parent;
}

/**
 * Verificar si la actual página es Hogar, corporativo o arquitectura.
 *
 * @return bool
 */
function mazal_is_primary_page()
{
  return mazal_is_corporativo_page() || mazal_is_arquitectura_page() || mazal_is_hogar_page();
}

/**
 * Verificar si es la página de portafolio
 */
function mazal_is_portfolio_page()
{
  return is_page(238) || is_page(240);
}

/**
 * Verificar si es la página de portafolio
 */
function mazal_is_nosotros_page()
{
  return is_page(812) || is_page(808);
}

/**
 * Verificar si es la página frontal de la web.
 */
function mazal_is_front_page()
{
  return is_front_page() || is_page(7);
}

/**
 * Verificar si la actual página es "arquitectura"
 */
function mazal_is_arquitectura_page()
{
  return is_page(11) || is_page(30);
}


/**
 * Verificar si la actual página es "mobiliario"
 */
function mazal_is_hogar_page()
{
  return is_page(9) || is_page(47);
}

/**
 * Verificar si la actual página es "Corporativo"
 */
function mazal_is_corporativo_page()
{
  return is_page(25) || is_page(31);
}

//add SVG to allowed file uploads
function add_file_types_to_uploads($file_types)
{

  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $file_types = array_merge($file_types, $new_filetypes);

  return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');


/**
 * Obtener todas las páginas por ID
 */
function mazal_get_pages_ids()
{
  if (mazal_is_language()) {
    $arqPage = 11;
    $corpPage = 25;
    $hogarPage = 9;
  } else {
    $arqPage = 30;
    $corpPage = 31;
    $hogarPage = 47;
  }
  return array(
    "arquitectura" => $arqPage,
    "corporativo" => $corpPage,
    "hogar" => $hogarPage
  );
}


function mazal_get_most_biggests_categories()
{
  if (mazal_is_language()) {
    $hogar = 89;
    $arquitectura = 91;
    $coprorativo = 93;
  } else {
    $hogar = 99;
    $arquitectura = 97;
    $coprorativo = 101;
  }

  return array(
    "hogar" => get_term($hogar, "categoria"),
    "arquitectura" => get_term($arquitectura, "categoria"),
    "corporativo" => get_term($coprorativo, "categoria"),
  );
}
