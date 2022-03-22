<?php
    // Conexion de la base de datos.
    require "config/database.php";

    // Mantiene la sesión del usuario.
    session_start();
    
    // Validación para agregar seguridad a la vista de admin.
    if(!isset($_SESSION['id_empleado'])){
        header("Location: index.php");
    }
    $nombreUser = $_SESSION['nombre'];

    // Consulta para establecer las categorias en la vista categoriasProductos
    $queryCat = "SELECT * FROM cat_producto";

    $categorias = $conexion->query($queryCat);
    $cantCategorias = $categorias->num_rows;

    if($cantCategorias > 0){
      $rowCat = $categorias->fetch_assoc();

      $idCategoria = $rowCat['id_cat_prod'];
      $nombreCategoria = $rowCat['nombre'];
      $descripCategoria = $rowCat['descripcion'];
      $imgCategoria = $rowCat['img'];
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

        header("location:categoriasProductos.php");
    }
?>

<!-- Inicio de dashboard -->
<?php require_once "templates/inicio-dashboard.php" ?>

<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Categorías de Productos</h1>
                <ol class="breadcrumb mb-4">
                    <a href="agregarCategorias.php" class="btn btn-success" role="button">Nuevo</a>
                </ol>
                <!-- Tabla para visualizar los datos -->
                <table class="table">
                    <thead class="container-fluid px-4">
                        <tr class="d-flex">
                            <th class="col-1">ID</th>
                            <th class="col-2">Nombre</th>
                            <th class="col-4">Descripción</th>
                            <th class="col-2">Imagen</th>
                            <th class="col-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($categorias as $categoria){ ?>
                        <tr class="d-flex">
                            <td scope="row" class="col-1"><?php echo $categoria['id_cat_prod'] ?></td>
                            <td class="col-2"><?php echo $categoria['nombre'];  ?></td>
                            <td class="col-4"><?php echo $categoria['descripcion'] ?></td>
                            <td class="col-2">
                                <img src="public/imgs/<?php echo $categoria['img']; ?>" width="100" alt="img categorias">
                            </td>
                            <td class="col-2">
                                <a href="?borrar=<?php echo $categoria['id_cat_prod']; ?>" class="btn btn-danger" role="button">Eliminar</a> |
                                <a href="editarCategorias.php?id=<?php echo $categoria['id_cat_prod']; ?>" class="btn btn-warning" role="button">Editar</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </main>
        
<!-- Cierre de dashboard -->
<?php require_once "templates/cierre-dashboard.php"; ?>