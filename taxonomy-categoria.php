<?php get_header(); ?>


<?php

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


/**
 * Puede ser el actual término o puede ser el padre directamente.
 * Se puede tomar el término padre ya que es necesario mostrar los productos de jerarquía #2.
 * EJ: Categoría Hogar es #1, Carpintería es #2 (Mostrar productos de esta categoría.), Closets #3.
 */
$currentObject = get_queried_object();

// Se agrega esta variable ya que $currentObject puede cambiar por una condicional.
$currentCategory = $currentObject;

$ancest = get_ancestors($currentObject->term_id, "categoria", "taxonomy");
$image = get_field("imagen", $currentObject);

/**
 * Verificar si es categoría #3
 */
$isSubChildren = false;
if (count($ancest) > 1) {
  $isSubChildren = true;
  $currentObject = get_term($currentObject->parent, $currentObject->taxonomy);
}

// Se intenta obtener las categorías #3 
// Estas se mostrarán en el select color negro como "Categoria"
$childsCurrentObject = get_terms(array(
  "parent" => $currentObject->term_id,
  "taxonomy" => "categoria"
));


$queryPosts = new WP_Query(array(
  "post_type" => "producto",
  "posts_per_page" => -1,
  "tax_query" => array(
    array(
      "taxonomy" => $currentObject->taxonomy,
      "terms" => $currentObject->term_id
    )
  )
));
$posts = $queryPosts->posts;


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
  foreach ($materialTerms as $mterm) {
    $materiales[$mterm->slug] = $mterm;
  }
}
?>

<section class="banner-categoria banner-interna" style="background-image:url(<?php echo $image["url"] ?>)">
  <div class="black_background"></div>
  <div class="banner-categoria-content">
    <h2 class="fw-4"><?php echo strtoupper($currentObject->name) ?></h2>
    <?php
    if (count($ancest) > 1) : ?>
      <h5><?php echo $currentCategory->name ?></h5>
    <?php endif; ?>
    <p><?php echo wp_kses_post($currentObject->description) ?></p>
  </div>

</section>
<!-- 
<section class="interna-descripcion container">
  <h3 class="iso-filter">COCINAS</h3>
  <p class="iso-filter">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio sint enim sunt, laborum repudiandae ducimus perspiciatis totam corrupti saepe provident, earum rem modi! Sunt, voluptatibus cumque. Reiciendis laborum ipsam cum!Libero omnis voluptatibus magni soluta pariatur vero sapiente consequuntur nostrum cumque dolore aliquam ipsa deleniti dolor officia molestias, placeat impedit natus necessitatibus dolorem. Dignissimos atque blanditiis, illum aliquam voluptatibus ab.</p>
</section> -->

<!-- <section class="interna-categoria int-var-1">
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
</section> -->

<section class="category-filter-grid container">
  <div class="filtrado">
    <ul>
      <?php if (count($childsCurrentObject) > 0) :  ?>
        <li>
          <div class="dropdown first-filter">
            <label class="dropdown-label" data-emplabel="Categoría"><?php echo $isSubChildren ? $currentCategory->name : "Categoría" ?></label>
            <div class="dropdown-list">
              <?php
                foreach ($childsCurrentObject as $childsCat) : ?>
                <div class="checkbox">
                  <input data-subcat="<?php echo $childsCat->term_id ?>" data-filter=".<?php echo $childsCat->slug ?>" type="checkbox" name="dropdown-group-tipo-<?php echo $childsCat->slug ?>" class="check-unique check-all checkbox-custom" id="child_cat_filter_<?php echo $childsCat->term_id ?>" />
                  <label for="child_cat_filter_<?php echo $childsCat->term_id ?>" class="checkbox-custom-label"><?php echo $childsCat->name ?></label>
                </div>
              <?php endforeach; ?>

            </div>
          </div>
        </li>
        <?php
          foreach ($childsCurrentObject as $childsCat) :

            // Esta variable permite mostrar la lista de filtros de la actual categoria.
            // Esta se usará únicamente si es categoría tipo 3
            $additionClass = $childsCat->term_id === $currentCategory->term_id ? "show" : "";
            ?>

          <li class="sublist_children <?php echo $additionClass ?>" id="sublist_children_<?php echo $childsCat->term_id ?>">
            <div class="dropdown">
              <label class="dropdown-label" data-emplabel="Tipo de <?php echo $childsCat->name ?>">Tipo de <?php echo $childsCat->name ?></label>
              <div class="dropdown-list">
                <div class="checkbox">
                  <input data-filter="*" type="checkbox" name="dropdown-group-tipo-<?php echo $childsCat->slug ?>" class="check-all checkbox-custom" id="filter_term_<?php echo $childsCat->term_id ?>" />
                  <label for="filter_term_<?php echo $childsCat->term_id ?>" class="checkbox-custom-label">Todas</label>
                </div>
                <?php
                    $argsTerms = array(
                      "taxonomy" => "categoria",
                      "child_of" => $childsCat->term_id
                    );
                    foreach (get_terms($argsTerms) as $subchild) : ?>
                  <div class="checkbox">
                    <input data-filter=".<?php echo $subchild->slug ?>" type="checkbox" name="dropdown-group-tipo-<?php echo $childsCat->slug ?>" class="check-all check checkbox-custom" id="filter_term_<?php echo $subchild->term_id ?>" />
                    <label for="filter_term_<?php echo $subchild->term_id ?>" class="checkbox-custom-label"><?php echo $subchild->name ?></label>
                  </div>
                <?php endforeach; ?>

              </div>
            </div>
          </li>
        <?php endforeach; ?>
      <?php endif; ?>

      <li>
        <div class="dropdown">
          <label class="dropdown-label" data-emplabel="Material">Material</label>



          <div class="dropdown-list">
            <div class="checkbox">
              <input data-filter="*" type="checkbox" name="dropdown-group-material" class="check check-all checkbox-custom" id="material_check1" />
              <label for="material_check1" class="checkbox-custom-label">Todos</label>
            </div>
            <?php
            foreach ($materiales as $materialSlug => $materialTerm) : ?>
              <div class="checkbox">
                <input data-filter=".<?php echo $materialSlug ?>" type="checkbox" name="dropdown-group-tipo-<?php echo $materialSlug ?>" class="check check-all checkbox-custom" id="filter_term_<?php echo $materialTerm->term_id ?>" />
                <label for="filter_term_<?php echo $materialTerm->term_id ?>" class="checkbox-custom-label"><?php echo $materialTerm->name ?></label>
              </div>
            <?php endforeach; ?>


          </div>
        </div>
      </li>
      <!-- <li>
        <div class="dropdown">
          <label class="dropdown-label" data-emplabel="MEDIDAS">MEDIDAS</label>

          <div class="dropdown-list">
            <div class="checkbox">
              <input type="checkbox" name="dropdown-group-medidas" class="check check-all checkbox-custom" id="checkbox-main4" />
              <label for="checkbox-main4" class="checkbox-custom-label">Selection</label>
            </div>

            <div class="checkbox">
              <input type="checkbox" name="dropdown-group-medidas" class="check check-all checkbox-custom" id="checkbox-custom_11" />
              <label for="checkbox-custom_11" class="checkbox-custom-label">Selection 1</label>
            </div>

            <div class="checkbox">
              <input type="checkbox" name="dropdown-group-medidas" class="check check-all checkbox-custom" id="checkbox-custom_12" />
              <label for="checkbox-custom_12" class="checkbox-custom-label">Selection 2</label>
            </div>

            <div class="checkbox">
              <input type="checkbox" name="dropdown-group-medidas" class="check check-all checkbox-custom" id="checkbox-custom_13" />
              <label for="checkbox-custom_13" class="checkbox-custom-label">Selection 3</label>
            </div>

            <div class="checkbox">
              <input type="checkbox" name="dropdown-group-medidas" class="check check-all checkbox-custom" id="checkbox-custom_14" />
              <label for="checkbox-custom_14" class="checkbox-custom-label">Selection 4</label>
            </div>
          </div>
        </div>
      </li>
      <li>
        <div class="dropdown">
          <label class="dropdown-label" data-emplabel="COLECCIÓN">COLECCIÓN</label>

          <div class="dropdown-list">
            <div class="checkbox">
              <input type="checkbox" name="dropdown-group-coleccion" class="check-all checkbox-custom" id="checkbox-main4" />
              <label for="checkbox-main4" class="checkbox-custom-label">Selection</label>
            </div>

            <div class="checkbox">
              <input type="checkbox" name="dropdown-group-coleccion" class="check checkbox-custom" id="checkbox-custom_14" />
              <label for="checkbox-custom_14" class="checkbox-custom-label">Selection 1</label>
            </div>

            <div class="checkbox">
              <input type="checkbox" name="dropdown-group-coleccion" class="check checkbox-custom" id="checkbox-custom_15" />
              <label for="checkbox-custom_15" class="checkbox-custom-label">Selection 2</label>
            </div>

            <div class="checkbox">
              <input type="checkbox" name="dropdown-group-coleccion" class="check checkbox-custom" id="checkbox-custom_16" />
              <label for="checkbox-custom_16" class="checkbox-custom-label">Selection 3</label>
            </div>

            <div class="checkbox">
              <input type="checkbox" name="dropdown-group-coleccion" class="check checkbox-custom" id="checkbox-custom_17" />
              <label for="checkbox-custom_17" class="checkbox-custom-label">Selection 4</label>
            </div>
          </div>
        </div>
      </li> -->
    </ul>
  </div>

  <div class="grid-item-category">
    <?php
    foreach ($reposts as $post) :
      $wpPost = $post["post"];
      $filterString = "";
      foreach ($post["material"] as $mat) {
        $filterString .= " {$mat->slug}";
      }
      foreach ($post["categoria"] as $cat) {
        $filterString .= " {$cat->slug}";
      }
      ?>
      <div class="col-item<?php echo $filterString ?>">
        <a href="<?php echo get_permalink($wpPost); ?>">
          <div class="item">
            <img src="<?php echo get_the_post_thumbnail_url($wpPost, "medium") ?>" alt="">
            <div class="item-content">
              <span class="item-nombre-proyecto"><?php echo wp_kses_post($wpPost->post_title) ?></span>
            </div>
          </div>
        </a>

      </div>
    <?php endforeach; ?>

  </div>


  <div class="d-flex more-items">

    <button class=" m-auto button fill-button">
      <span data-title="cargar mas">
        Cargar mas +
      </span>
    </button>

  </div>

</section>



<?php get_footer(); ?>