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
              <h4 class="footer_title_list text-white"><?php echo mazal_get_acf_field("contacto_telefono_") ?></h4>
              <span class="text-white"><?php echo mazal_get_acf_field("telefono_valor_") ?></span>
            </div>
            <div class="col-md-3 footer_list_item wow fadeInDown" data-wow-delay="0.6s">
              <h4 class="footer_title_list text-white"><?php echo mazal_get_acf_field("contacto_email_") ?></h4>
              <span class="text-white"><?php echo mazal_get_acf_field("email_valor_") ?></span>
            </div>
            <div data-wow-delay="0.9s" class="col-md-3 footer_list_item wow fadeInRight">
              <h4 class="footer_title_list text-white"><?php echo mazal_get_acf_field("contacto_direccion_") ?></h4>
              <span class="text-white"><?php echo mazal_get_acf_field("direccion_valor_") ?></span>
            </div>
          </div>
        </div>
      </div>
      <div class="footer_foot text-center">
        <?php
          $rightTotal = mazal_get_acf_field("copyright_");
          $rigths1 = explode(" - ", $rightTotal)[0];
          $rigths2 = explode(" - ", $rightTotal)[1];
          ?>
        <span class="text-3x text-white"><?php echo $rigths1 ?> - <strong id="rights_footer"><?php echo $rigths2 ?></strong></span>
      </div>
    </footer>

  <?php endif; ?>

  </main>

  <script src="<?php bloginfo('template_url') ?>/assets/js/core.min.js"></script>
  <script src="<?php bloginfo('template_url') ?>/assets/js/script.js"></script>

  <?php
  if (is_tax("categoria") || mazal_is_portfolio_page() || is_search()) {
    ?>
    <script type="text/javascript" src="<?php bloginfo('template_url') ?>/assets/js/bootstrap-multiselect.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url') ?>/assets/js/isotope.pkgd.min.js"></script>
    <script>
      // Se verifica para usar en el archivo tax-portfolio
      var isCategoria = false;
      <?php if (is_tax("categoria")) : ?>
        isCategoria = true;
      <?php endif; ?>
    </script>
    <script type="text/javascript" src="<?= bloginfo("template_url") ?>/assets/js/tax-portfolio.js"></script>

  <?php
  }
  ?>

  </body>

  </html>