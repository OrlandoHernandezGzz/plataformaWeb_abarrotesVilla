<?php
    // Conexion de la base de datos.
    require "config/database.php";

    // Mantiene la sesión del usuario.
    session_start();
    
    if(!isset($_SESSION['id_empleado'])){
        header("Location: index.php");
    }
    $nombreUser = $_SESSION['nombre'];

    // Logica para editar una categoria de producto.
    if($_GET){
        // Trae los datos a los inputs
        $id = $_GET['id'];

        $query = "SELECT * FROM cat_producto WHERE id_cat_prod=$id";
        $resultado = $conexion->query($query);
        $row = $resultado->fetch_assoc();
    }
    
    // logica para modificar la
    // if ($_FILES['foto']['name']=="") {
    //     mysql_query("update productos set Nombre ='".$_POST['Nombre']."', Precio='".$_POST['Precio']."' where idProducto=".$_POST['id'].";");
    // }
    // else{
    //     $ruta = "../Imagenes/";
    //     opendir($ruta);
    //     $destino = $ruta.$_FILES['foto']['name'];
    //     copy($_FILES['foto']['tmp_name'],$destino);
    //     $nombre=$_FILES['foto']['name'];
    //     mysql_query("update productos set Nombre ='".$_POST['Nombre']."', Precio='".$_POST['Precio']."', Imagen ='".$nombre."' where idProducto=".$_POST['id'].";");
    // }
    // header("Location: ../");
?>

<!-- Inicio de dashboard -->
<?php require_once "templates/inicio-dashboard.php" ?>

<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Categorías de Productos</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Editar las categorías</li>
                </ol>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="updateCategorias.php" enctype="multipart/form-data">
                        <input type="hidden" name="txtIdCat" value="<?php echo $row['id_cat_prod']; ?>">
                        <label for="nombreCategoria">Nombre Categoría: </label>
                        <input type="text" class="form-control mb-2" name="txtNombreCat" value="<?php echo $row['nombre']; ?>">
                        <label for="descripcionCategoria">Descripción: </label>
                        <textarea name="txtDescripcionCat" class="form-control mb-4" cols="30" rows="10"><?php echo $row['descripcion']; ?></textarea>
                        <label for="imgCategoria">Imagen de la Categoría: </label>
                        <input type="file" class="form-control mb-4" name="txtImgCat">
                    
                        <input type="submit" class="btn btn-warning" value="Editar">
                    </form>
                </div>
            </div>
        </main>

<!-- Cierre de dashboard -->
<?php require_once "templates/cierre-dashboard.php"; ?>