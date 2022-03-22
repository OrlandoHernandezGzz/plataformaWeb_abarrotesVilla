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
        $codigoProducto = $_POST['txtCodigoProd'];
        $nombreProducto = $_POST['txtNombreProd'];
        $descripProducto = $_POST['txtDescripcionProd'];
        $precioProducto = $_POST['txtPrecioProd'];
        $in_stokeProducto = $_POST['txtStokeProd'];
        $imgProducto = $_FILES['txtImgProd']['name'];
        $catProd = $_POST['txtCatProd'];
        $proveProd = $_POST['txtProveProd'];

        $fecha = new DateTime();
        $imagen = $fecha->getTimeStamp() . "_" . $_FILES['txtImgProd']['name'];
        $imgTemporal = $_FILES["txtImgProd"]["tmp_name"];

        move_uploaded_file($imgTemporal, "public/imgs/" . $imagen);

        $query = "INSERT INTO `producto` (`id_producto`, `nombre`, `descripcion`, `precio`, `in_stoke`, `img`, `id_cat_prod`, `id_proveedor`) 
        VALUES ('$codigoProducto', '$nombreProducto', '$descripProducto', '$precioProducto', '$in_stokeProducto', '$imagen', '$catProd', '$proveProd');";

        if(mysqli_query($conexion, $query)){
            echo "<script>alert('Registro Exitoso.')</script>";
        } else{
            echo "<script>alert('Error al registrar.')</script>";
        }

        header("Location: productos.php");
    }
?>

<!-- Inicio de dashboard -->
<?php require_once "templates/inicio-dashboard.php" ?>

<!-- Cuerpo del formulario -->
<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Productos</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Registra los Productos</li>
                </ol>
            </div>

            <!-- Formulario de los datos del proyecto -->
            <div class="card">
                <div class="card-body">
                    <form action="agregarProductos.php" method="post" enctype="multipart/form-data">

                        <label for="codigoProducto">Codigo Producto: </label>
                        <input type="number" class="form-control mb-4" name="txtCodigoProd">

                        <label for="nombreProducto">Nombre Producto: </label>
                        <input type="text" class="form-control mb-4" name="txtNombreProd">

                        <label for="descripcionProd">Descripción: </label>
                        <textarea name="txtDescripcionProd" class="form-control mb-4" cols="30" rows="10"></textarea>
                        
                        <label for="precioProd">Precio: </label>
                        <input type="number" class="form-control mb-4" name="txtPrecioProd">
                        
                        <label for="precioProd">En stoke: </label>
                        <input type="number" class="form-control mb-4" name="txtStokeProd">

                        <label for="imgProducto">Imagen del Producto: </label>
                        <input type="file" class="form-control mb-4" name="txtImgProd" id="txtImgProd">

                        <label for="catProducto">Categoría del producto: </label>
                        <select class="form-select mb-4" name="txtCatProd">
                            <option selected>Seleccione la categoría</option>
                            <!-- Cargamos las opciones de las categorias de los productos -->
                            <?php 
                                $queryIdCat = "SELECT id_cat_prod, nombre FROM cat_producto";
                                $resultIdCat = $conexion->query($queryIdCat);
                                foreach($resultIdCat as $optionsCat){
                                    echo "<option value='". $optionsCat['id_cat_prod']. "'>". $optionsCat['nombre'] ."</option>";
                                }
                            ?>
                        </select>
                        <label for="imgCategoria">Proveedor del Producto: </label>
                        <select class="form-select mb-4" name="txtProveProd">
                        <option selected>Seleccione el Proveedor</option>
                            <!-- Cargamos las opciones de los proveedores de los productos -->
                            <?php 
                                $queryIdProveedor = "SELECT id_proveedor, nombre FROM proveedor";
                                $resultIdProveedor = $conexion->query($queryIdProveedor);
                                foreach($resultIdProveedor as $optionsProveedor){
                                    echo "<option value='". $optionsProveedor['id_proveedor']. "'>". $optionsProveedor['nombre'] ."</option>";
                                }
                            ?>
                        </select>
                    
                        <input type="submit" class="btn btn-success" value="Guardar">
                    </form>
                </div>
            </div>
        </main>
        
<!-- Cierre de dashboard -->
<?php require_once "templates/cierre-dashboard.php"; ?>