<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abarrotes Villa - Bienvenida</title>
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
      <h1 class="contacto-titulo">Contacto</h1>
      <div class="row row-cols-2">
        <div class="col mb-4">
          <label for="exampleFormControlInput1" class="form-label">Nombre *</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Campo Requerido">
        </div>
        <div class="col mb-4">
          <label for="exampleFormControlInput1" class="form-label">Apellido *</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Campo Requerido">
        </div>
        <div class="col mb-4">
          <label for="exampleFormControlInput1" class="form-label">E-mail *</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Campo Requerido">
        </div>
        <div class="col">
          <label for="exampleFormControlInput1" class="form-label">Teléfono *</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Campo Requerido">
        </div>
      </div>

      <div class="row row-cols-1">
        <div class="col mb-4">
          <label for="exampleFormControlTextarea1" class="form-label">Mensaje *</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Escribe un mensaje..."></textarea>
        </div>
      </div>

      <div class="row row-cols-2">
        <div class="col">
          <label for="exampleFormControlTextarea1" class="form-label">* Campos Obligatorios</label>
        </div>
        <div class="col">
          <button type="button" class="btn btn-warning contacto-btn_enviar_mensaje">Enviar Mensaje</button>
        </div>
      </div>

    </div>
  </section>

  <!-- Pie de la página -->
  <?php require_once "templates/footer.php" ?>

</body>
</html>