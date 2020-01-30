var $document = $(document),
  $window = $(window),
  desktopWidth = 996,
  tabletWidth = 768,
  mobileWidth = 548,
  headerHeight = 70,
  regexEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
/* Cambiar la clase para mostrar el menú en responsive
/*/

var setCookie = function(name, value) {
  var d = new Date();
  var year = d.getFullYear();
  var month = d.getMonth();
  var day = d.getDate();
  var c = new Date(year + 1, month, day);

  var cookie = [
    name,
    "=",
    JSON.stringify(value),
    "; domain=.",
    window.location.host.toString(),
    "; path=/; expires=",
    c
  ].join("");
  document.cookie = cookie;
};
var getCookie = function(name) {
  var result = document.cookie.match(new RegExp(name + "=([^;]+)"));
  result && (result = JSON.parse(result[1]));
  return result;
};

var delete_cookie = function(name) {
  document.cookie = name + "=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;";
};

function deleteFavoriteByKey(key) {
  var prodSaved = getCookie("productsmz");
  return prodSaved
    .toString() // Pasar a string en caso que sea un número
    .replace(key, "") // Buscar el id de producto actual y eliminarlo.
    .trim(); // Eliminar espacios inncesarios.
}

function toggleClassToMenuInResponse() {
  $(".header_top_list").removeClass("active");
  if ($window.width() <= 1300) {
    $("#icon_bars").unbind("click");
    $("#icon_bars").click(function(e) {
      e.stopPropagation();
      $(".header_top_list").toggleClass("active");
    });

    $("body").click(function() {
      $(".header_top_list").removeClass("active");
    });

    $(".header_top_list").click(function(e) {
      e.stopPropagation();
    });
  }
}
/** Cambiar header al hacer scroll */
function changeTheHeaderWhenScrolling() {
  // En algunas páginas se desea que no exista el comportamiento de cambiar el estilo del header
  var header = $("header.enable_scroll");
  $document.scroll(function() {
    if ($document.scrollTop() > 100) {
      header.addClass("in_scroll");
      $("header.enable_scroll .black_background").hide();
    } else {
      header.removeClass("in_scroll");
      $("header.enable_scroll .black_background").show();
    }
  });
}
/**
 * Mostrar información dinámica del Nav
 * Cuando se haga hover por ciertos elementos elementos del navbar, este trigger visualizará el menu dinamico abajo del Navbar.
 */
function toggleDynamicDataFromNav() {
  var onHover = function() {
    $("nav.header_top").addClass("black");
    // Enviará true si se esta ejecutando desde el li.has_dynamic
    if ($(this).data("dynamic")) {
      var dynm = $(this).data("dynamic");
      $(".dynamic_data").removeClass("active");
    }
    $("." + dynm).addClass("active");
    $(".dynamic_header_top").addClass("active");
    $(this).addClass("active");
  };
  var outHover = function() {
    $("nav.header_top").removeClass("black");
    $(".dynamic_header_top").removeClass("active");
    $(this).removeClass("active");
  };
  $(".header_top_list li.has_dynamic,.dynamic_header_top").hover(
    onHover,
    outHover
  );
}

/**
 * Activar el modal de busqueda cuando se de click en el botón de buscar en el Header
 */
function toggleTheModalToSearchInWebsite() {
  $(".button_close_modal").click(function() {
    $(".modal_mazal ").removeClass("active");
    $("body").css("overflow-y", "visible");
  });
  var modals = {
    productCotizar: {
      containerSelector: "#modal_product_cotize",
      buttonClose: "#modal_product_cotize .button_close_modal",
      buttonOpen: "#open_modal_cotizar"
    },
    search: {
      containerSelector: ".search_modal_form",
      buttonOpen: "#icon_search, #icon_search2",
      buttonClose: ".search_modal_form .button.button.button-cuadro"
    }
  };
  var search = modals.search;
  $(search.buttonOpen).click(function(e) {
    $("body").css("overflow-y", "hidden");
    $(search.containerSelector).addClass("active");
  });
  $(search.buttonClose)
    .off("click")
    .click(function() {
      $("body").css("overflow-y", "visible");
      $(search.containerSelector).removeClass("active");
    });

  var product = modals.productCotizar;
  $(product.buttonOpen).click(function(e) {
    $("body").css("overflow-y", "hidden");
    $(product.containerSelector).addClass("active");
    $(".quoted-product").imagefill();
  });
  $(product.buttonClose)
    .off("click")
    .click(function() {
      $("body").css("overflow-y", "visible");
      $(product.containerSelector).removeClass("active");
    });
  $("body")
    .off("keydown")
    .keydown(function(event) {
      if (event.type === "keydown") {
        if (event.keyCode === 27) {
          $("#modal_product_cotize, .search_modal_form").removeClass("active");
        }
      }
    });
}

/**
 * Enviar el mail de contacto
 */
function sendContactMail() {
  $("#contacto_form").submit(function(e) {
    e.preventDefault();

    var nombre = $("#contact_name").val();
    var email = String($("#contact_email").val()).toLowerCase();
    var phone = $("#contact_phone").val();
    var city = $("#contact_city").val();
    var message = $("#contact_message").val();
    var canSend = true;

    var smp1 = $("#sprm_fld").val();
    var smp2 = $("#sprm_fld2").val();

    if (
      city == "" ||
      nombre == "" ||
      email == "" ||
      phone == "" ||
      message == ""
    ) {
      canSend = false;
    }
    if (!regexEmail.test(email)) {
      canSend = false;
    }

    if (!canSend) {
      $("#contact_map_message").addClass("show");
      $("#contact_map_message .contact_map_error").addClass("show");
      $("#contact_map_message .contact_map_success").removeClass("show");
    } else {
      $("#loading_contact_map").addClass("show");

      $.ajax({
        // Puede ver mainURL en el archivo header.php
        url: mailUrl,
        method: "POST",
        data: {
          nombre: nombre,
          email: email,
          ciudad: city,
          cell: phone,
          mensaje: message,
          data_spmr: smp1,
          data_spmr2: smp2
          // Verificar si está haciendo peticion de cotización.
          // Esta se hará en la ficha de producto.
          // isRequest: false
        },
        success: function(resp) {
          console.log(resp);
          $("#contact_map_message").addClass("show");
          $("#loading_contact_map").removeClass("show");
          // console.log(resp);
          if (resp == 1) {
            $("#contact_map_message .contact_map_error").removeClass("show");
            $("#contact_map_message .contact_map_success").addClass("show");
          } else {
            $("#contact_map_message .contact_map_error").text(
              "Error al enviar mensaje, intente nuevamente."
            );
            $("#contact_map_message .contact_map_error").addClass("show");
            $("#contact_map_message .contact_map_success").removeClass("show");
          }

          // alert("LISTO")
          // console.log(resp);
        }
      });
    }
  });
}

/**
 * Enviar cotización de un producto o cotización de multiples productos.
 * Debe tener en cuenta que en la ficha de producto puede salir el modal para cotizar un solo producto, o en el header, la lista de multiples cotizaciones.
 */
function sendCotizarMail() {
  $("#send_cotizaction, #send_lote_cotizacion").submit(function(e) {
    var singleCotizacionAjax = function(prefixID) {
      var urlCotizando = $("#url_cotizar").val();
      var imgCotizando = $("#image_cotizar").val();
      var nameCotizando = $("#name_cotizar").val();

      $.ajax({
        // Puede ver mainURL en el archivo header.php
        url: mailUrl,
        method: "POST",
        data: {
          nombre: nombre,
          email: email,
          ciudad: city,
          cell: phone,
          mensaje: message,
          urlCotiza: urlCotizando,
          nameCotiza: nameCotizando,
          imgCotiza: imgCotizando,
          // Verificar si está haciendo peticion de cotización.
          // Esta se hará en la ficha de producto.
          isRequest: true
        },
        success: function(resp) {
          $("#" + prefixID + "message").addClass("show");
          $("#" + prefixID + "loading").removeClass("show");
          console.log(resp);
          if (resp == 1) {
            $("#" + prefixID + "message .cotizar_error").removeClass("show");
            $("#" + prefixID + "message .cotizar_success").addClass("show");
          } else {
            $("#" + prefixID + "message .cotizar_error").text(
              "Error al enviar mensaje, intente nuevamente."
            );
            $("#" + prefixID + "message .cotizar_error").addClass("show");
            $("#" + prefixID + "message .cotizar_success").removeClass("show");
          }
        }
      });
    };

    var loteCotizacionajax = function(prefixID) {
      var valsJSON = JSON.parse($("#cotize_vals").val());
      $.ajax({
        url: mailUrl,
        method: "POST",
        data: {
          products: valsJSON,
          nombre: nombre,
          email: email,
          ciudad: city,
          cell: phone,
          mensaje: message,
          is_request_lote: true
        },
        dataType: "json",
        success: function(edata) {
          $("#" + prefixID + "message").addClass("show");
          $("#" + prefixID + "loading").removeClass("show");
          if (edata == 1) {
            $("#" + prefixID + "message .cotizar_error").removeClass("show");
            $("#" + prefixID + "message .cotizar_success").addClass("show");
          } else {
            $("#" + prefixID + "message .cotizar_error").text(
              "Error al enviar mensaje, intente nuevamente."
            );
            $("#" + prefixID + "message .cotizar_error").addClass("show");
            $("#" + prefixID + "message .cotizar_success").removeClass("show");
          }
        }
      });
    };

    e.preventDefault();

    var prefixID = $(this).data("prefix");

    var nombre = $("#" + prefixID + "name").val();
    var email = String($("#" + prefixID + "email").val()).toLowerCase();
    var phone = $("#" + prefixID + "phone").val();
    var city = $("#" + prefixID + "city").val();
    var message = $("#" + prefixID + "msj").val();

    var canSend = true;
    var messageError = "";
    if (
      city == "" ||
      nombre == "" ||
      email == "" ||
      phone == "" ||
      message == ""
    ) {
      canSend = false;
    }
    if (!regexEmail.test(email)) {
      canSend = false;
    }

    if (!canSend) {
      $("#" + prefixID + "message").addClass("show");
      $("#" + prefixID + "message .cotizar_error").addClass("show");
      $("#" + prefixID + "message .cotizar_success").removeClass("show");
    } else {
      $("#" + prefixID + "loading").addClass("show");
      if (prefixID === "cotization_lote_") {
        loteCotizacionajax(prefixID);
      } else if (prefixID === "cotization_") {
        singleCotizacionAjax(prefixID);
      }
    }
  });
}

/* ========================= */
/* FINAL GENERALES */
/* ========================= */
/* ========================= */
/* PAGINA INDEX */
/* ========================= */
/** Crear scroll en el navbar principal */
function ScrolMapFromNavbar() {
  $(".header_top_list li a").click(function(e) {
    var attr = $(this).attr("href");
    if (typeof attr === typeof undefined || attr == "#") {
      e.preventDefault();
      $(".header_top").removeClass("black");
      $(".header_top_list").removeClass("active");
      $(".dynamic_header_top").removeClass("active");
      var anchor = $("#section_" + $(this).data("scroll"));
      $("html,body").animate(
        { scrollTop: anchor.offset().top - headerHeight },
        1500,
        "easeInOutExpo"
      );
    }
  });
}
/** Movimiento de hover en el banner.*/
function makeHoverMoveInBanner() {
  if ($window.width() >= desktopWidth) {
    $(".right_image_conent").hover(
      // Cuando haga hover
      function() {
        $(this)
          .prev(".left_image_conent")
          .addClass("less");
        $(this).addClass("more");
      },
      // Cuando quite el hover
      function() {
        $(this)
          .prev(".left_image_conent")
          .removeClass("less");
        $(this).removeClass("more");
      }
    );
    $(".left_image_conent").hover(
      // Cuando haga hover
      function() {
        $(this)
          .next(".right_image_conent")
          .addClass("less");
        $(this).addClass("more");
      },
      // Cuando quite el hover
      function() {
        $(this)
          .next(".right_image_conent")
          .removeClass("less");
        $(this).removeClass("more");
      }
    );
  } else {
    $(".right_image_conent").unbind("hover");
    $(".left_image_conent").unbind("hover");
  }
}
/** Comportamientos del popup */
function hidePopup() {
  $(".popup_container").fadeOut(300);
  $(".popup_wrapper").removeClass("move");
}
function showPopup() {
  if ($("#agendar").is(":hidden")) {
    $("#agendar")
      .css("display", "flex")
      .hide()
      .fadeIn(300);
    $(".popup_wrapper").addClass("move");
  }
}
function showPopupMobiliario() {
  if ($("#mobiliario_popup").is(":hidden")) {
    $("#mobiliario_popup")
      .css("display", "flex")
      .hide()
      .fadeIn(300);
    $(".popup_wrapper").addClass("move");
    // $(".popup_right, .popup_left").imagefill();
  }
}
setTimeout(showPopup, 5000);
$(".mini_logo").click(function(e) {
  e.stopPropagation();
  showPopup();
});
$("html, .popup_close button").click(hidePopup);
$("html, body").keydown(function(e) {
  if (e.keyCode == 27) {
    hidePopup();
  }
});
$(".popup_wrapper").click(function(e) {
  e.stopPropagation();
});
// Abre las categorias de mobiliario
$(".mobiliario").click(function(e) {
  e.stopPropagation();
  showPopupMobiliario();
});
/**
 * Agregar el trigger de los submenu en el header de Index.
 */
function changeTheSubmenuInHeader() {
  $(".header_top_list").superMenu({
    directLi: "li",
    submenuSelector: ".header_top_submenu",
    arrowLeftClass: "icon-arrow_left text-white",
    arrowRightClass: "icon-arrow_right text-white"
  });
}
// /** =========================== */
// /** FINAL PAGINA INDEX */
// /** =========================== */
// /** =========================== */
// /** PAGINA INTERNA */
// /** =========================== */
// /** */

// /* Final Inicializar Plugins */
// /** Cambiar imagen en antes y despues */
function changeCurrentImageInBeforeAfter() {
  $(".bef_aft_image_photo").on("click touchstart", function(e) {
    e.stopPropagation();
    var imgSelected = $(this).children("img");
    var before = imgSelected.data("before");
    var after = imgSelected.data("after");
    var befText = imgSelected.data("tb");

    $(".imgcompare_left_side img").attr("src", before);
    $(".imgcompare_right_side img").attr("src", after);
    $("#bef_aft_before").text(befText);
    // $("#bef_aft_after").text(aftText);
  });
}
/**
 * Activar la linea inferior en los li de el menu principal, cuando se llegue a cierta sección en específica.
 */
function activeTheLineInTheHeaderMenuInScrolling() {
  if ($window.width() < 991) {
    return false;
  }
  if (typeof _head__sectionsSelector === "undefined") {
    return;
  }
  var sectionsSelector = _head__sectionsSelector;
  var inheritSections = [
    "tres60",
    "portafolio",
    "before_after",
    "galeria",
    "clientes",
    "contacto"
  ];
  for (var i = 0; i < inheritSections.length; i++) {
    sectionsSelector.push(inheritSections[i]);
  }
  // La variable "_head__sectionsSelector" La puede encontrar en el archivo Header.php, pues se cargan dinámicamente.
  var sectionsElements = [];
  for (var i = 0; i < sectionsSelector.length; i++) {
    var csection = $("#section_" + sectionsSelector[i]);
    if (csection.length) {
      var objAdded = {
        element: csection,
        elementHeight: csection.height(),
        position: csection.offset().top,
        li_class: $(".header_top_list > li." + sectionsSelector[i])
      };
      sectionsElements.push(objAdded);
    }
  }

  window.onscroll = function() {
    var pagePosition = $("html").scrollTop();
    for (var i = 0; i < sectionsElements.length; i++) {
      var element = sectionsElements[i];
      if (
        element.position <= pagePosition + headerHeight &&
        element.position >
          pagePosition + headerHeight - ($window.height() - headerHeight)
      ) {
        element["li_class"].addClass("active");
      } else {
        element["li_class"].removeClass("active");
      }
    }
  };
}

/**
 * Crear el scroll a la seccion especifica en caso de enviar un query Param.
 * Por ejemplo, en el index, se crea un link a diferente secciones. Esta funcion hará el scroll animado.
 */
function makeScrollIfExistsTheQueryParam() {
  function gup(name, url) {
    if (!url) url = location.href;
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regexS = "[\\?&]" + name + "=([^&#]*)";
    var regex = new RegExp(regexS);
    var results = regex.exec(url);
    return results == null ? null : results[1];
  }

  var sectionParam = gup("section", window.location.href);
  if (sectionParam) {
    var anchor = $("#section_" + sectionParam);
    $("html,body").animate(
      { scrollTop: anchor.offset().top - headerHeight },
      1500,
      "easeInOutExpo"
    );
  }
}

/**
 * Esconder el icono/contacto de whatsapp despues de una hora especifica
 */
function showWhatsappInSpecificHours() {
  var nowTime = new Date().getHours();
  if (nowTime < 7 || nowTime > 19) {
    $("#whatsapp_contact").remove();
  } else {
    $("#whatsapp_contact").addClass("whatsapp_active");
  }
}

/**
 * En la ficha de producto es posible agregar los productos a los favoritos.
 */
function addToFavorite() {
  $(".add-love").click(function(e) {
    e.preventDefault();
    var idProd = $(this).data("fav");
    var prodSaved = getCookie("productsmz");
    var newProdsCookies = null;
    /**
     * Será activo en caso que se de click en el producto que está añadido a favoritos.
     */
    if ($(this).hasClass("active")) {
      newProdsCookies = deleteFavoriteByKey(idProd); // Eliminar espacios inncesarios.
    } else {
      if (prodSaved === null || prodSaved === "") {
        newProdsCookies = idProd.toString();
      } else {
        prodSaved += " " + idProd;
        newProdsCookies = prodSaved;
      }
    }

    setCookie("productsmz", newProdsCookies);
    $.ajax({
      url: ajaxUrl,
      data: {
        action: "get_favs"
      },
      success: function(res) {
        $("#icon_favorites").html(res);
        actionsInFavoritesPanel();
      }
    });

    $(this).toggleClass("active");
  });
}

/**
 * En la ficha de producto, se puede enviar el formulario de subsripción a MailChimp
 */
function sendSubscribeForm() {
  var text = $("#text_mailchimp_sub");
  var button = $("#send_mailchimp_sub");
  button.click(function(e) {
    $("#loading_contact_subscribe").addClass("show");
    $(this).attr("disabled", "disabled");
    $.ajax({
      url: chimpUrl,
      method: "POST",
      data: {
        mail_subscribed: true,
        mailchimp_text: text.val()
      },
      success: function(data) {
        console.log(data);
        if (data == "1") {
          $(".mailchimp_message .message-danger").removeClass("show");
          $(".mailchimp_message .message-success").addClass("show");
        } else {
          $(".mailchimp_message .message-danger").addClass("show");
          $(".mailchimp_message .message-success").removeClass("show");
        }
        $("#loading_contact_subscribe").removeClass("show");
        $(this).removeAttr("disabled");
      }
    });
  });
}

// /**
//  * Agregar funcionalidad de pestañas ( Tabs )
//  */
// function initTabs() {
//   $(".tabs ul li").click(function() {
//     $(".tabs ul li").removeClass("active");
//     $(this).addClass("active");
//     var idContent = $(this).data("content");
//     $(".content-tab").removeClass("show");
//     $("#content_tab_" + idContent).addClass("show");

//     var $grid = $(".grid-item-category").isotope({
//       itemSelector: ".col-item",
//       layoutMode: "fitRows"
//     });
//   });
// }

/**
 * Conectar página con facebook para poder compartir productos.
 */
function connectToFb() {
  (function(d, s, id) {
    var js,
      fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
      return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  })(document, "script", "facebook-jssdk");

  window.fbAsyncInit = function() {
    FB.init({
      appId: 397559747817271,
      autoLogAppEvents: true,
      xfbml: true,
      version: "v3.3"
    });
    FB.AppEvents.logPageView();
  };
  (function($) {
    $(".facebook_share").on("click", function(event) {
      event.preventDefault();
      event.stopImmediatePropagation();

      var linkshare = window.location.href;
      var titleshare = $(this).data("nombre");
      var descripshare = $(this).data("descrip");
      var imgshare = $(this).data("urlimg");
      var FBDesc = descripshare;
      var FBTitle = titleshare;
      var FBLink = linkshare;
      var FBPic = imgshare;
      FB.ui(
        {
          method: "share",
          action_type: "og.likes",
          mobile_iframe: true,
          action_properties: JSON.stringify({
            object: {
              "og:url": FBLink,
              "og:title": FBTitle,
              "og:description": FBDesc,
              "og:image": FBPic
            }
          })
        },
        function(response) {}
      );
    });
  })(jQuery);
}

/**
 * En la ficha de producto, existe el botón de whatsapp.
 * Cuando está en móvil, abrirá la aplicación WhatsApp, en escritorio abrirá la pestaña de Whatsapp.
 * Esta función hará funcionar este comportamiento
 */
function redirectWhatsappIfMobile() {
  var mobileAndTabletcheck = function() {
    var check = false;
    (function(a) {
      if (
        /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(
          a
        ) ||
        /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| ||a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(
          a.substr(0, 4)
        )
      )
        check = true;
    })(navigator.userAgent || navigator.vendor || window.opera);
    return check;
  };

  if (mobileAndTabletcheck()) {
    var link = $("#share_whatsapp_product").data("link-mb");
    $("#share_whatsapp_product").attr("href", link);
  } else {
    var link = $("#share_whatsapp_product").data("link-ds");
    $("#share_whatsapp_product").attr("href", link);
  }
}

/**
 * Verificar que se esté haciendo una búsqueda correcta.
 * Esta función pretende que el usuario ingresa al menos una palabra al buscar en la web.
 */
function alertOnRightSearching() {
  $("#form_search_general").submit(function(e) {
    // e.preventDefault();
    function showError(text) {
      $("#danger_form_search span").text(text);
      $("#danger_form_search").removeClass("d-none");
      setTimeout(function() {
        $("#danger_form_search").addClass("d-none");
      }, 6000);
    }
    if ($("#form_search_text").val() == "") {
      showError($("#form_search_text").data("message"));
      return false;
    }
  });
}

/**
 * Toda la funcionalidad que estará dentro el panel de Favoritos
 * Como agregar/quitar numero de cotizaciones, cambiar estado de checkbox, eliminar favoritos
 */
function actionsInFavoritesPanel() {
  $(".count").unbind("click");
  $(".plus").unbind("click");
  $(".minus").unbind("click");
  $("#icon_favorites .checkbox-custom-label").unbind("click");
  $(".action_delete").unbind("click");
  $(".confirm_delete_item").unbind("click");
  $("#cotizar_lote").unbind("click");

  $(document).ready(function() {
    $(".count").prop("disabled", true);
    $(".plus").on("click", function(e) {
      e.preventDefault();
      $(this)
        .prev(".count")
        .val(
          parseInt(
            $(this)
              .prev(".count")
              .val()
          ) + 1
        );
    });
    $(".minus").on("click", function(e) {
      e.preventDefault();
      var inputChange = $(this).next(".count");
      inputChange.val(parseInt(inputChange.val()) - 1);
      if (inputChange.val() == 0) {
        inputChange.val(1);
      }
    });

    $("#icon_favorites .checkbox-custom-label").click(function(e) {
      e.preventDefault();
      if ($(this).hasClass("active")) {
        $(this).removeClass("active");
        $(this)
          .prev("input")
          .prop("checked", false);
      } else {
        $(this).addClass("active");

        $(this)
          .prev("input")
          .prop("checked", true);
      }
      if (!$("#icon_favorites .checkbox-custom-label.active").length) {
        $("#cotizar_lote_error_minimum").addClass("show");
        $("#cotizar_lote").attr("disabled", "disabled");
      } else {
        $("#cotizar_lote_error_minimum").removeClass("show");
        $("#cotizar_lote").removeAttr("disabled", "disabled");
      }
    });

    $(".action_delete").click(function() {
      var iEl = $(this).find("i");
      if (iEl.hasClass("icon-heart")) {
        iEl.removeClass("icon-heart");
        iEl.addClass("icon-heart-o");
      } else {
        iEl.removeClass("icon-heart-o");
        iEl.addClass("icon-heart");
      }

      $(this)
        .children(".confirm_delete_item")
        .toggleClass("show");
    });

    $(".confirm_delete_item").click(function(e) {
      e.preventDefault();
      var dataDelete = $(this).data("delete");
      $(this)
        .closest("li")
        .remove();

      var newKeys = deleteFavoriteByKey(dataDelete);
      setCookie("productsmz", newKeys);
    });

    $("#cotizar_lote").click(function(e) {
      $("#modal_favorites_cotize").addClass("active");
      $("body").css("overflow-y", "hidden");

      var ids = [];
      $(".favorites_checkbox:checked").each(function() {
        var quantity = $(this)
          .parent()
          .next("a")
          .find(".count")
          .val();
        var objProd = {
          id: $(this).val(),
          quantity: quantity
        };
        ids.push(objProd);
      });

      $.ajax({
        url: ajaxUrl,
        // dataType: "json",
        data: {
          ids: ids,
          action: "get_prods_cotize"
        },
        success: function(edata) {
          $("#fav_cotizar_wrap").html(edata);
          $(".delete_favorite").unbind("click");
          $(".delete_favorite").click(function(e) {
            e.preventDefault();
            var delKey = $(this).data("delete");
            var reusultWithoytKey = deleteFavoriteByKey(delKey);
            setCookie("productsmz", reusultWithoytKey);
            $(this)
              .closest(".fav_cotizar")
              .remove();
          });

          $(".edit_favorite_inputn").change(function() {
            var quantiry = $(this).val();
            var dataInput = $(this).data("keynumber");
            var prefJson = JSON.parse($("#cotize_vals").val());
            prefJson[dataInput]["product_quantity"] = quantiry;
            $("#cotize_vals").val(JSON.stringify(prefJson));
          });
        }
      });
    });
  });
}

/* Inicializar Plugins */
function plugnsInit() {
  var slickClientsOptions = {
    dots: true,
    infinite: true,
    arrows: false,
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: true,
    pauseOnHover: false,
    autoplaySpeed: 3000,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 548,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  };
  var slickGalleryPhotos = {
    dots: false,
    infinite: true,
    arrows: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    pauseOnHover: false,
    autoplaySpeed: 6000,
    prevArrow: $(".arrow_galeria.arrow_left"),
    nextArrow: $(".arrow_galeria.arrow_right")
  };
  var slickBannerOptions = {
    dots: true,
    infinite: true,
    arrows: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    speed: 300,
    autoplaySpeed: 8000,
    prevArrow: $("#banner_nav_prev"),
    nextArrow: $("#banner_nav_next")
  };

  var slickBeforeAfer = {
    nextArrow: ".arrow_down",
    prevArrow: ".arrow_up",
    dots: false,
    infinite: true,
    speed: 300,
    vertical: true,
    slidesToShow: 5,
    slidesToScroll: 3,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true
        }
      },
      {
        breakpoint: 992,
        settings: {
          vertical: false,
          slidesToShow: 3,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 768,
        settings: {
          vertical: false,
          slidesToShow: 2,
          slidesToScroll: 1
        }
      }
    ]
  };

  var slickProductSliderGallery = {
    infinite: true,
    arrows: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    speed: 300,
    asNavFor: "#gallery_product_slick"
    // touchMove: false
  };
  var slickProductSliderThumb = {
    infinite: true,
    arrows: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: false,
    speed: 300,
    asNavFor: "#image_product_slick",
    prevArrow: $(".swiper-button-prev"),
    nextArrow: $(".swiper-button-next"),
    // centerMode: true,
    focusOnSelect: true
  };

  // $(".galeria_photo_wrap, .galeria_principal_image > a").imagefill();
  $(".bef_aft_image_photo").imagefill();
  $(".dynamic_image_container").imagefill();
  $(".portafolio_single_image").imagefill();
  $(".single_linea_image").imagefill();
  $(".image-related-item").imagefill();
  $(".col-item .item").imagefill();
  $(".banner_image").imagefill();
  // $(".popup_right, .popup_left").imagefill();

  $(".bf_image_sized").imageCompare();

  $(".clietes_list").slick(slickClientsOptions);
  $(".galeria_photos").on("init", function() {
    $("#loading_slick_gallery").removeClass("show");
  });
  $(".galeria_photos").slick(slickGalleryPhotos);
  $("#section_banner_carousel").slick(slickBannerOptions);
  $(".bef_aft_images_gallery").slick(slickBeforeAfer);
  $("#image_product_slick").slick(slickProductSliderGallery);
  $("#gallery_product_slick").on("init", function() {
    $("#loading_slick_product").removeClass("show");
  });
  $("#gallery_product_slick").slick(slickProductSliderThumb);

  $(".galeria_container").lightGallery({
    selector: $("a.gallery_light"),
    mode: "lg-fade",
    download: false
  });

  $("#quienes_somos_lg").lightGallery({
    selector: $("a.quienes_somos_link"),
    mode: "lg-fade",
    download: false
  });

  $("#con_quien_trabajamos").lightGallery({
    selector: $("a.trabajamos_con"),
    mode: "lg-fade",
    download: false
  });

  $("#image_product_slick").lightGallery({
    selector: $(".item_image_product"),
    mode: "lg-fade",
    download: false
  });
  new WOW({
    mobile: false
  }).init();
}

window.onload = function() {
  plugnsInit();

  toggleClassToMenuInResponse();
  changeTheHeaderWhenScrolling();
  toggleDynamicDataFromNav();
  toggleTheModalToSearchInWebsite();
  sendContactMail();
  sendCotizarMail();
  ScrolMapFromNavbar();
  makeHoverMoveInBanner();
  changeTheSubmenuInHeader();
  changeCurrentImageInBeforeAfter();
  activeTheLineInTheHeaderMenuInScrolling();
  makeScrollIfExistsTheQueryParam();
  showWhatsappInSpecificHours();
  addToFavorite();
  sendSubscribeForm();
  // initTabs();
  connectToFb();
  redirectWhatsappIfMobile();
  alertOnRightSearching();
  actionsInFavoritesPanel();
};

window.onresize = function() {
  //   makeHoverMoveInBanner();
  toggleClassToMenuInResponse();
  changeTheHeaderWhenScrolling();
};
