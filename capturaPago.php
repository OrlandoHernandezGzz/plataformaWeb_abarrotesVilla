<?php 
    // Importamos la conexion a la DB.
    require "config/database.php";
    require "config/config.php";

    $json = file_get_contents('php://input');
    $datos = json_decode($json, true);

    // echo '<pre>';
    // print_r($datos);
    // echo '</pre>';


    if(is_array($datos)){
        $id_transaccion = $datos['detalles']['id'];
        $total = $datos['detalles']['purchase_units'][0]['amount']['value'];
        $status = $datos['detalles']['status'];
        $fecha = $datos['detalles']['update_time'];
        $fechaNueva = date('Y-m-d H:i:s', strtotime($fecha));
        $email = $datos['detalles']['payer']['email_address'];
        $id_cliente = $datos['detalles']['payer']['payer_id'];

    //     // Credenciales de la base de datos
    // $hostname = "localhost";
    // $database = "abarrotes_villa";
    // $user = "root";
    // $password = "";

    // // Objeto que nos establecera la conexión.
    // $conexion = new mysqli($hostname, $user, $password, $database);

        $sql = "INSERT INTO compra (id_transaccion, fecha, status, email, id_cliente, total) VALUES ('$id_transaccion','$fecha','$status','$email','$id_cliente','$total')";
        // $sql = $conexion->prepare("INSERT INTO compra (id_transaccion, fecha, status, email, id_cliente, total) VALUES (?,?,?,?,?,?) ");
        // $sql->bind_param('sdsssss', $id_transaccion, $monto, $status, $fechaNueva, $email, $id_cliente);
        // $sql->execute();
       if(mysqli_query($conexion, $sql)){
           $id = $conexion->insert_id;
       } else{
            echo "No se inserto el registro correctamente.";
        }

        if($id > 0){
            $productosCarrito = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

            if($productosCarrito != null){
                foreach($productosCarrito as $clave => $cantidad){
                    // Consulta a los productos para armar catalogo.
                    $queryProductos = "SELECT id_producto, nombre, precio, descuento FROM producto WHERE id_producto=$clave";
                    // Ejecutamos el query y se guarda en catalogos
                    $productos = $conexion->query($queryProductos);
                    $row_prod = $productos->fetch_assoc();

                    $precio = $row_prod['precio'];
                    $nombreProd = $row_prod['nombre'];
                    $descuento = $row_prod['descuento'];
                    $cantidad = $cantidad;
                    $precio_desc = $precio - (($precio * $descuento) / 100);

                    $sql_detalleCompra = "INSERT INTO det_compra (id_compra, id_producto, nombre, precio, cantidad) VALUES ('$id','$clave','$nombreProd','$precio_desc','$cantidad');";
                    // $conexion->query($sql_detalleCompra);
                    mysqli_query($conexion, $sql_detalleCompra);
                }
            }
        }

        unset($_SESSION['carrito']);
    }
?>