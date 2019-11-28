/**
 * Este archivo se usará para añadir la funcionalidad de isotope y imagefill en la taxonomia y en el portafolio.
 * Este archivo se linkea en el footer con una condificional PHP
 */

$(function() {
  $("#chkveg").multiselect({
    includeSelectAllOption: true
  });
});

var $grid = $(".grid-item-category").isotope({
  itemSelector: ".col-item",
  layoutMode: "fitRows"
});

var resiveGrid = function(grid) {
  grid.off("arrangeComplete");
  grid.on("arrangeComplete", function() {
    $(".col-item:visible .item").imagefill();
  });
};

/**
 * Crear filtro de checkbox en la página interna (interna-sub.php)
 */
var $el = $(".dropdown");
if (isCategoria) {
  var currentSlugClassName = $("#current_category").val();
  $grid.isotope({
    filter: "." + currentSlugClassName
  });
  resiveGrid($grid);
}

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
    var text = $(this)
      .next()
      .text();
    var filter = $(this).data("filter");
    $(".sublist_children").removeClass("show");
    $("#sublist_children_" + subcat).addClass("show");
    $("#current_category").val(filter.replace(".", ""));
    $label.text(text);
    $grid.isotope({
      filter: filter
    });
    resiveGrid($grid);
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
    var checkeds = [];
    $inputs.each(function(e) {
      if ($(this).prop("checked")) {
        checkeds.push($(this));
      }
    });

    if (checkeds.length > 0) {
      var text = checkeds[0]
        .first()
        .next()
        .text();
      if (checkeds.length > 1) {
        text += " " + (checkeds.length - 1) + "+";
      }
    }
    $label.text(text);
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
    resiveGrid($grid);

    // ================
  });

  $(document).on("click touchstart", function(e) {
    if (!$(e.target).closest($(this)).length) {
      $(this).removeClass("open");
    }
  });
});
