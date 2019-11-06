  <?php if (!is_front_page()) : ?>

    <?php
      $isEs = mazal_is_language();
      if ($isEs) {
        $suffix = "_-_es";
      } else {
        $suffix = "_-_en";
      }
      ?>

    <footer>

      <div class="footer_header">
        <div class="container">
          <div class="row footer_list">
            <div class="col-md-3 footer_list_item wow fadeInLeft">
              <h5 class="mazal_logo_footer">
                <img src="<?php bloginfo("template_url") ?>/images/icons/logo.svg" alt="">
              </h5>
            </div>
            <div class="col-md-3 footer_list_item wow fadeInDown" data-wow-delay="0.3s">
              <h4 class="footer_title_list text-white"><?php the_field("contacto_telefono" . $suffix, "option") ?></h4>
              <span class="text-white">(57)(1)602 6541</span>
            </div>
            <div class="col-md-3 footer_list_item wow fadeInDown" data-wow-delay="0.6s">
              <h4 class="footer_title_list text-white">Email</h4>
              <span class="text-white">sebastian.camacho@mazal.co</span>
            </div>
            <div data-wow-delay="0.9s" class="col-md-3 footer_list_item wow fadeInRight">
              <h4 class="footer_title_list text-white"><?php the_field("contacto_direccion" . $suffix, "option") ?></h4>
              <span class="text-white">Calle 109 # 18b - 52 Local 102</span>
            </div>
          </div>
        </div>
      </div>
      <div class="footer_foot text-center">
        <?php
          $rigths1 = explode(" - ", get_field("copyright" . $suffix, "option"))[0];
          $rigths2 = explode(" - ", get_field("copyright" . $suffix, "option"))[1];
          ?>
        <span class="text-3x text-white"><?php echo $rigths1 ?> - <strong><?php echo $rigths2 ?></strong></span>
      </div>
    </footer>

  <?php endif; ?>

  </main>

  <script src="<?php bloginfo('template_url') ?>/assets/js/core.min.js"></script>
  <script src="<?php bloginfo('template_url') ?>/assets/js/script.js"></script>

  <?php
  if (is_tax("categoria") || mazal_is_portfolio_page() || is_search()) {
    ?>
    <script src="<?php bloginfo('template_url') ?>/assets/js/bootstrap-multiselect.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url') ?>/assets/js/isotope.pkgd.min.js"></script>
    <script type="text/javascript">
      var $grid = $('.grid-item-category').isotope({
        itemSelector: '.col-item',
        layoutMode: 'fitRows'
      });
      /**
       * Crear filtro de checkbox en la página interna (interna-sub.php)
       */
      var $el = $(".dropdown");
      <?php if (is_tax("categoria")) : ?>
        var currentSlugClassName = $("#current_category").val();
        $grid.isotope({
          filter: "." + currentSlugClassName
        });
      <?php endif; ?>

      function updateStatus(label, result) {
        if (!result.length) {
          label.text(label.data("emplabel"));
        }
      }

      $el.each(function(i, element) {

        var $elm = $(this),
          $list = $(this).find(".dropdown-list"),
          $label = $(this).find(".dropdown-label"),
          $inputs = $(this).find(".check"),
          $inputsPort = $(this).find(".check_portfolio"),
          unique = $(this).find(".check-unique"),
          result = [];

        $label.on("click", () => {
          $(this).toggleClass("open");
        });
        unique.on("change", function() {
          var subcat = $(this).data("subcat");
          var text = $(this).next().text();
          var filter = $(this).data("filter");
          $(".sublist_children").removeClass("show")
          $("#sublist_children_" + subcat).addClass("show");
          $("#current_category").val(filter.replace(".", ""))
          $label.text(text);
          $grid.isotope({
            filter: filter
          });
        });

        // Estos inputs serán visiblen el portafolio, se representan con el color "Dorado (Marrón)"
        $inputsPort.on("change", function() {
          var subcatContent = $(this).data("subcat_content");
          var encampsuld = $(this).data("encapsuled");
          $("." + encampsuld + ".subcat_content_portfolio").removeClass("show");
          $("#subcat_content_" + subcatContent).addClass("show");

          $grid.isotope({
            itemSelector: '.col-item',
            layoutMode: 'fitRows'
          });
        })

        $inputs.on("change", function() {
          // var checked = $(this).is(":checked");

          var checkeds = [];
          $inputs.each(function(e) {
            if ($(this).prop("checked")) {
              checkeds.push($(this));
            }
          });
          // console.log(checkeds)

          if (checkeds.length > 0) {
            var text = checkeds[0].first().next().text();
            if (checkeds.length > 1) {
              text += " " + (checkeds.length - 1) + "+";
            }
          }
          $label.text(text)
          updateStatus($label, checkeds);

          // ================


          var filtering = "." + $("#current_category").val();
          var isFirst = true;
          $inputs.each(function(i) {
            if ($(this).prop("checked")) {
              if (isFirst) {
                filtering += $(this).data("filter");
                isFirst = false;
              } else {
                filtering += "," + $(this).data("filter");
              }
            }
          });
          $grid.isotope({
            filter: filtering
          });
          // ================
        });

        $(document).on("click touchstart", e => {
          if (!$(e.target).closest($(this)).length) {
            $(this).removeClass("open");
          }
        });
      });
    </script>
    <script type="text/javascript">
      $(function() {

        $('#chkveg').multiselect({
          includeSelectAllOption: true
        });
        // $('#btnget').click(function() {
        //   alert($('#chkveg').val());
        // });
      });
    </script>

  <?php
  }
  // se muestra pagina item-page.php ( /producto )
  if (is_singular("producto")) {
    ?>
    <script src="<?php bloginfo('template_url') ?>/assets/js/swiper.js"></script>

    <script type="text/javascript">
      var galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 8,
        slidesPerView: 5,
        grabCursor: true,
        loopedSlides: 5, //looped slides should be the same
      });
      var galleryTop = new Swiper('.gallery-top', {
        spaceBetween: 10,
        loop: true,
        grabCursor: true,
        loopedSlides: 5, //looped slides should be the same
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        thumbs: {
          swiper: galleryThumbs,
        },
        pagination: {
          el: '.swiper-pagination',
          type: 'fraction',
        },
      });
    </script>

  <?php
  }


  ?>

  </body>

  </html>