
(function($) {
  "use strict";
  $.fn.imageCompare = function() {
    var container = $(this);
    if (container.children("img").length !== 2) return;
    container.addClass("imgcompare_wrapper");
    var imgs = container.children("img");
    imgs.on("dragstart", function(e) {
      e.preventDefault();
    });
    $(imgs[0]).wrap('<div class="imgcompare_left_side" />');
    $(imgs[1]).wrap('<div class="imgcompare_right_side"  />');
    container.append(
      "<div class='imgcompare_divider' ><button></button></div>"
    );
    var initPos = 0;
    var maxLeftPosition = $(imgs[0]).width();
    var flag = false;
    var divider = $(".imgcompare_divider")[0];
    divider.addEventListener(
      "mousedown",
      function(e) {
        flag = true;
        initPos = this.offsetLeft - e.clientX;
      },
      true
    );
    divider.addEventListener(
      "touchstart",
      function(e) {
        flag = true;
        initPos = this.offsetLeft - e.touches[0].pageX;
      },
      true
    );
    container[0].addEventListener(
      "mouseup",
      function() {
        flag = false;
      },
      true
    );
    container[0].addEventListener(
      "touchend",
      function() {
        flag = false;
      },
      true
    );
    container[0].addEventListener(
      "mousemove",
      function(e) {
        e.preventDefault();
        var totalPos = e.clientX + initPos;

        if (flag && maxLeftPosition > totalPos + 5) {
          $(".imgcompare_left_side").width(totalPos);
          $(divider).css({
            left: totalPos
          });
        }
      },
      true
    );
    container[0].addEventListener(
      "touchmove",
      function(e) {
        e.preventDefault();
        var totalPos = e.touches[0].clientX + initPos;

        if (flag && maxLeftPosition > totalPos + 5) {
          $(".imgcompare_left_side").width(totalPos);
          $(divider).css({
            left: totalPos
          });
        }
      },
      true
    );
  };
})(window.jQuery);
