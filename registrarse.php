<?php
    require 'database.php';

    $message = "";
    $type = "";

    if (isset($_POST["nombre"]) && isset($_POST["correoElectronico"]) && isset($_POST["password"]))
    {
        $conexion = abrirConexion();
        // Preparando la consulta
        $sql = "INSERT INTO `usuario` (`nombre`, `dni`, `direccion`, `fechaNacimiento`, `distrito`,`correoElectronico`, `password`,`TipoUsuario_idTipoUsuario`) VALUES (:nombre, :dni, :direccion, :fechaNacimiento, :distrito, :correoElectronico, :password, '2')";
        $stmt = $conexion->prepare($sql);

        $nuevo = "2";

        // Vinculando parametros
        $stmt->bindParam(":nombre", $_POST["nombre"]);
        $stmt->bindParam(":dni", $_POST["dni"]);
        $stmt->bindParam(":direccion", $_POST["direccion"]);
        $stmt->bindParam(":fechaNacimiento", $_POST["fechaNacimiento"]);
        $stmt->bindParam(":distrito", $_POST["distrito"]);
        $stmt->bindParam(":correoElectronico", $_POST["correoElectronico"]);
        $stmt->bindParam(":password", $_POST["password"]);


        if ($stmt->execute()) {
            $message = "Se ha creado un nuevo usuario satisfactorimente, ingrese <a href='login.php'>aqui</a>";
            $type = "success";
        } else {
            $message = "Hubo un problemas al crear el usuario";
            $type = "danger";
        }
    }
?>

<html>
<title>Registrarse</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">

<style>
    .w3-tangerine {
        font-family: "Tangerine", serif;
    }
</style>

<body>

    <div class="w3-display-container w3-lime">

        <div class="w3-display-middle w3-padding">
            <div class="w3-container w3-tangerine">
                <p class="w3-jumbo">Reciclo Urbano</p>
            </div>
        </div>



        <img src="yggdrasil2.jpg" class="w3-circle" alt="Norway" style="width:9%">

    </div>


    <div class="w3-bar w3-section w3-green w3-card-4">
        <a class="w3-bar-item w3-button w3-green w3-hover-lime w3-padding-16" href="index.php">Inicio</a>
        <a class="w3-bar-item w3-button w3-hover-lime w3-padding-16" href="about.php">Acerca de Nosotros</a>
        <a class="w3-bar-item w3-button w3-hover-lime w3-padding-16" href="productos.php">Productos</a>
        <a class="w3-bar-item w3-button w3-hover-lime w3-padding-16" href="registrarse.php">Registrarse</a>
        <a class="w3-bar-item w3-button w3-hover-lime w3-padding-16" href="login.php">Iniciar Sesion</a>
    </div>


    <div class="w3-display-container w3-lime">

        <form action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
            <div class="container">
                <h1 class="text-center pt-3">Registrate</h1>
                <div class="container signin text-center">
                    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
                </div>
                <hr>

                <!-- Mensaje de confirmacion de registro -->
                <?php if (!empty($message)): ?>

                <div class="alert alert-<?=$type?> alert-dismissible fade show" role="alert">
                    <?=$message?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php endif; ?>

                <label for="nombre"><b>Nombre</b></label>
                <input type="text" class="form-control" placeholder="Enter your name" name="nombre" required>

                <label for="dni"><b>DNI</b></label>
                <input type="text" class="form-control" placeholder="Enter your dni" name="dni" required>

                <label for="direccion"><b>Direccion</b></label>
                <input type="text" class="form-control" placeholder="Enter your name" name="direccion" required>

                <label for="fechaNacimiento"><b>Fecha de Nacimiento</b></label>
                <input type="date" class="form-control" name="fechaNacimiento" required>

                <label for="distrito"><b>Distrito</b></label>
                <input type="text" class="form-control" placeholder="" name="distrito" required>

                <label for="correoElectronico"><b>Email</b></label>
                <input type="text" class="form-control" placeholder="Enter Email" name="correoElectronico" required>

                <label for="password"><b>Password</b></label>
                <input type="password" class="form-control" placeholder="Enter Password" name="password" required>

                <label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password" class="form-control" placeholder="Repeat Password" name="psw-repeat">
                <hr>

                <button type="submit" class="registerbtn btn btn-primary btn-lg mb-5">Register</button>
            </div>


        </form>


    </div>



</body>
