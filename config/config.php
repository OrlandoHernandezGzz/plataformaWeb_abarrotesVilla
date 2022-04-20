<?php
    // Token para cifrar información.
    define("KEY_TOKEN", "APR.wqc-354*");
    define("MONEDA", "$");

    // Sesión del url cotizar en línea.
    session_start();

    // Para hacer que el carrito no se borre la información.
    $num_cart = 0;
    if(isset($_SESSION['carrito']['productos'])){
        $num_cart = count($_SESSION['carrito']['productos']);
    }

?>