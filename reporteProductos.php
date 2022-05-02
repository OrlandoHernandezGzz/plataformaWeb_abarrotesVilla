<?php
    require 'config/database.php';
    session_start();

    if(!isset($_SESSION['id_empleado'])){
        header("Location: index.php");
    }
    // $nombreUser = $_SESSION['nombre'];

    // $queryProd = "SELECT * FROM producto";
    $queryProd = "SELECT p.id_producto, p.nombre, p.descripcion, p.precio, p.in_stoke, p.descuento, p.img, cp.nombre as cat_nombre, pr.nombre as prove_nombre FROM producto AS p INNER JOIN cat_producto AS cp ON p.id_cat_prod = cp.id_cat_prod INNER JOIN proveedor as pr ON p.id_proveedor = pr.id_proveedor";
    $productos = $conexion->query($queryProd);
    $productos->fetch_assoc();
?>

<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Reporte de productos</title>
</head>
<body>
    <h1 class="text-center mb-4">Reporte de Productos</h1>
    <table class="table table-bordered">
        <thead class="container-fluid px-4">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Disponibles</th>
                <th>Descuento</th>
                <th>Imagen</th>
                <th>Categoria</th>
                <th>Proveedor</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($productos as $producto){ ?>
            <tr>
                <td scope="row"><?php echo $producto['id_producto']; ?></td>
                <td><?php echo $producto['nombre'];  ?></td>
                <td><?php echo $producto['descripcion']; ?></td>
                <td><?php echo $producto['precio']; ?></td>
                <td><?php echo $producto['in_stoke']; ?></td>
                <td><?php echo $producto['descuento']; ?>%</td>
                <td>
                    <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/plataformaweb_abarrotesVilla/public/imgs/<?php echo $producto['img']; ?>" width="100" alt="img categorias">
                </td>
                <td><?php echo $producto['cat_nombre']; ?></td>
                <td><?php echo $producto['prove_nombre']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>

<?php
    $html = ob_get_clean();
    // echo $html;

    require_once './libraries/dompdf/autoload.inc.php';

    use Dompdf\Dompdf;

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
    $dompdf->stream("reporte_productos.pdf", array('Attachment' => false));
?>