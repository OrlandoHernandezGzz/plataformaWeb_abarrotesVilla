<?php
    // Conexion de la base de datos.
    require "config/database.php";

    // Mantiene la sesión del usuario.
    session_start();
    
    // Validación para agregar seguridad a la vista de admin.
    if(!isset($_SESSION['id_empleado'])){
        header("Location: index.php");
    }
    // Si el usuario accede se guardara su nombre.
    $nombreUser = $_SESSION['nombre'];

    // Logica para agregar una categoria de producto.
    if($_POST){
        // Guardamos la respuestas por metodo post.
        $nombreCategoria = $_POST['txtNombreCat'];
        $descripCategoria = $_POST['txtDescripcionCat'];
        $imgCategoria = $_FILES['txtImgCat']['name'];

        // Guardado de las imagenes dentro de la carpeta public.
        $fecha = new DateTime();
        $imagen = $fecha->getTimeStamp() . "_" . $_FILES['txtImgCat']['name'];
        $imgTemporal = $_FILES["txtImgCat"]["tmp_name"];

        move_uploaded_file($imgTemporal, "public/imgs/" . $imagen);

        $query = "INSERT INTO `cat_producto` (`nombre`, `descripcion`, `img`) VALUES ('$nombreCategoria', '$descripCategoria', '$imagen');";

        if(mysqli_query($conexion, $query)){
            echo "<script>alert('Registro Exitoso.')</script>";
        } else{
            echo "<script>alert('Error al registrar.')</script>";
        }

        // Nos retorna a la vista cateogrias productos.
        header("Location: categoriasProductos.php");
    }
?>

<!-- Inicio de dashboard -->
<?php require_once "templates/inicio-dashboard.php" ?>

<!-- Cuerpo del formulario -->
<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Categorías de Productos</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Registra las categorías</li>
                </ol>
            </div>

            <!-- Formulario de los datos del proyecto -->
            <div class="card">
                <div class="card-body">
                    <form action="agregarCategorias.php" method="post" enctype="multipart/form-data">
                        <label for="nombreCategoria">Nombre Categoría: </label>
                        <input type="text" class="form-control mb-2" name="txtNombreCat" id="">
                        <label for="descripcionCategoria">Descripción: </label>
                        <textarea name="txtDescripcionCat" class="form-control mb-4" id="" cols="30" rows="10"></textarea>
                        <label for="imgCategoria">Imagen de la Categoría: </label>
                        <input type="file" class="form-control mb-4" name="txtImgCat" id="txtImgCat">
                    
                        <input type="submit" class="btn btn-success" value="Guardar">
                    </form>
                </div>
            </div>
        </main>
        
<!-- Cierre de dashboard -->
<?php require_once "templates/cierre-dashboard.php"; ?>