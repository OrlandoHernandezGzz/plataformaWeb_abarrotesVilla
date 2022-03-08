<?php
    // Conexion de la base de datos.
    require "config/database.php";

    // Mantiene la sesión del usuario.
    session_start();
    
    if(!isset($_SESSION['id_empleado'])){
        header("Location: index.php");
    }
    $nombreUser = $_SESSION['nombre'];

    // Logica para editar proveedor.
    if($_GET){
        // Trae los datos a los inputs
        $id = $_GET['id'];

        $query = "SELECT * FROM proveedor WHERE id_proveedor=$id";
        $resultado = $conexion->query($query);
        $row = $resultado->fetch_assoc();
    }
?>

<!-- Inicio de dashboard -->
<?php require_once "templates/inicio-dashboard.php" ?>

<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Proveedores</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Editar Proveedor</li>
                </ol>
            </div>
            
            <!-- Formulario de los datos del proveedor -->
            <div class="card">
                <div class="card-body">
                    <form action="updateProveedores.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="txtIdProve" value="<?php echo $row['id_proveedor']; ?>">
                        <label for="nombreProveedor">Nombre Proveedor: </label>
                        <input type="text" class="form-control mb-4" name="txtNombreProve" value="<?php echo $row['nombre']; ?>">
                        <label for="descripcionProveedor">Descripción: </label>
                        <textarea name="txtDescripcionProve" class="form-control mb-4" cols="30" rows="10"><?php echo $row['descripcion']; ?></textarea>
                        <label for="celProveedor">Telefono: </label>
                        <input type="number" class="form-control mb-4" name="txtCelProve" value="<?php echo $row['numero_cel']; ?>">
                        <label for="emailProveedor">Email: </label>
                        <input type="email" class="form-control mb-4" name="txtEmaillProve" value="<?php echo $row['email']; ?>">
                    
                        <input type="submit" class="btn btn-warning" value="Editar">
                    </form>
                </div>
            </div>
        </main>

<!-- Cierre de dashboard -->
<?php require_once "templates/cierre-dashboard.php"; ?>