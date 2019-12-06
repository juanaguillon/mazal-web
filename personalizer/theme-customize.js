(function($) {
  wp.customize("mazal_color_chocolate", function(value) {
    value.bind(function(newval) {
      document.documentElement.style.setProperty("--chocolate", newval);
    });
  });
  wp.customize("mazal_color_dorado", function(value) {
    value.bind(function(newval) {
      document.documentElement.style.setProperty("--dorado", newval);
    });
  });
  wp.customize("mazal_color_yellow", function(value) {
    value.bind(function(newval) {
      document.documentElement.style.setProperty("--yellowcolor", newval);
    });
  });
})($);
