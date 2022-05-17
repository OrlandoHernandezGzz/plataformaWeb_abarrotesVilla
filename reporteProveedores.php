<?php
    // Conexion de la base de datos.
    require "config/database.php";

    // Mantiene la sesión del usuario.
    session_start();
    
    // Validación para agregar seguridad a la vista de admin.
    if(!isset($_SESSION['id_empleado'])){
        header("Location: index.php");
    }
    $nombreUser = $_SESSION['nombre'];

    // Consulta para establecer las categorias en la vista categoriasProductos
    $queryProv = "SELECT * FROM proveedor";

    $proveedores = $conexion->query($queryProv);
    $proveedores->fetch_assoc();
?>

<?php ob_start(); ?> <!-- Cargamos el buffer del html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Reporte de Proveedores</title>
</head>
<body>
<h1 class="text-center mb-4">Reporte de Proveedores</h1>
<!-- Tabla para visualizar los datos -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Teléfono</th>
            <th>Correo</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($proveedores as $proveedor){ ?>
        <tr>
            <td><?php echo $proveedor['id_proveedor']; ?></td>
            <td><?php echo $proveedor['nombre'];  ?></td>
            <td><?php echo $proveedor['descripcion']; ?></td>
            <td><?php echo $proveedor['numero_cel']; ?></td>
            <td><?php echo $proveedor['email']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</body>
</html>

<?php 
    $html = ob_get_clean(); 
    // echo $html;

    // include autoloader
    require_once './libraries/dompdf/autoload.inc.php';

    // reference the Dompdf namespace
    use Dompdf\Dompdf;

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();

    $options = $dompdf->getOptions();
    $options->set(array('isRemoteEnabled' => true));
    $dompdf->setOptions($options);


    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    // $dompdf->setPaper("letter");
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream("reporte_proveedores.pdf", array('Attachment' => false));
?>