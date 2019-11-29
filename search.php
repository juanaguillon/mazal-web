<?php get_header();

$wpQuery = new WP_Query(array(
  "post_type" => "producto",
  "posts_per_page" => -1,
  "s" => get_search_query()
));
$allPosts = $wpQuery->posts;
$exists = count($allPosts) > 0;
?>

<section class="category-filter-grid container search_container <?php echo ! $exists ? "search_empty" : "" ?>">
  <?php

  if (mazal_is_language()) {
    $text = "No se han encontrado coincidencias";
    $parraf = "No encontramos coincidencias con su búsqueda. Intenta con otra palabra o viaja a las páginas principales";
    $button = "Ir a Inicio";
    $results = "Resultados encontrados";
  } else {
    $text = "No matches found";
    $parraf = "We don't find any matches with your search. Try with another word or travel into the principal pages";
    $button = "Go Home";
    $results = "Matches found";
  }
  if ($exists) {
    ?>
    <h4 class="text-center"><?php echo $results; ?></h4>

    <div class="grid-item-category search_grid_category">
      <?php foreach ($allPosts as $post) {
          mazal_single_product($post);
        } ?>
    </div>
  <?php
  } else {
    ?>
    <div class="text-center">
      <h4><?php echo $text; ?></h4>
      <p><?php echo $parraf; ?></p>
      <a href="<?php echo esc_url(home_url()) ?>" class="button general_button button_dark">
        <span data-title="<?php echo $button; ?>"><?php echo $button; ?></span>
      </a>
    </div>
  <?php
  }

  ?>

</section>

<?php get_footer() ?>