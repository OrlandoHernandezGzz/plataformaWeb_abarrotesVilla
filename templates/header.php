<?php require_once 'config/config.php'; ?>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script src="assets/js/scripts.js"></script>

<!-- Cabecera Principal -->
<header class="bg-red">
  <nav class="aparece inline">
    <button class="nav-boton" onclick="accion()">
      <ion-icon name="menu"></ion-icon>
    </button>
    <a class="nav-enlace nav-enlace-movil desaparece" href="cotizarEnLinea.php">Cotiza en línea</a>
    <a class="nav-enlace nav-enlace-movil desaparece" href="nosotros.php">Nosotros</a>
    <a class="nav-enlace nav-enlace-movil desaparece" href="horario.php">Horario</a>
    <a class="nav-enlace nav-enlace-movil desaparece" href="ubicacion.php">Ubicación</a>
    <a class="nav-enlace nav-enlace-movil desaparece" href="contacto.php">Contacto</a>
  </nav>
  
  <div class="container header">
    <a class="center a right stretch" href="index.php">
      <img src="assets/img/logo_nav.png" alt="Logo Abarrotes Villa" width="100px">
      ABARROTES VILLA
    </a>

    <div class="desaparece left ">
      <input class="buscador" type="text" name="txtBuscarProducto" placeholder=" Buscar producto...">
    </div>

    <div class="center left stretch">
      <a class="left nav-link" href="login.php">
        <img src="assets/img/user-alt.svg" alt="Inicio de sesión" width="30px">
      </a>
      <a class="nav-link" href="verificaCarrito.php">
        <img src="assets/img/shopping-cart.svg" alt="Carrito" width="30px">
        <span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>
      </a>
    </div>
  </div>

</header>

<div class="bg-yellow desaparece">
  <nav class="container">
    <button class="nav-boton" onclick="accion()">
      <ion-icon name="menu"></ion-icon>
    </button>
    <a class="nav-enlace desaparece" href="cotizarEnLinea.php">Cotiza en línea</a>
    <a class="nav-enlace desaparece" href="nosotros.php">Nosotros</a>
    <a class="nav-enlace desaparece" href="horario.php">Horario</a>
    <a class="nav-enlace desaparece" href="ubicacion.php">Ubicación</a>
    <a class="nav-enlace desaparece" href="contacto.php">Contacto</a>
  </nav>     
</div>

<div class="bg-yellow aparece">
  <div class="container centrar">
      <input class="buscadorAmarillo" type="text" name="txtBuscarProducto" placeholder=" Buscar producto...">
  </div>
</div>
  
