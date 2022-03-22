<?php
    // Conexión de la base de datos.
    require "config/database.php";

    // Validando que el post no venga vacio
    if($_POST){
        // obteniendo todos nuestros campos.
        $nombre = $_POST['registroCliente-txtNombre'];
        $apellidos = $_POST['registroCliente-txtApellidos'];
        $numeroCel = $_POST['registroCliente-txtNumero'];
        $email = $_POST['registroCliente-txtEmail'];
        $calle = $_POST['registroCliente-txtCalle'];
        $numExt = $_POST['registroCliente-txtNumExt'];
        $colonia = $_POST['registroCliente-txtColonia'];
        $entreCalles = $_POST['registroCliente-txtEntreCalles'];
        $municipio = $_POST['registroCliente-txtMunicipio'];
        $estado = $_POST['registroCliente-txtEstado'];
        $cp = $_POST['registroCliente-txtCp'];
        $pass = $_POST['registroCliente-txtPass'];

        //Prepara la consulta para mandar a insertarla a la base de datos
        $query = "INSERT INTO cliente (nombre, apellidos, numero_cel, email, calle, num_ext, entre_calles, colonia, municipio, estado, cp, password) 
        VALUES ('$nombre','$apellidos','$numeroCel','$email','$calle','$numExt','$colonia','$entreCalles','$municipio','$estado','$cp','$pass');";

        // Ejecutamos el query
        $result = mysqli_query($conexion, $query);

        // Validación si se hizo el insert de forma correcta.
        if($result){
            echo "<script>alert('Registro Exitoso!.')</script>";
        } else{
            echo "<script>alert('Error al registrar los datos!')</script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abarrotes Villa - Registrate</title>
    <link rel="stylesheet" href="assets/css/registrar-cliente.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <!-- Header del registro de cliente -->
    <?php require_once "templates/header.php" ?>

    <!-- Cuerpo del registro de cliente -->
    <section class="registroCliente">
        <div class="container">
            <h1 class="registroCliente-titulo mt-4">CREAR CUENTA (CLIENTE)</h1>
            <form method="POST" action="registrarCliente.php" enctype="multipart/form-data">
                <div class="row row-cols-2">
                    <div class="col mt-4">
                        <label for="nombreCliente" class="form-label">Nombre *</label>
                        <input type="text" class="form-control" name="registroCliente-txtNombre" placeholder="Campo Requerido" required>
                    </div>
                    <div class="col mt-4">
                        <label for="exampleFormControlInput1" class="form-label">Apellidos *</label>
                        <input type="text" class="form-control" name="registroCliente-txtApellidos" placeholder="Campo Requerido" required>
                    </div>
                    <div class="col mt-4">
                        <label for="exampleFormControlInput1" class="form-label">Número de Celular *</label>
                        <input type="number" class="form-control" name="registroCliente-txtNumero" placeholder="Campo Requerido" required>
                    </div>
                    <div class="col mt-4">
                        <label for="exampleFormControlInput1" class="form-label">E-mail *</label>
                        <input type="email" class="form-control" name="registroCliente-txtEmail" placeholder="Campo Requerido" required>
                    </div>
                    <div class="col mt-4">
                        <label for="exampleFormControlInput1" class="form-label">Calle *</label>
                        <input type="text" class="form-control" name="registroCliente-txtCalle" placeholder="Campo Requerido" required>
                    </div>
                    <div class="col mt-4">
                        <label for="exampleFormControlInput1" class="form-label">Número Exterior *</label>
                        <input type="number" class="form-control" name="registroCliente-txtNumExt" placeholder="Campo Requerido" required>
                    </div>
                    <div class="col mt-4">
                        <label for="exampleFormControlInput1" class="form-label">Colonia *</label>
                        <input type="text" class="form-control" name="registroCliente-txtColonia" placeholder="Campo Requerido" required>
                    </div>
                    <div class="col mt-4">
                        <label for="exampleFormControlInput1" class="form-label">Entre calles *</label>
                        <input type="text" class="form-control" name="registroCliente-txtEntreCalles" placeholder="Campo Requerido" required>
                    </div>
                    <div class="col mt-4">
                        <label for="exampleFormControlInput1" class="form-label">Municipio *</label>
                        <input type="text" class="form-control" name="registroCliente-txtMunicipio" placeholder="Campo Requerido" required>
                    </div>
                    <div class="col mt-4">
                        <label for="exampleFormControlInput1" class="form-label">Estado *</label>
                        <input type="text" class="form-control" name="registroCliente-txtEstado" placeholder="Campo Requerido" required>
                    </div>
                    <div class="col mt-4">
                        <label for="exampleFormControlInput1" class="form-label">Código Postal *</label>
                        <input type="text" class="form-control" name="registroCliente-txtCp" placeholder="Campo Requerido" required>
                    </div>
                    <div class="col mt-4">
                        <label for="exampleFormControlInput1" class="form-label">Contraseña *</label>
                        <input type="password" class="form-control" name="registroCliente-txtPass" placeholder="Campo Requerido" required>
                    </div>
                    <div class="col mt-4">
                        <label for="camposObligatorios" class="form-label">* Campos Obligatorios</label>
                    </div>
                    <div class="col mt-4">
                        <button type="submit" class="btn btn-warning registroCliente-btnRegistrar">Registrarme</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Footer del registro de cliente -->
    <?php require_once "templates/footer.php" ?>
</body>
</html>