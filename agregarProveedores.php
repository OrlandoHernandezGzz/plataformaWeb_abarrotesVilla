<?php
    // Conexion de la base de datos.
    require "config/database.php";

    // Mantiene la sesión del usuario.
    session_start();
    
    if(!isset($_SESSION['id_empleado'])){
        header("Location: index.php");
    }
    $nombreUser = $_SESSION['nombre'];

    // Logica para agregar una categoria de producto.
    if($_POST){
        // print_r($_POST);
        $idProveedor = $_POST['id_proveedor'];
        $nombreProveedor = $_POST['txtNombreProve'];
        $descripProveedor = $_POST['txtDescripcionProve'];
        $celProveedor = $_POST['txtCelProve'];
        $emailProveedor = $_POST['txtEmaillProve'];
        
        $query = "INSERT INTO `proveedor` (`nombre`, `descripcion`, `numero_cel`, `email`) VALUES ('$nombreProveedor', '$descripProveedor', '$celProveedor', '$emailProveedor');";

        if(mysqli_query($conexion, $query)){
            echo "<script>alert('Registro Exitoso.')</script>";
        } else{
            echo "<script>alert('Error al registrar.')</script>";
        }

        header("Location: proveedores.php");
    }
?>

<!-- Inicio de dashboard -->
<?php require_once "templates/inicio-dashboard.php" ?>

<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Proveedores</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Registrar Proveedores</li>
                </ol>
            </div>
            <!-- Formulario de los datos del proveedor -->
            <div class="card">
                <div class="card-body">
                    <form action="agregarProveedores.php" method="post" enctype="multipart/form-data">
                        <label for="nombreProveedor">Nombre Proveedor: </label>
                        <input type="text" class="form-control mb-4" name="txtNombreProve">
                        <label for="descripcionProveedor">Descripción: </label>
                        <textarea name="txtDescripcionProve" class="form-control mb-4" cols="30" rows="10"></textarea>
                        <label for="celProveedor">Telefono: </label>
                        <input type="number" class="form-control mb-4" name="txtCelProve">
                        <label for="emailProveedor">Email: </label>
                        <input type="email" class="form-control mb-4" name="txtEmaillProve">
                    
                        <input type="submit" class="btn btn-success" value="Guardar">
                    </form>
                </div>
            </div>
        </main>
        
<!-- Cierre de dashboard -->
<?php require_once "templates/cierre-dashboard.php"; ?>