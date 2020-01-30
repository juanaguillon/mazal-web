<?php get_header();

/**
 * Es importante ver la taxonomía "Categorias" de post-type "Productos" para entender correctamente este archivo.
 * Existen varios niveles de categorías, por ejemplo un arbol de categorías:
 * Hogar #1
 * - Carpintería #2
 * --- Cocina ( Hija de carpintería) #3
 * ----- Bar ( Hija de Cocina ) #4
 * ----- Cafetería
 * --- Muebles
 * --- Puertas
 */
// echo "HIIIIIIIII";


/**
 * Puede ser el actual término o puede ser el padre directamente.
 * Se puede tomar el término padre ya que es necesario mostrar los productos de jerarquía #2.
 * EJ: Categoría Hogar es #1, Carpintería es #2 (Mostrar productos de esta categoría.), Closets #3.
 */
$currentObject = get_queried_object();

// Se agrega esta variable ya que $currentObject puede cambiar por una condicional.
$currentCategory = $currentObject;

$ancest = get_ancestors($currentObject->term_id, "categoria", "taxonomy");
// $image = get_field("imagen", $currentObject);

if (mazal_is_language("en")) {
  $termES = pll_get_term($currentObject->term_id, "es");
  $image = get_field("imagen_de_banner", "categoria_" . $termES);
} else {
  $image = get_field("imagen_de_banner", $currentObject);
}


/**
 * Verificar si es categoría #3
 */
$isSubChildren = false;
if (count($ancest) > 1) {
  $isSubChildren = true;
  $currentObject = get_term($currentObject->parent, $currentObject->taxonomy);
}

// // Se intenta obtener las categorías #3 
// // Estas se mostrarán en el select color negro como "Categoria"
// $childsCurrentObject = get_terms(array(
//   "parent" => $currentObject->term_id,
//   "taxonomy" => "categoria"
// ));


// $queryPosts = new WP_Query(array(
//   "post_type" => "producto",
//   "posts_per_page" => -1,
//   "tax_query" => array(
//     array(
//       "taxonomy" => $currentObject->taxonomy,
//       "terms" => $currentObject->term_id
//     )
//   )
// ));
// $posts = $queryPosts->posts;


// /**
//  * Se usará para mostrar los materiales disponibles en la categoría actual
//  */
// $materiales = array();

// /**
//  * Se usará para mostrar los productos de la categoría actual
//  */
// $reposts = array();
// foreach ($posts as $post) {
//   $materialTerms = get_the_terms($post, "material");
//   $categoriaTerms = get_the_terms($post, "categoria");
//   $reposts[] = array(
//     "post" => $post,
//     "material" => $materialTerms,
//     "categoria" => $categoriaTerms
//   );
//   foreach ($materialTerms as $mterm) {
//     $materiales[$mterm->slug] = $mterm;
//   }
// }
?>

<section class="banner-categoria banner-interna" style="background-image:url(<?php echo $image["url"] ?>)">
  <div class="black_background"></div>
  <div class="banner-categoria-content">
    <h2 class="fw-4"><?php echo strtoupper($currentObject->name) ?></h2>
    <?php if ($isSubChildren) : ?>
      <h5><?php echo $currentCategory->name ?></h5>
    <?php endif; ?>
    <p class="taxonomy_banner_desc"><?php echo wp_kses_post($currentObject->description) ?></p>
  </div>

</section>
<p class="taxonomy_desc"><?php echo wp_kses_post($currentObject->description) ?></p>


<section class="category-filter-grid container">
  <div class="direccion-back">
    <a href="<?= $_SERVER['HTTP_REFERER']; ?>" class="button add">
      <i class="icon-arrow_left"></i>
    </a>
  </div>

  <?php mazal_get_taxonomy_data($currentObject, $currentCategory, $isSubChildren); ?>

</section>



<?php get_footer(); ?>