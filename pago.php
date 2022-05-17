<?php
    // Importamos la conexion a la DB.
    require "config/database.php";
    require "config/config.php";

    $productosCarrito = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;
    $listaCarrito = array();

    if($productosCarrito != null){
        foreach($productosCarrito as $clave => $cantidad){
            // Consulta a los productos para armar catalogo.
            $queryProductos = "SELECT id_producto, nombre, precio, descuento, $cantidad as cantidad FROM producto WHERE id_producto=$clave";
            // Ejecutamos el query y se guarda en catalogos
            $productos = $conexion->query($queryProductos);
            $listaCarrito[] = $productos->fetch_assoc();
        }
    } else {
        header("Location: index.php");
    }

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
        <h1 class="mb-4">Detalles del Pago</h1>
        <div class="row">
            <div class="col-6">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if($listaCarrito == null) {
                                echo '<tr><td colspan="5" class="text-center"><b>No has agregado nada al carrito</b></td></tr>';
                            } else {
                                $total = 0;
                                foreach($listaCarrito as $registro){
                                    $id = $registro['id_producto'];
                                    $nombre = $registro['nombre'];
                                    $precio = $registro['precio'];
                                    $descuento = $registro['descuento'];
                                    $cantidad = $registro['cantidad'];
                                    $precio_desc = $precio - (($precio * $descuento) / 100);
                                    $subtotal = $cantidad * $precio_desc;
                                    $total += $subtotal;
                            ?>

                            <tr>
                                <td><?php echo $nombre; ?></td>
                                <td>
                                    <div id="subtotal_<?php echo $id; ?>" name="subtotal[]">
                                        <?php echo MONEDA . number_format($subtotal, 2, '.', ','); ?>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <?php } ?>

                        <tr>
                            <td colspan="2">
                                <?php if(isset($total)){  ?>
                                <p class="h3 text-end" id="total">Total: <?php echo MONEDA . number_format($total, 2, '.', ',') ?></p>
                                <?php } ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-6">
                <h5>Pagar con Paypal</h5>
                <div id="paypal-button-container"></div>
            </div>
        </div>
    </div>
  </section>
  
  <!-- Pie de la página -->
  <?php require_once "templates/footer.php" ?>

  <!-- Replace "test" with your own sandbox Business account app client ID -->
  <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&currency=<?php echo CURRENCY; ?>"></script>
  <script>
        paypal.Buttons({
            style: {
                // color: 'blue',
                shape: 'pill'
                // label: 'pay'
            },
            createOrder: function(data, actions){
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: <?php echo $total; ?>
                        }
                    }]
                });
            },
            onApprove: (data, actions) => {
                let URL = 'capturaPago.php';
                actions.order.capture().then(function(detalles) {
                    // Successful capture! For dev/demo purposes:
                    console.log('Capture result', detalles);
                    let url = 'capturaPago.php';
                    return fetch(url, {
                        method: 'post',
                        headers: {
                            'content-type': 'application/json'
                        },
                        body: JSON.stringify({
                            detalles
                        })
                    })
                });
            },
            onCancel: function(data){
                alert('Pago Cancelado')
                console.log(data)
            }
        }).render('#paypal-button-container')
    </script>
  
</body>
</html>