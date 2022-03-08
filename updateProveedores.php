<?php 
// Conexion de la base de datos.
require "config/database.php";

if($_POST){
    // Para actualizar.
    $idProveedor = $_POST['txtIdProve'];
    $nombreProveedor = $_POST['txtNombreProve'];
    $descripProveedor = $_POST['txtDescripcionProve'];
    $celProveedor = $_POST['txtCelProve'];
    $emailProveedor = $_POST['txtEmaillProve'];

    $queryActualizar = "UPDATE proveedor SET nombre = '$nombreProveedor', descripcion='$descripProveedor',
    numero_cel = '$celProveedor', email = '$emailProveedor' WHERE id_proveedor='$idProveedor';";
    
    $resultActualizar = mysqli_query($conexion, $queryActualizar);
    if($resultActualizar){
        header("Location: proveedores.php");
    } else {
        echo "Error";
    }
}
?>