<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abarrotes Villa - Nosotros</title>
    <link rel="stylesheet" href="./assets/css/nosotros.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <!-- Cabecera Principal -->
  <?php require_once "templates/header.php" ?>

   <!-- Cuerpo nosotros -->
   <section class="nosotros"> 
    <div class="container">
      <h1 class="nosotros-titulo mb-4">Nosotros</h1>

      <div>
         <p class="nosotros-info py-3">La Tienda Abarrotes Villa es una de las franquicias líderes del ramo abarrotero, contando con mas de 30 años de existencia en el mercado enfocado en las necesidades básicas de nuestros clientes, con una presencia sólida en el mercado mexicano.</p>
      </div>

      <div class="ps-4 bg-gris ">
        <h2 class="nosotros-titulo">VISIÓN</h2>
      </div>
      <div class="">
        <p class="nosotros-info py-3">Duplicar la fidelización de cliente por medio de un continuo mejoramiento del servicio al cliente en sinergia con nuestros socios comerciales, fomentando el bienestar de nuestro equipo de trabajo, así mismo atendiendo las necesidades de nuestro mercado.</p>
      </div>
    
      <div class="ps-4 bg-gris">
        <h2 class="nosotros-titulo ">MISIÓN</h2>
      </div>
      <div class="">
        <p class="nosotros-info py-3">Ser aliado del comerciante acercando productos de consumo a través de acciones innovadorasque impulsan sus negocios, dando sustento a nuestras familias mexicanas.</p>
      </div>
    </div>
  </section>
  
  <!-- Pie de la página -->
  <?php require_once "templates/footer.php" ?>

</body>
</html>