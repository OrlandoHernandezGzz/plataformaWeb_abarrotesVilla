<?php
    // Importamos la conexion a la DB.
    require "config/database.php";
    require "config/config.php";

    // Obtenemos el id del detalle que esta en la url.
    $idDetalle = isset($_GET['id']) ? $_GET['id'] : '';
    $token = isset($_GET['token']) ? $_GET['token'] : '';

    // Validacion para que no acepte la url sin id o token.
    if($idDetalle == '' || $token == ''){
      echo 'Error al procesar la petición';
      exit;
    } else {
      // guardamos nuestro token del idDetalle
      $token_tmp = hash_hmac('sha1', $idDetalle, KEY_TOKEN);
      // Validacion por si se modifico el token desde la url.
      if($token == $token_tmp){
        // 
        $queryDetalle = "SELECT count(id_producto) FROM producto WHERE id_producto=$idDetalle";
        // 
        $detalle = $conexion->query($queryDetalle);
        // 
        if($detalle->num_rows > 0){
          // 
          $queryDetalleProd = "SELECT * FROM producto WHERE id_producto=$idDetalle";
          // 
          $detalleProd = $conexion->query($queryDetalleProd);
          $row = $detalleProd->fetch_assoc();

          $idProd = $row['id_producto'];
          $nombre = $row['nombre'];
          $descripcion = $row['descripcion'];
          $precio = $row['precio'];
          $in_stoke = $row['in_stoke'];
          $imgProd = $row['img'];
          $descuento = $row['descuento'];
          $precio_desc = $precio - (($precio * $descuento) / 100);
     
        }
      } else {
        echo 'Error al procesar la petición';
        exit;
      }
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abarrotes Villa - Cotiza en Línea</title>
    <link rel="stylesheet" href="./assets/css/detalles.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <!-- Cabecera Principal -->
  <?php require_once "templates/header.php" ?>

   <!-- Cuerpo Cotizar en Línea -->
   <section class="detatalles mt-4"> 
    <div class="container">
      <h1>Detalles del Producto</h1>
      <div class="row">
        <div class="col-md-6 order-md-1">
          <img src="public/imgs/<?php echo $row['img']; ?>" alt="imgDetalleProducto" width="80%" height="80%">
        </div>
        <div class="col-md-6 order-md-2 mt-4 card h-100">
        <div class="d-grid gap-3 col-10 mx-auto">
          <h1>ID: <?php echo $idProd; ?></h1>
          <h2><?php echo $nombre; ?></h2>
          <!-- Algoritmo para agregar los descuentos. -->
          <?php if($descuento > 0){ ?>
            <p><del><?php echo MONEDA . ' ' . number_format($precio, 2, '.', ','); ?></del></p>
            <h3>
              <?php echo MONEDA . ' ' . number_format($precio_desc, 2, '.', ','); ?>
              <small class="text-success"><?php echo $descuento ?>% Descuento</small>
            </h3>
          <?php } else {?>
            <h3><?php echo MONEDA . ' ' . number_format($precio, 2, '.', ','); ?></h3>
          <?php } ?>

          <h4>Existencia: <?php echo $in_stoke; ?></h4>
          <p class="lead">Descuento: <?php echo $descuento; ?> %</p>
          <p class="lead"><?php echo $descripcion; ?></p>
          </div>
          <div class="d-grid gap-3 col-10 mx-auto">
            <!-- <button class="btn btn-primary" type="button">Comprar Ahora</button> -->
            <button class="btn btn-dark" type="button" onclick="addProducto(<?php echo $idProd; ?>, '<?php echo $token_tmp; ?>')">Agregar al carrito</button>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Pie de la página -->
  <?php require_once "templates/footer.php" ?>

  <script>
    function addProducto(id, token){
        // Url donde mandaremos el evento.
        let url = 'carrito.php';
        // Manda los parametros por metodo post.
        let formData = new FormData();
        formData.append('id', id);
        formData.append('token', token);
        // Enviamos la url.
        fetch(url, {
          method: 'POST',
          body: formData,
          mode: 'cors'
        }).then(response => response.json())
        .then(data => {
          if(data.ok){
            let elemento = document.getElementById('num_cart');
            elemento.innerHTML = data.numero;
          }
        })

    }
  </script>