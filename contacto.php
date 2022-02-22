<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abarrotes Villa - Bienvenida</title>
    <link rel="stylesheet" href="./assets/css/contacto.css">
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
        <li><a href="#">Cotiza en línea</a></li>
        <li><a href="#">¿Quiénes somos?</a></li>
        <li><a href="horario.php">Horario</a></li>
        <li><a href="ubicacion.php">Ubicación</a></li>
        <li><a href="contacto.php">Contacto</a></li>
      </ul>
    </div>
  </nav>    

   <!-- Cuerpo del formulario de contacto -->
   <section class="contacto"> 
    <div class="container">
      <h1 class="contacto-titulo">Contacto</h1>
      <div class="row row-cols-2">
        <div class="col mb-4">
          <label for="exampleFormControlInput1" class="form-label">Nombre *</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Campo Requerido">
        </div>
        <div class="col mb-4">
          <label for="exampleFormControlInput1" class="form-label">Apellido *</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Campo Requerido">
        </div>
        <div class="col mb-4">
          <label for="exampleFormControlInput1" class="form-label">E-mail *</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Campo Requerido">
        </div>
        <div class="col">
          <label for="exampleFormControlInput1" class="form-label">Teléfono *</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Campo Requerido">
        </div>
      </div>

      <div class="row row-cols-1">
        <div class="col mb-4">
          <label for="exampleFormControlTextarea1" class="form-label">Mensaje *</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Escribe un mensaje..."></textarea>
        </div>
      </div>

      <div class="row row-cols-2">
        <div class="col">
          <label for="exampleFormControlTextarea1" class="form-label">* Campos Obligatorios</label>
        </div>
        <div class="col">
          <button type="button" class="btn btn-warning contacto-btn_enviar_mensaje">Enviar Mensaje</button>
        </div>
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