<?php
    // Credenciales de la base de datos
    $hostname = "localhost";
    $database = "abarrotes_villa";
    $user = "root";
    $password = "";

    // Objeto que nos establecera la conexión.
    $conexion = new mysqli($hostname, $user, $password, $database);
    
    // Validación para establecer si la conexión fue exitosa.
    if($conexion -> connect_errno){
        echo "La conexion de la base de datos esta experimentando problemas";
    }
?>

