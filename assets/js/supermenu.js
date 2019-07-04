(function($) {
  /*
   * directLi
   * submenuSelector
   * arrowLeftClass
   * arrowRightClass
   */
  $.fn.superMenu = function(props) {
    var directLi = $(this).children(props.directLi),
      submenuSelector = props.submenuSelector;
    arrowLeftClass = props.arrowLeftClass;
    arrowRightClass = props.arrowRightClass;

    directLi.each(function() {
      if ($(this).children(submenuSelector).length > 0) {
        var submenu = $(this).children(submenuSelector);
        submenu.css("display", "none");

        submenu.prepend(
          '<li class="super_menu_comeback"><a><i class="' +
            arrowLeftClass +
            '"></i><span>Volver</span></a></li>'
        );
        $(this).append(
          '<a class="super_menu_comenext"><i class="' +
            arrowRightClass +
            '"></i></a>'
        );
      }
    });
    $(".super_menu_comenext")
      .off("click")
      .on("click", function(e) {
        $(this).hide();
        $(this)
          .prev("a")
          .addClass("super_menu_title_active");
        var currentLi = $(this).parent("li");
        currentLi.siblings().css("display", "none");
        currentLi.css({
          display: "flex",
          "flex-direction": "column",
          "align-items": "flex-end"
        });
        currentLi.addClass("super_menu_item_active");
        var submenu = $(this).prev(submenuSelector);
        submenu.css({
          display: "block",
          "margin-top": "13px"
        });
      });

    $(".super_menu_comeback")
      .off("click")
      .click(function() {
        $(".super_menu_item_active").removeClass("super_menu_item_active");
        $(".super_menu_comenext").css("display", "block");
        var parentLi = $(this)
          .parent()
          .parent(directLi);
        directLi.css({
          display: "flex",
          "flex-direction": "row"
        });
        $(submenuSelector).css("display", "none");
        parentLi
          .siblings()

          .hide()
          .fadeIn(300);
      });
  };
})(window.jQuery);
