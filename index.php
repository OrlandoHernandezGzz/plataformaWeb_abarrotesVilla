<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abarrotes Villa - Bienvenida</title>
    <link rel="stylesheet" href="./assets/css/index.css">
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
        <li><a href="#">Horario</a></li>
        <li><a href="ubicacion.php">Ubicación</a></li>
        <li><a href="contacto.php">Contacto</a></li>
      </ul>
    </div>
  </nav>    

  <!-- Cuerpo de nuestra landing page -->
  <br><br>
  <!-- Curusel de nuestra página principal -->
  <div class="container">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="assets/img/img_carusel.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="assets/img/img_carusel.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="assets/img/img_carusel.png" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <!-- Seccion de categorias -->
  <section class="categorias">
    <div class="container">
      <h2>Categorias</h2>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card">
            <img src="" class="card-img-top" alt="">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="" class="card-img-top" alt="">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="" class="card-img-top" alt="">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="" class="card-img-top" alt="">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
            </div>
          </div>
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