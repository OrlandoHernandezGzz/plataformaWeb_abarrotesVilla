<?php
  // Librerias que necesitamos para configurar el correo.
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  //Load Composer's autoloader
  require 'vendor/autoload.php';

  if($_POST){

    $destinatario = 'orlahdz50@gmail.com';

    $nombre = $_POST['txtNombreCliente'];
    $apellido = $_POST['txtApellidoCliente'];
    $nombreCompleto = $nombre . " " . $apellido;

    $emailCliente = $_POST['txtEmailCliente'];
    $telCliente = $_POST['txtTelefonoCliente'];

    $asunto = $_POST['txtAsunto'];
    $mensaje = $_POST['txtMensaje'];

    // Validación para que no se envíe si vienen vacías.
    if(!empty($nombreCompleto) && !empty($emailCliente) && !empty($telCliente) && !empty($asunto) && !empty($mensaje)){
      $header = "Enviado desde La Plataforma Abarrotes Villa";
      $MensajeCompleto = 'Correo Cliente: '.  $emailCliente . '<br>' . 'Teléfono Cliente: ' . $telCliente . '<br>' . $mensaje . '<br>Atentamente: ' . $nombreCompleto; 
      
      // Descomentar estas lineas de codigo cuando este en producción.

      // mail($destinatario, $asunto, $MensajeCompleto, $header);
      // echo "<script>alert('Correo enviado exitosamente!')</script>";
      // echo "<script>setTimeOut(\"location.href='index.php'\", 1000)</script>";
    }

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'aportandoc@gmail.com';                     //SMTP username
        $mail->Password   = '';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($emailCliente, $nombreCompleto);
        $mail->addAddress('aportandoc@gmail.com');     //Add a recipient
 
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $asunto;
        $mail->Body = $MensajeCompleto;

        $mail->send();
        echo "<script>alert('Correo enviado exitosamente!')</script>";
        echo "<script>setTimeout(\"location.href='index.php'\", 1000)</script>";
    } catch (Exception $e) {
        echo "<script>alert('No se ha podido enviar el mensaje.')</script>";
    }
  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abarrotes Villa - Contacto</title>
    <link rel="stylesheet" href="./assets/css/contacto.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <!-- Cabecera Principal -->
  <?php require_once "templates/header.php" ?>

   <!-- Cuerpo del formulario de contacto -->
   <section class="contacto"> 
    <div class="container">
      <h1 class="contacto-titulo mb-4">Contacto</h1>
      <form method="POST" action="contacto.php">
          <div class="row row-cols-2">
            <div class="col mb-4">
              <label for="nombreCliente" class="form-label">Nombre *</label>
              <input type="text" class="form-control" name="txtNombreCliente" placeholder="Campo Requerido" required>
            </div>
            <div class="col mb-4">
              <label for="apellidoCliente" class="form-label">Apellido *</label>
              <input type="text" class="form-control" name="txtApellidoCliente" placeholder="Campo Requerido" required>
            </div>
            <div class="col mb-4">
              <label for="emailCliente" class="form-label">E-mail *</label>
              <input type="email" class="form-control" name="txtEmailCliente" placeholder="Campo Requerido" required>
            </div>
            <div class="col">
              <label for="telefonoCliente" class="form-label">Teléfono *</label>
              <input type="number" class="form-control" name="txtTelefonoCliente" placeholder="Campo Requerido" required>
            </div>
          </div>
    
          <div class="row row-cols-1">
            <div class="col mb-4">
              <label for="asunto" class="form-label">Asunto *</label>
              <input type="text" class="form-control" name="txtAsunto" placeholder="Campo Requerido" required>
            </div>
          </div>
    
          <div class="row row-cols-1">
            <div class="col mb-4">
              <label for="mensaje" class="form-label">Mensaje *</label>
              <textarea class="form-control" name="txtMensaje" rows="3" placeholder="Escribe un mensaje..." required></textarea>
            </div>
          </div>
    
          <div class="row row-cols-2">
            <div class="col">
              <label for="camposObligatorios" class="form-label">* Campos Obligatorios</label>
            </div>
            <div class="col">
              <button type="submit" class="btn btn-warning contacto-btn_enviar_mensaje">Enviar Mensaje</button>
            </div>
          </div>
        </form>

    </div>
  </section>

  <!-- Pie de la página -->
  <?php require_once "templates/footer.php" ?>

</body>
</html>