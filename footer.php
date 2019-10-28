



<?php if (!is_front_page()) : ?>
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
            <h4 class="footer_title_list text-white">Teléfono</h4>
            <span class="text-white">Teléfono (57)(1)602 6541</span>
          </div>
          <div class="col-md-3 footer_list_item wow fadeInDown" data-wow-delay="0.6s">
            <h4 class="footer_title_list text-white">Email</h4>
            <span class="text-white">sebastian.camacho@mazal.co</span>
          </div>
          <div data-wow-delay="0.9s" class="col-md-3 footer_list_item wow fadeInRight">
            <h4 class="footer_title_list text-white">Ubicación</h4>
            <span class="text-white">Calle 109 # 18b - 52 Local 102</span>
          </div>
        </div>
      </div>
    </div>
    <div class="footer_foot text-center">
      <span class="text-3x text-white">Mazal | Diseño industrial & Arquitectura 2019 - <strong>Todos los derechos
          reservados</strong></span>
    </div>
  </footer>

<?php endif; ?>

</main>

<script src="<?php bloginfo('template_url') ?>/assets/js/core.min.js"></script>
<script src="<?php bloginfo('template_url') ?>/assets/js/script.js"></script>

<?php 
// se muestra pagina interna-sub.php
if(is_page(36)){
  ?>
  <script src="<?php bloginfo('template_url') ?>/assets/js/bootstrap-multiselect.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_url') ?>/assets/js/isotope.pkgd.min.js"></script>
  <script type="text/javascript">
    var $grid = $('.grid-item-category').isotope({
      itemSelector: '.col-item',
      layoutMode: 'fitRows'
    });
   $('.iso-filter').click(function(){
       var filter = $(this).data('filter') 
       $grid.isotope({ filter: filter });
   })
      
    </script>
    <script type="text/javascript">

$(function() {

    $('#chkveg').multiselect({

        includeSelectAllOption: true
    });

    $('#btnget').click(function(){

        alert($('#chkveg').val());
    });
});

</script>

<?php 
}
// se muestra pagina item-page.php
if(is_page(39)){
  ?>
  <script src="<?php bloginfo('template_url') ?>/assets/js/swiper.js"></script>
  <script type="text/javascript">
    var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: 5,
      loopedSlides: 5, //looped slides should be the same
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
      
    });
    var galleryTop = new Swiper('.gallery-top', {
      spaceBetween: 10,
      loop:true,
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