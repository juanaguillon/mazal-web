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

// /**
//  * En el post type de producto, se añade un meta box personalizado, mostrando el arbon jerárquico de las categorías.
//  */
// function mazal_add_custom_metabox_in_product_tax()
// {

//   function mazal_product_tree_html($post)
//   {
//     $args = array(
//       'taxonomy'     => 'categoria',
//       'hierarchical' => true,
//       'title_li'     => '',
//       "echo" => false,
//       'hide_empty'   => false
//     );
//     // list_cate
//     printcode(wp_list_categories($args));
//   }

//   add_meta_box("mazal-product-tree", "Arbon de Categorías", "mazal_product_tree_html", "producto");
// }

// add_action('add_meta_boxes', 'mazal_add_custom_metabox_in_product_tax');


function mazal_initi_config()
{
  register_nav_menus(array(
    "hogar-menu" => "Menú Hogar",
    "hogar-arquitectura" => "Menú Arquitectura",
    "hogar-corporativo" => "Menú Corporativo",
  ));
}
add_action("init", "mazal_initi_config");

function mazal_theme_supports()
{
  add_theme_support("post-thumbnails");
}
add_action("after_setup_theme", "mazal_theme_supports");

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
function mazal_get_acf_field($key)
{
  if (mazal_is_language()) {
    $suffix = "-_es";
  } else {
    $suffix = "-_en";
  }
  return get_field($key . $suffix, "option");
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
