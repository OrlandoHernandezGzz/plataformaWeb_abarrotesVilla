<?php
    // Conexión de la base de datos.
    require_once "config/database.php";

    // Consulta para establecer las categorias en la vista index
    $queryCat = "SELECT * FROM cat_producto";

    // Consulta las categorias
    $cateogorias = $conexion->query($queryCat);

    // Para saber el numero de filas
    $cantCategorias = $cateogorias->num_rows;

    // Si la cantidad es mayor que cero ejecuta el codigo
    if($cantCategorias > 0){
      // generamos el array asociativo de categorias
      $rowCat = $cateogorias->fetch_assoc();

      // Tomamos los valores del array asociativo
      $nombreCategoria = $rowCat['nombre'];
      $descripCategoria = $rowCat['descripcion'];
      $imgCategoria = $rowCat['img'];
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abarrotes Villa - Bienvenida</title>
    <link rel="stylesheet" href="./assets/css/index.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <!-- Cabecera -->
  <?php require_once "templates/header.php" ?>

  <!-- Cuerpo de nuestra landing page -->
  <br><br>
  <!-- Curusel de nuestra página principal -->
  <div class="container">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="assets/img/img_carusel.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="assets/img/img_carusel.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="assets/img/img_carusel.png" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <!-- Seccion de categorias -->
  <section class="categorias">
    <div class="container">
      <h2>Categorias</h2>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach($cateogorias as $categoria){?>
          
          <div class="col">
              <div class="card h-100">
              <img src="public/imgs/<?php echo $categoria['img']; ?>" width="355" height="200" alt="...">
              <div class="card-body">
                  <h5 class="card-title"><?php echo $categoria['nombre'] ?></h5>
                  <p class="card-text"><?php echo $categoria['descripcion'] ?></p>
              </div>
              </div>
          </div>
        <?php }?>
      </div>    
    </div>
  </section>
  
  <!-- Footer de la página -->
  <?php require_once "templates/footer.php" ?>

</body>
</html>