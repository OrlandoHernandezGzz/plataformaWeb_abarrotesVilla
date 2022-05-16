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
        <h1 class="mt-4">Carrito de Compras</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th></th>
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
                        <td><?php echo MONEDA . number_format($precio_desc, 2, '.', ','); ?></td>
                        <td>
                            <input type="number" min="1" step="1" value="<?php echo $cantidad; ?>" size="5" id="cantidad_<?php echo $id; ?>" onchange="actualizarCantidad(this.value, <?php echo $id ?>)">
                        </td>
                        <td>
                            <div id="subtotal_<?php echo $id; ?>" name="subtotal[]">
                                <?php echo MONEDA . number_format($subtotal, 2, '.', ','); ?>
                            </div>
                        </td>
                        <td><a href="#" id="eliminar" class="btn btn-danger btn-sm" data-bs-id="<?php echo $id; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal">Eliminar</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
                <?php } ?>

                <tr>
                    <td colspan="3"></td>
                    <td colspan="2">
                        <?php if(isset($total)){  ?>
                        <p class="h3" id="total">Total: <?php echo MONEDA . number_format($total, 2, '.', ',') ?></p>
                        <?php } ?>
                    </td>
                </tr>
            </table>
        </div>
                            
        <!-- Boton para el pago -->
        <div class="row">
            <div class="col-md-5 offset-md-7 d-grid gap-2">
                <a href="pago.php" class="btn btn-primary btn-lg">Realizar pago</a>
            </div>
        </div>
    </div>
  </section>

  <!-- Modal -->
  <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="eliminaModalLabel">Confirmar Eliminado</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            ¿Desea eliminar el producto del carrito?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-danger" id="btn-elimina" onclick="eliminar()">Eliminar</button>
        </div>
        </div>
    </div>
    </div>
  
  <!-- Pie de la página -->
  <?php require_once "templates/footer.php" ?>
  
  <script>
    let eliminaModal = document.getElementById('eliminaModal');
    eliminaModal.addEventListener('show.bs.modal', function(event){
        let button = event.relatedTarget;
        // obtiene el id que se le pasa al boton
        let id = button.getAttribute('data-bs-id');
        let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-elimina');
        buttonElimina.value = id;
    })
    
    function actualizarCantidad(cantidad, id){
        // Url donde mandaremos el evento.
        let url = 'actualizarCarrito.php';
        // Manda los parametros por metodo post.
        let formData = new FormData();
        formData.append('id', id);
        formData.append('cantidad', cantidad);
        formData.append('action', 'agregar')
        // Enviamos la url.
        fetch(url, {
          method: 'POST',
          body: formData,
          mode: 'cors'
        }).then(response => response.json())
        .then(data => {
          if(data.ok){
            let divSubtotal = document.getElementById('subtotal_' + id );
            divSubtotal.innerHTML = data.sub;

            let total = 0.0;
            let list = document.getElementsByName('subtotal[]');

            for(let i = 0; i < list.length; i++){
                total += parseFloat(list[i].innerHTML.replace(/[$,]/g, ''));
            }

            total = new Intl.NumberFormat('en-US', {
                minimiumFractionDigits: 2
            }).format(total);
            document.getElementById('total').innerHTML = 'Total: <?php echo MONEDA; ?>' + total;
          }
        })
    }

    function eliminar(){
        let btnElimina = document.getElementById('btn-elimina')
        let id = btnElimina.value;

        // Url donde mandaremos el evento.
        let url = 'actualizarCarrito.php';
        // Manda los parametros por metodo post.
        let formData = new FormData();
        formData.append('id', id);
        formData.append('action', 'eliminar')
        // Enviamos la url.
        fetch(url, {
            method: 'POST',
            body: formData,
            mode: 'cors'
        }).then(response => response.json())
        .then(data => {
            if(data.ok){
            location.reload();
            }
        })
    }


  </script>
</body>
</html>