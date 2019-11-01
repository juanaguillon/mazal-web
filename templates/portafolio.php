<?php
/* Template Name: Portafolio */
get_header();
?>
<section class="banner-categoria banner-interna" style="background-image:url(<?php bloginfo("template_url") ?>/images/image_left.jpg)">
  <div class="black_background"></div>
  <div class="banner-categoria-content">
    <h2 class="fw-4">PORTAFOLIO</h2>
    <p>Conoce nuestro portafolio, en donde encontrarás múltiples proyectos en los que hemos trabajado y colaborados junto a nuestros clientes.</p>
  </div>


</section>

<section class="category-filter-grid container p-0">

  <div class="filtrado">
    <ul>
      <li>
        <div class="dropdown first-filter">
          <label class="dropdown-label" data-emplabel="CATEGORIA">CATEGORIA</label>

          <div class="dropdown-list">
            <div class="checkbox">
              <input type="checkbox" name="dropdown-group-tipo-cocina" class="check-all checkbox-custom" id="checkbox-main1" />
              <label for="checkbox-main1" class="checkbox-custom-label">COCINAS</label>
            </div>

            <div class="checkbox">
              <input type="checkbox" name="dropdown-group-tipo-cocina" class="check checkbox-custom" id="checkbox-custom_1" />
              <label for="checkbox-custom_1" class="checkbox-custom-label">CLOSETS</label>
            </div>

            <div class="checkbox">
              <input type="checkbox" name="dropdown-group-tipo-cocina" class="check checkbox-custom" id="checkbox-custom_2" />
              <label for="checkbox-custom_2" class="checkbox-custom-label">MUEBLES</label>
            </div>

            <div class="checkbox">
              <input type="checkbox" name="dropdown-group-tipo-cocina" class="check checkbox-custom" id="checkbox-custom_3" />
              <label for="checkbox-custom_3" class="checkbox-custom-label">PUERTAS</label>
            </div>

          </div>
        </div>
      </li>
      <li>
        <div class="dropdown">
          <label class="dropdown-label" data-emplabel="TIPO DE COCINA">TIPO DE COCINA</label>

          <div class="dropdown-list">
            <div class="checkbox">
              <input data-filter="*" type="checkbox" name="dropdown-group-tipo-cocina" class="check check-all checkbox-custom" id="cocina_checkbox1" />
              <label for="cocina_checkbox1" class="checkbox-custom-label">Todas</label>
            </div>
            <div class="checkbox">
              <input data-filter=".cocinas" type="checkbox" name="dropdown-group-tipo-cocina" class="check check-all checkbox-custom" id="cocina_checkbox2" />
              <label for="cocina_checkbox2" class="checkbox-custom-label">Industriales</label>
            </div>

            <div class="checkbox">
              <input data-filter=".integrales" type="checkbox" name="dropdown-group-tipo-cocina" class="check check-all checkbox-custom" id="cocina_checkbox3" />
              <label for="cocina_checkbox3" class="checkbox-custom-label">Integrales</label>
            </div>

            <div class="checkbox">
              <input data-filter=".cafeterias" type="checkbox" name="dropdown-group-tipo-cocina" class="check check-all checkbox-custom" id="cocina_checkbox4" />
              <label for="cocina_checkbox4" class="checkbox-custom-label">Cafeterias</label>
            </div>

            <div class="checkbox">
              <input data-filter=".bar" type="checkbox" name="dropdown-group-tipo-cocina" class="check check-all checkbox-custom" id="cocina_checkbox5" />
              <label for="cocina_checkbox5" class="checkbox-custom-label">Bar</label>
            </div>

          </div>
        </div>
      </li>
      <li>
        <div class="dropdown">
          <label class="dropdown-label" data-emplabel="MATERIAL">MATERIAL</label>

          <div class="dropdown-list">
            <div class="checkbox">
              <input data-filter="*" type="checkbox" name="dropdown-group-material" class="check check-all checkbox-custom" id="material_check1" />
              <label for="material_check1" class="checkbox-custom-label">Todos</label>
            </div>

            <div class="checkbox">
              <input data-filter=".madera" type="checkbox" name="dropdown-group-material" class="check check-all checkbox-custom" id="material_check2" />
              <label for="material_check2" class="checkbox-custom-label">Madera</label>
            </div>

            <div class="checkbox">
              <input data-filter=".piedra" type="checkbox" name="dropdown-group-material" class="check check-all checkbox-custom" id="material_check3" />
              <label for="material_check3" class="checkbox-custom-label">Piedra</label>
            </div>

            <div class="checkbox">
              <input data-filter=".roble" type="checkbox" name="dropdown-group-material" class="check check-all checkbox-custom" id="material_check4" />
              <label for="material_check4" class="checkbox-custom-label">Roble</label>
            </div>

            <div class="checkbox">
              <input data-filter=".otro" type="checkbox" name="dropdown-group-material" class="check check-all checkbox-custom" id="material_check5" />
              <label for="material_check5" class="checkbox-custom-label">Otro</label>
            </div>
          </div>
        </div>
      </li>
      <li>
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
      </li>
    </ul>
  </div>


  <div class="grid-item-category">
    <div class="col-item cocinas roble">
      <div class="item">
        <img src="http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/cocina.jpg" alt="">
        <div class="item-content">
          <span class="item-nombre-proyecto">Proyecto Colina Brillo</span>
          Some sofisticated kitchen
        </div>
      </div>
    </div>

    <div class="col-item madera bar">
      <div class="item">
        <img src="http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/cocina-2.jpg" alt="">
        <div class="item-content ">
          <span class="item-nombre-proyecto">Proyecto Colina Brillo</span>
          Some sofisticated kitchen
        </div>
      </div>
    </div>

    <div class="col-item cocinas">
      <div class="item">
        <img src="http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/cocina-3.jpg" alt="">
        <div class="item-content">
          <span class="item-nombre-proyecto">Proyecto Colina Brillo</span>
          Some sofisticated kitchen
        </div>
      </div>
    </div>

    <div class="col-item cafeterias otro">
      <div class="item">
        <img src="http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/cocina-4.jpg" alt="">
        <div class="item-content piedra">
          <span class="item-nombre-proyecto">Proyecto Colina Brillo</span>
          Some sofisticated kitchen
        </div>
      </div>
    </div>

    <div class="col-item otro">
      <div class="item">
        <img src="http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/cocina-5.jpg" alt="">
        <div class="item-content ">
          <span class="item-nombre-proyecto">Proyecto Colina Brillo</span>
          Some sofisticated kitchen
        </div>

      </div>
    </div>

    <div class="col-item cocinas bar">
      <div class="item">
        <img src="http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/cocina-6.jpg" alt="">

        <div class="item-content ">
          <span class="item-nombre-proyecto">Proyecto Colina Brillo</span>
          Some sofisticated kitchen
        </div>
      </div>

    </div>

    <div class="col-item integrales">
      <div class="item">
        <img src="http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/cocina-7.jpg" alt="">
        <div class="item-content">
          <span class="item-nombre-proyecto">Proyecto Colina Brillo</span>
          Some sofisticated kitchen
        </div>
      </div>

    </div>

    <div class="col-item cocinas">
      <div class="item">
        <img src="http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/cocina-7.jpg" alt="">
        <div class="item-content">
          <span class="item-nombre-proyecto">Proyecto Colina Brillo</span>
          Some sofisticated kitchen
        </div>
      </div>

    </div>

    <div class="col-item bar roble">
      <div class="item">
        <img src="http://www.intuitionstudio.co/mazal/wp-content/themes/mazal/images/interna/cocina-2.jpg" alt="">
        <div class="item-content">
          <span class="item-nombre-proyecto">Proyecto Colina Brillo</span>
          Some sofisticated kitchen
        </div>
      </div>

    </div>

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