<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abarrotes Villa - Bienvenida</title>
    <link rel="stylesheet" href="./assets/css/horario.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
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
          <a href="#">
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
  <nav class="nav-enlaces">
    <div class="container">
      <ul class="nav-enlaces-ul">
        <li><a href="">Cotiza en línea</a></li>
        <li><a href="#">¿Quiénes somos?</a></li>
        <li><a href="horario.php">Horario</a></li>
        <li><a href="ubicacion.php">Ubicación</a></li>
        <li><a href="contacto.php">Contacto</a></li>
      </ul>
    </div>
  </nav>    

   <!-- Cuerpo horario -->
   <section class="horario"> 
    <div class="container">
      <h1 class="horario-titulo">Horario</h1>

      <div class="text-center pb-3">
        <img  src="assets/img/horario.png" width="412px" alt="Disponible los 365 días del año">
      </div>

      <div class="bg-gris text-center">
        <h2 class="horario-titulo ">LUNES A VIERNES</h2>
      </div>
      <div class="text-center">
        <p class="horario-info py-3">Abierto a partir de las 7:00 am hasta las 11:00 pm.</p>
      </div>
    
      <div class="bg-gris text-center ">
        <h2 class="horario-titulo ">SÁBADO Y DOMINGO</h2>
      </div>
      <div class="text-center">
        <p class="horario-info py-3">Abierto a partir de las 7:30 am hasta las 11:30 pm.</p>
      </div>
    </div>
  </section>
  
  <!-- Pie de la página -->
  <footer class="footer">
    <h1 class="footer_titulo-redes">REDES SOCIALES</h1>
    <div class="footer_redes">
      <a href="# ">
        <img src="assets/img/fb.png " alt=" " width="50px"/>
      </a>
      <a href="# ">
        <img src="assets/img/wa.png " alt=" " width="50px"/>
      </a>
      <a href="#">
        <img src="assets/img/ig.png " alt=" " width="50px"/>
      </a>
    </div>
    <p>DERECHOS RESERVADOS POR EQUIPO 2</p>
  </footer>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>