<?php
    // Conexion de la base de datos.
    require "config/database.php";

    // Mantiene la sesión del usuario.
    session_start();
    
    if(!isset($_SESSION['id_empleado'])){
        header("Location: index.php");
    }
    $nombreUser = $_SESSION['nombre'];

    // Consulta para establecer los productos en la vista productos
    $queryProductos = "SELECT * FROM producto";

    $productos = $conexion->query($queryProductos);
    $cantProductos = $productos->num_rows;

    if($cantProductos > 0){
      $rowProd = $productos->fetch_assoc();
    }

    // Logica para eliminar una categoria de producto.
    if($_GET){
        $id = $_GET['borrar'];
        
        $urlImgEliminada = "SELECT img FROM cat_producto WHERE id_cat_prod=$id";
        $resultado = $conexion->query($urlImgEliminada);
        $cantEmpleados = $resultado->num_rows;
        // Matriz asociativa de los registros.
        $row = $resultado->fetch_assoc();

        // Entra a la clave del arreglo y toma el valor de pass del registro.
        $img_db = $row['img'];

        // Nos va permitir hacer un borrado.
        unlink("public/imgs/".$img_db);
        $queryEliminar = "DELETE FROM `cat_producto` WHERE `cat_producto`.`id_cat_prod` = $id";
        
        $sql = $conexion->prepare($queryEliminar);

        if($sql->execute()){
            echo "<script>alert('Registro Eliminado.')</script>";
        }else{
            echo "<script>alert('Error al Eliminar Registro.')</script>";
        }

        header("location:productos.php");
    }
?>

<!-- Inicio de dashboard -->
<?php require_once "templates/inicio-dashboard.php" ?>

<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Productos</h1>
                <ol class="breadcrumb mb-4">
                    <a href="agregarProductos.php" class="btn btn-success" role="button">Nuevo</a>
                </ol>
                <!-- Tabla para visualizar los datos -->
                <table class="table">
                    <thead class="container-fluid px-4">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Disponibles</th>
                            <th>Imagen</th>
                            <th>Categoria</th>
                            <th>Proveedor</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($productos as $producto){ ?>
                        <tr>
                            <td scope="row"><?php echo $producto['id_producto']; ?></td>
                            <td><?php echo $producto['nombre'];  ?></td>
                            <td><?php echo $producto['descripcion']; ?></td>
                            <td><?php echo $producto['precio']; ?></td>
                            <td><?php echo $producto['in_stoke']; ?></td>
                            <td>
                                <img src="public/imgs/<?php echo $producto['img']; ?>" width="100" alt="img categorias">
                            </td>
                            <td><?php echo $producto['id_cat_prod']; ?></td>
                            <td><?php echo $producto['id_proveedor']; ?></td>
                            <td>
                                <a href="?borrar=<?php echo $producto['id_producto']; ?>" class="btn btn-danger" role="button">Eliminar</a> |
                                <a href=".php?id=<?php echo $producto['id_producto']; ?>" class="btn btn-warning" role="button">Editar</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </main>
        
<!-- Cierre de dashboard -->
<?php require_once "templates/cierre-dashboard.php"; ?>