<?php



function senMailChimpMail($emaoil)
{
  $imagen_respuesta = "http://mazal.co/wp-content/themes/mazal/images/icons/logo-mazal-respuesta.png";
  $imgWidth = 280;
  $imgHeigt = 79;
  $nombre_sitio = "Mazal";


  require "./includes/class.phpmailer.php";
  $mail = new phpmailer();
  $mail->PluginDir = "includes/";
  $mail->IsSMTP();
  $mail->SMTPAuth = true;

  $mail->Host = "mail.mazal.co";
  $mail->Username = "info@mazal.co";
  $mail->Password = "Intuition1234%";
  $mail->Port = 587;

  $mail->From = "info@mazal.co";
  $mail->FromName = $nombre_sitio;

  $mail->AddCC($emaoil);

  $mail->IsHTML(true);
  $mail->CharSet = 'UTF-8';
  $mail->Subject = "Mazal Suscrito correctamente";
  ob_start();
  ?>
  <table width="500" align="center" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="500" height="56" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td height="268" valign="top">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="<?php echo $imgWidth ?>" height=" <?php echo $imgHeigt ?>" valign="top" align="center"><img src="<?php echo $imagen_respuesta;  ?>" width=" <?php echo $imgWidth ?>" height="<?php echo $imgHeigt ?>" />
              <br><br>
              <p>Gracias por suscribirse a Mazal Diseño Interior & Arquitectura</p>

            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
<?php
  $mensajes = ob_get_contents();
  ob_clean();

  $mail->Body = $mensajes;
  $exito = $mail->Send();
  $intentos = 1;
  while ((!$exito) && ($intentos < 5)) {
    $exito = $mail->Send();
    $intentos = $intentos + 1;
  }
  if (!$exito) {
    echo "0";
  } else {
    echo "1";
  }
}


function syncMailchimp($data)
{
  include_once "./config.php";
  $apiKey = $config["mailchimpkey"];
  $listId = 'c4378c16ba';

  $memberId = md5(strtolower($data['email']));
  $dataCenter = substr($apiKey, strpos($apiKey, '-') + 1);
  $url = "https://{$dataCenter}.api.mailchimp.com/3.0/lists/{$listId}/members/{$memberId}";

  $json = json_encode([
    'email_address' => $data['email'],
    'status'        => $data['status'], // "subscribed","unsubscribed","cleaned","pending"
  ]);

  $ch = curl_init($url);

  curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
  curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

  $result = curl_exec($ch);
  $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);

  return $httpCode;
}


if (isset($_POST["mail_subscribed"])) {
  $data = [
    'email'     => $_POST["mailchimp_text"],
    'status'    => 'subscribed',
  ];

  $returned = syncMailchimp($data);

  if ($returned == "200") {
    senMailChimpMail($data["email"]);
  } else {
    echo $returned;
  }
}
