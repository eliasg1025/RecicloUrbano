<?php
    session_start();

    if (!isset($_SESSION['idUsuario'])) {
    header('Location: login.php');
    }

    require "database.php";
    require "funciones/gets.php";

    $conexion = abrirConexion();
?>

<?php
    if (isset($_POST["titulo"])) {
        $sql = "INSERT INTO `recojo` (`titulo`, `fechaPublicacion`, `fechaRecojo`, `horaInicio`, `horaFin`, `pesoTotalRecojo`, `Usuario_idUsuario`, `Conductor_idConductor`) VALUES (:titulo, :fechaPublicacion, :fechaRecojo, :horaInicio, :horaFin, :pesoTotalRecojo, :Usuario_idUsuario, '1')";

        $stmt = $conexion->prepare($sql);

        //Vinculando parametros
        date_default_timezone_set('America/Lima');
        $current_date = date("Y-m-d H:i:s");

        $stmt->bindParam(":titulo",$_POST["titulo"]);
        $stmt->bindParam(":fechaPublicacion",$current_date);
        $stmt->bindParam(":fechaRecojo",$_POST["fechaRecojo"]);
        $stmt->bindParam(":horaInicio",$_POST["horaInicio"]);
        $stmt->bindParam(":horaFin",$_POST["horaFin"]);
        $stmt->bindParam(":pesoTotalRecojo",$_POST["pesoTotalRecojo"]);
        $stmt->bindParam(":Usuario_idUsuario",$_SESSION["idUsuario"]);

        if ($stmt->execute()) {
            header("Location: blog.php");
        } else {
            echo "<h1>Hubo un error</h1>";
        }
    }
?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Programa tu recojo</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <style>
        .w3-tangerine {
            font-family: "Tangerine", serif;
        }
    </style>
</head>

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
        <a class="w3-bar-item w3-button w3-hover-lime w3-padding-16" href="blog.php">Blog</a>
        <a class="w3-bar-item w3-button w3-hover-lime w3-padding-16" href="recojo.php">Programa tu recojo</a>
        <a href="logout.php" class="btn btn-danger mt-3" style="float:right;">Cerrar Sesion</a>
    </div>



    <div class="w3-display-container w3-lime pb-5">

        <div class="pt-5">
            <h2 class="text-center">Datos para el recojo</h2>
        </div>

        <form action="<?=$_SERVER["PHP_SELF"]?>" method="POST" class="container">
            <div class="form-group">
                <label for="">Titulo del post</label>
                <input type="text" class="form-control" name="titulo" id="" placeholder="Titulo que sera publicado" required>
            </div>
            <div class="form-group">
                <label for="">Fecha de recojo</label>
                <input type="date" name="fechaRecojo" id="" class="form-control" required>
            </div>
            <div class="form-group">

                <label for="">Hora de Inicio</label>
                <input type="time" name="horaInicio" id="" class="form-control" required>

            </div>
            <div class="form-group">

                <label for="">Hora de Fin</label>
                <input type="time" name="horaFin" id="" class="form-control" required>

            </div>
            <div class="form-group">
                <label for="">Peso de total a recoger</label>
                <input type="number" name="pesoTotalRecojo" id="" class="form-control" min="1" required>
            </div>
            <input type="submit" value="Publicar" class="btn btn-success btn-lg">
        </form>
    </div>

</body>

</html>
