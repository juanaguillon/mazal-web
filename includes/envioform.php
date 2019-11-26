<?php
// $nombre = "Juan Aguillon";
// $email = "juanaguilloncar@gmail.com";
// $phone = "311502879766";
// $msj = "Hola, esta me gusta.";


// Test
// mail('juanaguilloncar@hotmail.com', 'Mi título', $mensaje);
// $cabeceras = 'From: juanaguilloncar@gmail.com' . "\r\n" .
//   'Reply-To: juanaguilloncar@gmail.com' . "\r\n" .
//   'X-Mailer: PHP/' . phpversion();

// return false;
// Final Test


$nombre = $_POST['nombre'];
$email = $_POST['email'];
$phone = $_POST['cell'];
$ciudad = $_POST['ciudad'];
$msj = $_POST['mensaje'];
$isReq = isset($_POST['isRequest']) ? $_POST['isRequest'] : false;

$imagen_respuesta = "http://mazal.co/wp-content/themes/mazal/images/icons/logo-mazal-respuesta.png";
$imgWidth = 280;
$imgHeigt = 79;

$url_enviado = "http://mazal.co/";
$nombre_sitio = "Mazal";

if ($isReq) {
  $linkURL = $_POST["urlCotiza"];
  $productoName = $_POST["nameCotiza"];
  $imgCotiza = $_POST["imgCotiza"];
}

try {
  if ($nombre != "" && $email != "" && $phone != "" && $msj != "") {
    require "./includes/class.phpmailer.php";
    $mail = new phpmailer();
    $visitante =  new phpmailer();
    $mail->PluginDir = "includes/";
    $visitante->PluginDir = "includes/";
    $mail->IsSMTP();
    $visitante->IsSMTP();
    $mail->SMTPAuth = true;
    $visitante->SMTPAuth = true;

    $mail->Host = "mail.mazal.co";
    $visitante->Host = "mail.mazal.co";
    $mail->Username = "info@mazal.co";
    $visitante->Username = "info@mazal.co";
    $mail->Password = "Intuition1234%";
    $visitante->Password = "Intuition1234%";
    $mail->Port = 587;
    $visitante->Port = 587;



    $mail->From = "info@mazal.co";
    $mail->FromName = $nombre_sitio;
    $visitante->From = "info@mazal.co";
    $visitante->FromName = $nombre_sitio;

    $mail->Timeout = 30;
    $visitante->Timeout = 30;

    // $mail->AddCC("sebastian.camacho@mazal.co");
    // $mail->AddCC("silvana.camacho@mazal.co");
    $mail->AddCC("juanaguilloncar@gmail.com");
    $visitante->AddAddress($email);

    $mail->IsHTML(true);
    $visitante->IsHTML(true);

    if ($isReq) {
      $mail->Subject = "Nueva cotizacion Mazal";
      $visitante->Subject = "Nueva cotizacion Mazal";
    } else {
      $mail->Subject = "Formulario enviado desde el website " . $nombre_sitio;
      $visitante->Subject =  "Gracias por escribirnos";
    }


    $mail->CharSet = 'UTF-8';
    $visitante->CharSet = 'UTF-8';

    ob_start();
    ?>
    <html>

    <head>
      <title><?php echo $nombre_sitio; ?></title>
    </head>

    <body>
      <table width="500" align="center" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="500" height="56" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td height="134" valign="top">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="<?php echo $imgWidth ?>" height="<?php echo $imgHeigt ?>" align="center" valign="top"><img src="<?php echo $imagen_respuesta; ?>" width="<?php echo $imgWidth ?>" height="<?php echo $imgHeigt ?>" /></td>
              </tr>
            </table>
          </td>
        </tr>

        <tr>

          <td height="134" valign="top">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="500" height="134" valign="top" style="font-Tamaño: 12px; font-family: Arial, Helvetica, sans-serif; ">
                  <p align="center">
                    <?php if ($isReq) : ?>
                      <img src="<?php echo $imgCotiza ?>" width="230"> <br>
                      Se ha generado una nueva cotización del producto <a href="<?php echo $linkURL ?>"><?php echo $productoName ?></a>, estos son los datos del cotizante:
                    <?php else : ?>
                      Formulario enviado desde el website <a href="<?php echo $url_enviado; ?>"><?php echo $nombre_sitio; ?></a>
                    <?php endif; ?>
                  </p>
                  <table width="384" border="1" align="center" cellpadding="3" cellspacing="0" bordercolor="#000" style="font-Tamaño: 12px; font-family: Arial, Helvetica, sans-serif;">

                    <tr>
                      <td width="84"><span><strong>Nombre</strong></span></td>
                      <td width="251">
                        <span>
                          <?php echo $nombre; ?>
                        </span>
                      </td>
                    </tr>

                    <tr>
                      <td><span><strong>Email</strong></span></td>
                      <td>
                        <span>
                          <?php echo $email; ?>
                        </span>
                      </td>
                    </tr>

                    <tr>
                      <td><span><strong>Teléfono</strong></span></td>
                      <td>
                        <span>
                          <?php echo $phone; ?>
                        </span>
                      </td>
                    </tr>
                    <tr>
                      <td><span><strong>Ciudad</strong></span></td>
                      <td>
                        <span>
                          <?php echo $ciudad; ?>
                        </span>
                      </td>
                    </tr>

                    <tr>
                      <td><span><strong>Mensaje</strong></span></td>
                      <td>
                        <span>
                          <?php echo $msj; ?>
                        </span>
                      </td>
                    </tr>
                  </table>

                  <p>&nbsp;</p>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </body>

    </html>
    <?php
        $mensaje = ob_get_contents();
        ob_end_clean();
        ob_start();
        ?>

    <html>

    <head>
      <title><?php echo $nombre_sitio; ?></title>
    </head>


    <body>
      <table width="500" align="center" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="500" height="56" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td height="268" valign="top">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="<?php echo $imgWidth ?>" height="<?php echo $imgHeigt ?>" valign="top" align="center"><img src="<?php echo $imagen_respuesta;  ?>" width="<?php echo $imgWidth ?>" height="<?php echo $imgHeigt ?>" />
                  <img src="<?php echo $imgCotiza ?>" width="230"> <br>
                  Se ha generado una nueva cotización del producto <a href="<?php echo $linkURL ?>"><?php echo $productoName ?></a>, y nos pondremos en contacto con usted lo más pronto posible.
                </td>

              </tr>
            </table>
          </td>
        </tr>

      </table>
    </body>

    </html>

<?php
    $mensajes = ob_get_contents();
    ob_clean();


    $mail->Body = $mensaje;
    $visitante->Body = $mensajes;
    $exito = $mail->Send();
    $exito = $visitante->Send();
    $intentos = 1;
    while ((!$exito) && ($intentos < 5)) {
      $exito = $mail->Send();
      $exito = $visitante->Send();
      $intentos = $intentos + 1;
    }
    if (!$exito) {
      echo "0";
    } else {
      echo "1";
    }
  } else {
    echo "Data no pass";
  }
} catch (\Throwable $th) {
  echo "ERROR: " .  $th->getMessage() . " in file " . $th->getFile() . " in line " . $th->getLine();
}
