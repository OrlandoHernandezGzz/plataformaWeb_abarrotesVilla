<?php
    // Conexion de la base de datos.
    require "config/database.php";

    // Mantiene la sesión del usuario.
    session_start();
    
    // Validación para agregar seguridad a la vista de admin.
    // Si no se inicia sesión el empleado no puede acceder a la vista admin
    if(!isset($_SESSION['id_empleado'])){
        header("Location: index.php");
    }
    // Si el usuario accede se guardara su nombre.
    $nombreUser = $_SESSION['nombre'];

    // Consultas para card-body
    $querycantCompra = "SELECT COUNT(id) AS NumberOfSales FROM compra;";
    $countCompra = $conexion->query($querycantCompra);
    $cantCompra = $countCompra->fetch_assoc();

    $querycantCatProd = "SELECT COUNT(id_cat_prod) AS NumberCatProd FROM cat_producto;";
    $countCatProd = $conexion->query($querycantCatProd);
    $cantCatProd = $countCatProd->fetch_assoc();

    $querycantProd = "SELECT COUNT(id_producto) AS NumberProd FROM producto;";
    $countProd = $conexion->query($querycantProd);
    $cantProd = $countProd->fetch_assoc();

    $querycantProve = "SELECT COUNT(id_proveedor) AS NumberProve FROM proveedor;";
    $countProve = $conexion->query($querycantProve);
    $cantProve = $countProve->fetch_assoc();

    // Consulta para establecer las vetnas en nuestra tabla del dashboard
    $queryVentas = "SELECT * FROM compra";
    $ventas = $conexion->query($queryVentas);

?>
    <!-- Inicio de dashboard -->
    <?php require_once "templates/inicio-dashboard.php"; ?>

    <!-- Cuerpo del dashboard -->
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <!-- <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol> -->
                <div class="row mt-4">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body text-center fs-5">Total de Ventas</div>
                            <p class="card-body text-center fs-1"><?php echo $cantCompra['NumberOfSales']; ?></p>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="">Ver Detalles</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body text-center fs-5">Total de Categorias</div>
                            <p class="card-body text-center fs-1"><?php echo $cantCatProd['NumberCatProd']; ?></p>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="categoriasProductos.php">Ver Detalles</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body text-center fs-5">Total de Productos</div>
                            <p class="card-body text-center fs-1"><?php echo $cantProd['NumberProd']; ?></p>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="productos.php">Ver Detalles</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body text-center fs-5">Total de Proveedores</div>
                            <p class="card-body text-center fs-1"><?php echo $cantProve['NumberProve']; ?></p>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="proveedores.php">Ver Detalles</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Tabla de ventas -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tabla de ventas
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Transacción</th>
                                    <th>Cliente</th>
                                    <th>Correo</th>
                                    <th>Estatus</th>
                                    <th>Fecha de Compra</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($ventas as $venta){ ?>
                                <tr>
                                    <td><?php echo $venta['id']; ?></td>
                                    <td><?php echo $venta['id_transaccion']; ?></td>
                                    <td><?php echo $venta['id_cliente']; ?></td>
                                    <td><?php echo $venta['email']; ?></td>
                                    <td><?php echo $venta['status']; ?></td>
                                    <td><?php echo $venta['fecha']; ?></td>
                                    <td><?php echo $venta['total']; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>

    <!-- Cierre de dashboard -->
    <?php require_once "templates/cierre-dashboard.php"; ?>