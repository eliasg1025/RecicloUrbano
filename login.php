<?php
    session_start();

    if (isset($_SESSION['idUsuario']))
    {
        header('Location: blog.php');
    }

    require_once "database.php";
    $conexion = abrirConexion();

    if (!empty($_POST['correoElectronico']) && !empty($_POST['password']))
    {
        $records = $conexion->prepare('SELECT `idUsuario`, `correoElectronico`, `password` FROM `usuario` WHERE `correoElectronico` = :correoElectronico;');
        $records->bindParam(':correoElectronico', $_POST['correoElectronico']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        // Mensaje en caso haya fallado la conexion
        $message = '';

        if (count($results) > 0 && $results["password"]==$_POST["password"])
        {
            $_SESSION['idUsuario'] = $results['idUsuario'];
            header("Location: blog.php");
        }
        else
        {
            $message = 'Sorry, Email o contraseña incorrectos';
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


    <div class="w3-display-container w3-lime" style="height:435px;">

        <form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
            <div class="container">
                <h1 class="text-center pt-3">Iniciar Sesion</h1>
                <hr>

                <?php if (!empty($message)): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $message ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>

                <div class="form-group">
                    <label for="email"><b>Email</b></label>
                    <input type="email" placeholder="Enter Email" name="correoElectronico" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="password"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" class="form-control" required>
                </div>


                <button type="submit" class="registerbtn btn btn-lg btn-primary mt-2">Ingresar</button>
            </div>

        </form>


    </div>



</body>
