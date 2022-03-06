<?php 
// Conexion de la base de datos.
require "config/database.php";

if($_POST){
    // Para actualizar.
    $idActualizar = $_POST['txtIdCat'];
    $nombreActualizado = $_POST['txtNombreCat'];
    $descripActualizado = $_POST['txtDescripcionCat'];

    $queryActualizar = "UPDATE cat_producto SET nombre = '$nombreActualizado', descripcion='$descripActualizado'
    WHERE id_cat_prod='$idActualizar';";
    
    $resultActualizar = mysqli_query($conexion, $queryActualizar);
    if($resultActualizar){
        header("Location: categoriasProductos.php");
    } else {
        echo "Error";
    }
}
?>