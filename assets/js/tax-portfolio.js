$(window).on("load", function() {
  /**
   * Este archivo se usará para añadir la funcionalidad de isotope y imagefill en la taxonomia y en el portafolio.
   * Este archivo se linkea en el footer con una condificional PHP
   */

  $("#chkveg").multiselect({
    includeSelectAllOption: true
  });

  // init Isotope
  var selectorItem = ".col-item";
  var $grid = $(".grid-item-category").isotope({
    itemSelector: selectorItem,
    layoutMode: "fitRows"
  });
  var initial_items = 6;
  var next_items = 3;
  var quantityElm = $("#count_actual_items_show");

  var updateCount = function() {
    var actualCount = parseInt(quantityElm.val()) + next_items;
    quantityElm.val(actualCount);
  };

  var resizePhoto = function(jqueryImg) {
    var refRatio = 380 / 230;
    var parentIMG = jqueryImg.parent();
    var imgH = jqueryImg.height();
    var imgW = jqueryImg.width();

    if (imgW / imgH < refRatio) {
      parentIMG.imagefill();
      // parentIMG.removeClass("imgfill_h");
      // parentIMG.addClass("imgfill_w");
    } else {
      parentIMG.imagefill();
      // parentIMG.removeClass("imgfill_w");
      // parentIMG.addClass("imgfill_h");
    }
  };

  var hideItems = function(gridC) {
    var quantityCount = quantityElm.val();
    var itemsShow = gridC.isotope("getFilteredItemElements");
    var counter = 0;
    var filterClass = document
      .getElementById("load_more_filter_items")
      .getAttribute("data-filter");

    $(itemsShow).each(function(i, elm) {
      if (counter < parseInt(quantityCount)) {
        filterClass = filterClass.replace(".", "");
        if ($(this).hasClass(filterClass) || counter <= itemsShow.length) {
          var img = $(this).find("img");
          img.on("load", function() {
            resizePhoto($(this));
          });
          img[0].src = img.data("src");
          $(this).removeClass("hide_item");
          counter++;
          console.log("HIDDING");
          $(".more-items").hide();
        }
      } else {
        $(".more-items").show();
        $(this).addClass("hide_item");
      }
    });
  };

  $("#load_more_filter_items").click(function(e) {
    e.preventDefault();
    updateCount();
    hideItems($grid);
    $grid.isotope("layout");
  });

  var resiveGrid = function(filter) {
    $("#load_more_filter_items")[0].setAttribute("data-filter", filter);
    quantityElm.val(initial_items);
    $grid.isotope({ filter: filter });
    hideItems($grid);
    $grid.isotope("layout");
  };

  /**
   * Crear filtro de checkbox en la página interna (interna-sub.php)
   */
  var $el = $(".dropdown");
  if (isCategoria) {
    var currentSlugClassName = $("#current_category").val();
    var filter = "." + currentSlugClassName;
    resiveGrid(filter);
  }

  function updateStatus(label, result ) {
    $(".dropdown").removeClass("open");
    if (result === "") {
      label.text(label.data("emplabel"));
    }
    // if (!result.length) {
    //   label.text(label.data("emplabel"));
    // }
  }

  $el.each(function(i, element) {
    var $label = $(this).find(".dropdown-label"),
      $inputs = $(this).find(".check"),
      unique = $(this).find(".check-unique");

    $label.on("click", e => {
      e.stopPropagation();
      $(".dropdown").removeClass("open");
      $(this).toggleClass("open");
    });
    unique.on("change", function() {
      var subcat = $(this).data("subcat");
      var text = $(this)
        .next()
        .text();
      var filter = $(this).data("filter");
      $(".sublist_children").removeClass("show");
      $("#sublist_children_" + subcat).addClass("show");
      $("#current_category").val(filter.replace(".", ""));
      $label.text(text);
      // $grid.isotope({
      //   filter: filter
      // });
      resiveGrid(filter);
    });

    // Estos inputs serán visiblen el portafolio, se representan con el color "Dorado (Marrón)"
    // $inputsPort.on("change", function() {
    //   var subcatContent = $(this).data("subcat_content");
    //   var encampsuld = $(this).data("encapsuled");
    //   $("." + encampsuld + ".subcat_content_portfolio").removeClass("show");
    //   $("#subcat_content_" + subcatContent).addClass("show");

    //   $grid.isotope({
    //     itemSelector: ".col-item",
    //     layoutMode: "fitRows"
    //   });
    // });

    $inputs.on("change", function() {
      // var checkeds = [];

      /**
       * MOstrar los labels +1 o +2, etcera
       * Ejemplo: Arquitectura, DIseño interior, Hogar, Mostrará "Arquitectura +2" en el label
       */
      var text = "";
      // $inputs.each(function(e) {
      // console.log("X");
      if ($(this).prop("checked")) {
        // checkeds.push($(this));
        var classesToUncheck = $(this).data("classonselect");
        $("." + classesToUncheck).prop("checked", false);
        $(this).prop("checked", true);
        text = $(this)
          .first()
          .next()
          .text();
        // return;
      }
      // });

      // console.log(text);
      // if (checkeds.length > 0) {
      //   // var text = checkeds[0]
      //   //   .first()
      //   //   .next()
      //   //   .text();
      //   // if (checkeds.length > 1) {
      //   //   text += " " + (checkeds.length - 1) + "+";
      //   // }
      // }
      $label.text(text);
      updateStatus($label, text);

      // ================

      var filtering = "." + $("#current_category").val();
      if ($(this).data("filter") !== "*") {
        filtering += $(this).data("filter");
      }
      var isFirst = true;
      // $inputs.each(function(i) {
      //   if ($(this).prop("checked")) {
      //     if (isFirst) {
      //       filtering += $(this).data("filter");
      //       isFirst = false;
      //     } else {
      //       filtering += "," + $(this).data("filter");
      //     }
      //   }
      // });
      resiveGrid(filtering);
    });
    $(document).on("click touchstart", function(e) {
      if (!$(e.target).closest($(this)).length) {
        $(this).removeClass("open");
      }
    });
  });

  $("body").click(function() {
    $(".dropdown").removeClass("open");
  });
});
