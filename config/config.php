<?php
    define('CLIENT_ID', 'AaSYGtWzGq_WcT359LImVHoToSGW8UVRaUgSsEIK-Tf5fNEnHdejInjpE4M_tgCDqYXVziWJFRqVFZvD');
    define('CURRENCY', 'MXN');
    // Token para cifrar información.
    define("KEY_TOKEN", "APR.wqc-354*");
    define("MONEDA", "$");

    // Sesión del url cotizar en línea.
    if(!isset($_SESSION)) { 
        session_start(); 
      }

    // Para hacer que el carrito no se borre la información.
    $num_cart = 0;
    if(isset($_SESSION['carrito']['productos'])){
        $num_cart = count($_SESSION['carrito']['productos']);
    }

?>