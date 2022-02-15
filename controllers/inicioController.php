<?php
class InicioController {
    private $modelo;

    public function __construct(){
    
    }

    public function inicio(){
        $db = Database::conectar();
        require_once "views/header.php";
        require_once "views/inicio/principal.php";
        require_once("views/footer.php");
    }
}

?>