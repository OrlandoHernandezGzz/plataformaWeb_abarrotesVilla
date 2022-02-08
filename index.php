<?php
// Para que todos los controladores tengan la conexion.
require_once "models/database.php";

// Si no fue establecido el controlador.
if(!isset($_GET['c'])){
    // Nos mandara a la vista inicio.
    require_once "controllers/inicio"."Controller.php";
    $controller = new InicioController();
    // LLama al metodo de un objeto
    call_user_func(array($controller, "Inicio"));
} else{
    // Instanciaremos un controlador.
    $controller = $_GET['c'];
    require_once "controllers/$controller"."Controller.php";
    $controller = ucwords($controller) . "Controller";
    $controller = new $controller;
    $accion = isset($_GET['a']) ? $_GET['a'] : "Inicio";
    call_user_func($controller, $accion);
}
?>