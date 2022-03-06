<?php
    // Toma la sesión iniciada.
    session_start();
    // Destruye la sesión
    session_destroy();
    // Redirige al index.php
    header("Location: index.php");
?>