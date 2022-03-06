<!-- Cabecera Principal -->
<nav class="cabecera">
  <div class="container">
    <div class="cabecera-logo">
      <a href="index.php" class="cabecera_logo-links">
        <img src="assets/img/logo_nav.png" alt="logo abarrotes villa" width="100px" height="100px">
        <p>ABARROTES VILLA</p>
      </a>
    </div>
    <div class="cabecera-buscador">
      <input type="text" name="" id="" placeholder=" Buscar producto...">
    </div>
    <div class="cabecera-derecha">
      <div class="cabecera-login">
        <a href="login.php">
            <img src="assets/img/user-alt.png" alt="Inicio de sesión" width="30px" height="30px">
        </a>  
      </div>
      <div class="cabecera-carrito">
          <a href="#">
              <img src="assets/img/shopping-cart.png" alt="Carrito" width="30px" height="30px">
          </a>
      </div>
    </div>
  </div>
</nav>

  <!-- Cabecera de enlaces -->
  <!-- <nav class="nav-enlaces">
    <div class="container">
      <ul class="nav-enlaces-ul">
        <li><a href="#">Cotiza en línea</a></li>
        <li><a href="#">¿Quiénes somos?</a></li>
        <li><a href="horario.php">Horario</a></li>
        <li><a href="ubicacion.php">Ubicación</a></li>
        <li><a href="contacto.php">Contacto</a></li>
      </ul>
    </div>
  </nav>     -->

<div class="bg-yellow">
  <nav class="nav-enlaces container">
    <button class="nav-boton" onclick="accion()">
      <ion-icon name="menu"></ion-icon>
    </button>
    <a class="nav-enlace desaparece" href="#">Cotiza en línea</a>
    <a class="nav-enlace desaparece" href="#">Nosotros</a>
    <a class="nav-enlace desaparece" href="horario.php">Horario</a>
    <a class="nav-enlace desaparece" href="ubicacion.php">Ubicación</a>
    <a class="nav-enlace desaparece" href="contacto.php">Contacto</a>
  </nav>     
</div>
  
<script src="assets/js/scripts.js"></script>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>