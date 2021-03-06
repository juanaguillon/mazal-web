/**
 * Este archivo servirá para el comportamiento de el menu en responsive.
 */
(function($) {
  /*
   * directLi
   * submenuSelector
   * arrowLeftClass
   * arrowRightClass
   */

  $.fn.superMenu = function(props) {
    var directLi = $(this).children(props.directLi),
      submenuSelector = props.submenuSelector,
      arrowLeftClass = props.arrowLeftClass,
      arrowRightClass = props.arrowRightClass;

    function restoreMenu() {
      $(".super_menu_item_active").removeClass("super_menu_item_active");
      $(".super_menu_comenext").css("display", "block");
      var parentLi = $(".super_menu_comeback")
        .parent()
        .parent(directLi);
      directLi.css({
        display: "flex",
        "flex-direction": "row",
        "align-items": "center"
      });
      $(submenuSelector).css("display", "none");
      parentLi
        .siblings()
        .hide()
        .fadeIn(300);
    }

    function comeNextAction(e, elm) {
      e.stopPropagation();
      e.preventDefault();
      if (elm.hasClass("super_menu_comenext")) {
        elm.hide();
      }
      var currentLi = elm.parent("li");
      currentLi.siblings().css("display", "none");
      currentLi.css({
        display: "flex",
        "flex-direction": "column",
        "align-items": "flex-end"
      });
      currentLi.addClass("super_menu_item_active");
      var submenu = elm.siblings(submenuSelector);
      submenu.css({
        display: "block",
        "margin-top": "13px"
      });
    }

    directLi.each(function() {
      if ($(this).children(submenuSelector).length > 0) {
        var submenu = $(this).children(submenuSelector);
        submenu.css("display", "none");
        $(this)
          .children("a")
          .unbind("click")
          .click(function(e) {
            e.preventDefault()
            e.stopPropagation();
            comeNextAction(e, $(this))
          });

        submenu
          .prev("a")
          .before(
            '<li class="super_menu_comeback"><a><i class="' +
              arrowLeftClass +
              '"></i></a></li>'
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
        comeNextAction(e, $(this));
      });

    $(".super_menu_comeback")
      .off("click")
      .click(function(e) {
        e.stopPropagation();
        e.preventDefault();
        restoreMenu();
      });

    $(window).on("resize", function() {
      restoreMenu();
    });
  };
})(window.jQuery);
