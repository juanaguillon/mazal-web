<?php get_header() ?>


<?php
if (mazal_is_language()) {
  $nofound = "No hemos encontrado páginas con esta petición";
  $subfound = "Intenta buscar algo en el sitio o viaja a las págias principales";
  $search = "Buscar";
  $home = "Ir a Inicio";
  $placeholder = "¿Qué estás buscando?";
} else {
  $nofound = "We don´t found pages with this request.";
  $subfound = "Try search something in the website or travel to main pages.";
  $home = "Go to home";
  $search = "Search";
  $placeholder = "What are you searching for?";
}
?>

<section class="category-filter-grid container search_container search_empty">
  <div class="text-center">
    <span class="404_number"></span>
    <h4>404</h4>
    <p><?= $nofound ?></p>
    <form action="<?= pll_home_url() ?>">
      <div class="field">
        <input name="s" placeholder="<?= $placeholder ?>" type="text" class="text dark-search">
      </div>
      <div class="field search-buttons">
        <button type="submit" class="button general_button button_dark button-fill"><span data-title="<?= $search ?>"><?= $search ?></span></button>
        <a href="<?= pll_home_url() ?>" class="button general_button button_dark ">
          <span data-title="<?= $home  ?>"><?= $home  ?></span>
        </a>
      </div>
    </form>

  </div>

</section>

<?php get_footer() ?>