<?php
    require './config/config.php';
    // require './config/database.php';

    if(isset($_POST['action'])){
        $action = $_POST['action'];
        $id = isset($_POST['id']) ? $_POST['id'] : 0;

        if($action == 'agregar'){
            $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;
            $respuesta = agregar($id, $cantidad);
            if($respuesta > 0){
                $datos['ok'] = true;
            } else {
                $datos['ok'] = false;
            }

            $datos['sub'] = MONEDA . number_format($respuesta, 2, '.', ',');
        } else {
            $datos['ok'] = false;
        }
    } else {
        $datos['ok'] = false;
    }

    // Lo que va regresar la petición.
    echo json_encode($datos);

    function agregar($id, $cantidad){
        $respuesta = 0;
        if($id > 0 && $cantidad > 0 && is_numeric(($cantidad))){
            // Validación para saber si existe el id del producto en la variable de sesión.
            if(isset($_SESSION['carrito']['productos'][$id])){
                $_SESSION['carrito']['productos'][$id] = $cantidad;

                // Credenciales de la base de datos
                $hostname = "localhost";
                $database = "abarrotes_villa";
                $user = "root";
                $password = "";

                // Objeto que nos establecera la conexión.
                $conexion = new mysqli($hostname, $user, $password, $database);
                
                $query = "SELECT precio, descuento FROM producto WHERE id_producto=$id";
                // 
                $sql = $conexion->query($query);
                $row = $sql->fetch_assoc();

                $precio = $row['precio'];
                $descuento = $row['descuento'];
                $precio_desc = $precio - (($precio * $descuento) / 100);
                $respuesta = $cantidad * $precio_desc;

                return $respuesta;
            }
        } else {
            return $respuesta;
        }
    }
?>