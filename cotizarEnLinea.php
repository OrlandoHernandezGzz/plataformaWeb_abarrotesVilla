<?php
    // Importamos la conexion a la DB.
    require "config/database.php";

    // Consulta a los productos para armar catalogo.
    $queryCatalogosProd = "SELECT * FROM producto";

    $catalogos = $conexion->query($queryCatalogosProd);


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abarrotes Villa - Cotiza en Línea</title>
    <link rel="stylesheet" href="./assets/css/cotizar.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <!-- Cabecera Principal -->
  <?php require_once "templates/header.php" ?>

   <!-- Cuerpo Cotizar en Línea -->
   <section class="catalogo mt-4"> 
    <div class="container">
      <h1 class="catalogo-titulo mb-4">Catálogo de Productos</h1>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach($catalogos as $catalogo){?>
          <div class="col">
              <div class="card h-100">
                <img src="public/imgs/<?php echo $catalogo['img']; ?>" width="250" height="250" alt="producto">
                <div class="card-body">
                    <h5 class="card-title text-center"><?php echo $catalogo['nombre'] ?></h5>
                    <a href="#" class="btn btn-dark btnComprar">Comprar</a>
                </div>
              </div>
          </div>
        <?php }?>
      </div>
    </div>
  </section>
  
  <!-- Pie de la página -->
  <?php require_once "templates/footer.php" ?>

</body>
</html>