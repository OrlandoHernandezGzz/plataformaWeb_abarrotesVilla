<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abarrotes Villa - Bienvenida</title>
    <link rel="stylesheet" href="./assets/css/horario.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <!-- Cabecera Principal -->
  <?php require_once "templates/header.php" ?>

   <!-- Cuerpo horario -->
   <section class="horario"> 
    <div class="container">
      <h1 class="horario-titulo mb-4">Horario</h1>

      <div class="text-center pb-3">
        <img  src="assets/img/horario.png" width="412px" alt="Disponible los 365 días del año">
      </div>

      <div class="bg-gris text-center">
        <h2 class="horario-titulo ">LUNES A VIERNES</h2>
      </div>
      <div class="text-center">
        <p class="horario-info py-3">Abierto a partir de las 7:00 am hasta las 11:00 pm.</p>
      </div>
    
      <div class="bg-gris text-center ">
        <h2 class="horario-titulo ">SÁBADO Y DOMINGO</h2>
      </div>
      <div class="text-center">
        <p class="horario-info py-3">Abierto a partir de las 7:30 am hasta las 11:30 pm.</p>
      </div>
    </div>
  </section>
  
  <!-- Pie de la página -->
  <?php require_once "templates/footer.php" ?>

</body>
</html>