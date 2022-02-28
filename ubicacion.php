<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abarrotes Villa - Bienvenida</title>
    <link rel="stylesheet" href="./assets/css/ubicacion.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <!-- Cabecera Principal -->
  <?php require_once "templates/header.php" ?>  

   <!-- Cuerpo de ubicación -->
   <section class="ubicacion"> 
    <div class="container">
        <h1 class="ubicacion-titulo">Ubicación</h1>
        <div class="row">
            <div class="col">
                <div class="ubicacion-mapa">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3593.573569979754!2d-100.35929188570238!3d25.751611915304515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x866296a5b9fa6c49%3A0xda50caf90442e928!2sManuel%20Chao%20511%2C%20Francisco%20Villa%2C%2064228%20Monterrey%2C%20N.L.!5e0!3m2!1ses-419!2smx!4v1645508455217!5m2!1ses-419!2smx" style="border: 1px;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>

        <div class="row row-cols-auto mt-4">
            <div class="col">
                <img src="assets/img/tel.png" alt="teléfono" class="ubicacion-img">
            </div>
            <div class="col">
                <p class="ubicacion-info">8121097070</p>
            </div>
        </div>

        <div class="row row-cols-auto mt-4">
            <div class="col">
                <img src="assets/img/correo.png" alt="correo" class="ubicacion-img">
            </div>
            <div class="col">
                <p class="ubicacion-info">abvilla@gmail.com</p>
            </div>
        </div>

        <div class="row row-cols-auto mt-4">
            <div class="col">
                <img src="assets/img/ubicacion.png" alt="ubicación" class="ubicacion-img">
            </div>
            <div class="col">
                <p class="ubicacion-info">Col. Francisco Villa, Monterrey, Nuevo León, México.</p> 
            </div>
        </div>
    </div>
  </section>

  <!-- Pie de la página -->
  <?php require_once "templates/footer.php" ?>

</body>
</html>