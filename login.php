<?php
    // Conexion de la base de datos.
    require "config/database.php";

    // Mantiene la sesión del usuario.
    session_start();

    if($_POST){
        // Petición de las variables.
        $usuario = $_POST['login-txtEmail'];
        $pass = $_POST['login-txtPassword'];

        // Consulta empleados.
        $query = "SELECT * FROM empleado WHERE email = '$usuario'";

        // Almacena resultado del query.
        $resultado = $conexion->query($query);
        $cantEmpleados = $resultado->num_rows;

        // Validación si hay registros en la tabla.
        if($cantEmpleados > 0){
            // Matriz asociativa de los registros.
            $row = $resultado->fetch_assoc();

            // Entra a la clave del arreglo y toma el valor de pass del registro.
            $user_db = $row['email'];
            $pass_db = $row['password'];
            $tipoEmp_db = $row['id_tipo_empleado'];

            // Validacion para las credenciales del usuario y contraseña.
            if($usuario == $user_db && $pass == $pass_db && $tipoEmp_db == 1){
                // Iniciamos sesiones del empleado.
                $_SESSION['id_empleado'] = $row['id_empleado'];
                $_SESSION['nombre'] = $row['nombre'];

                // Redirigir a la vista admin.php.
                header('Location: admin.php');
            } else if(false){
                // Iniciamos sesiones del cliente.
                // $_SESSION['id_cliente'];
                // $_SESSION['nombre'];

                // Redirigir a la vista 
                // header('Location: admin.php');
            } else {
                echo "<script>alert('Usuario o Contraseñas incorrectas.')</script>";
            }

        } else {
            echo "<script>alert('No existe el usuario digitado, favor de registrarse.')</script>";
        }

    }



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Abarrotes Villa</title>
    <link rel="stylesheet" href="./assets/css/login.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <!-- Header del login -->
    <?php require_once "templates/header.php" ?>

    <!-- Cuerpo del login -->
    <section class="login">
        <div class="container">
            <h1 class="login-titulo mb-4">Inicio de Sesión</h1>
            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                <div class="row">
                    <div class="col mb-4">
                        <label for="email" class="form-label">Correo Electronico *</label>
                        <input type="email" class="form-control" name="login-txtEmail" id="login-txtEmail">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-4">
                        <label for="password" class="form-label">Contraseña *</label>
                        <input type="password" class="form-control" name="login-txtPassword" id="login-txtPassword">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-4">
                        <label for="camposObligatorios" class="form-label">* Campos Obligatorios</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-4">
                        <button type="submit" class="btn btn-warning login-ingresar">Ingresar</button>
                    </div>
                </div>
            </form>

            <!-- Registro para el cliente -->
            <div class="registro bg-gris text-center mt-4">
                <a href="registrarCliente.php">
                    <h2 class="registro-link">¿No tienes cuenta? Registrate aquí.</h2>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer del login -->
    <?php require_once "templates/footer.php" ?>
</body>
</html>