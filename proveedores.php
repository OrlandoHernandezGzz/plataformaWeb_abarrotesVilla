<?php
    // Conexion de la base de datos.
    require "config/database.php";

    // Mantiene la sesión del usuario.
    session_start();
    
    if(!isset($_SESSION['id_empleado'])){
        header("Location: index.php");
    }
    $nombreUser = $_SESSION['nombre'];

    // Consulta para establecer las categorias en la vista categoriasProductos
    $queryProv = "SELECT * FROM proveedor";

    $proveedores = $conexion->query($queryProv);
    $cantProveedores = $proveedores->num_rows;

    if($cantProveedores > 0){
      $rowProve = $proveedores->fetch_assoc();

      $idProveedor = $rowProve['id_proveedor'];
      $nombreProveedor = $rowProve['nombre'];
      $descripProveedor = $rowProve['descripcion'];
      $celProveedor = $rowProve['numero_cel'];
      $emailProveedor = $rowProve['email'];
    }

    // Logica para eliminar una categoria de producto.
    if($_GET){
        $id = $_GET['borrar'];
        
        $queryEliminar = "DELETE FROM `proveedor` WHERE `proveedor`.`id_proveedor` = $id";
        
        $sql = $conexion->prepare($queryEliminar);

        if($sql->execute()){
            echo "<script>alert('Registro Eliminado.')</script>";
        }else{
            echo "<script>alert('Error al Eliminar Registro.')</script>";
        }

        header("location:proveedores.php");
    }
?>

<!-- Inicio de dashboard -->
<?php require_once "templates/inicio-dashboard.php" ?>

<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Proveedores</h1>
                <ol class="breadcrumb mb-4">
                    <a href="agregarProveedores.php" class="btn btn-success" role="button">Nuevo</a>
                    <a href="reporteProveedores.php" class="btn btn-primary ms-2" role="button">Generar Reporte</a>
                </ol>
                <!-- Tabla para visualizar los datos -->
                <table class="table">
                    <thead class="container-fluid px-4">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($proveedores as $proveedor){ ?>
                        <tr>
                            <td scope="row"><?php echo $proveedor['id_proveedor'] ?></td>
                            <td><?php echo $proveedor['nombre'];  ?></td>
                            <td><?php echo $proveedor['descripcion'] ?></td>
                            <td><?php echo $proveedor['numero_cel'];  ?></td>
                            <td><?php echo $proveedor['email'] ?></td>
                            <td>
                                <a href="?borrar=<?php echo $proveedor['id_proveedor']; ?>" class="btn btn-danger" role="button">Eliminar</a> |
                                <a href="editarProveedores.php?id=<?php echo $proveedor['id_proveedor']; ?>" class="btn btn-warning" role="button">Editar</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </main>
        
<!-- Cierre de dashboard -->
<?php require_once "templates/cierre-dashboard.php"; ?>