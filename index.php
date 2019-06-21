<?php
  session_start();
?>

<html>
<title>Inicio - Bienvenidos</title>

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

        <?php if(!isset($_SESSION["idUsuario"])): ?>
        <a class="w3-bar-item w3-button w3-hover-lime w3-padding-16" href="registrarse.php">Registrarse</a>
        <a class="w3-bar-item w3-button w3-hover-lime w3-padding-16" href="login.php">Iniciar Sesion</a>
        <?php else: ?>
        <a class="w3-bar-item w3-button w3-hover-lime w3-padding-16" href="blog.php">Blog</a>
        <a class="w3-bar-item w3-button w3-hover-lime w3-padding-16" href="recojo.php">Programa tu recojo</a>
        <a href="logout.php" class="btn btn-danger mt-3" style="float:right;">Cerra Sesion</a>
        <?php endif;?>

    </div>



    <div class="w3-display-container w3-lime" style="height:435px;">

        <div class="container">
            <h2 class="w3-display-topleft">Labor Social</h2>
            <div class="w3-content w3-display-left w3-section" style="max-width:425px">
                <img class="mySlides" src="rec1.jpg" style="width:100%">
                <img class="mySlides" src="rec2.jpg" style="width:100%">
                <img class="mySlides" src="rec3.jpg" style="width:100%">
            </div>  

            <h2 class="w3-display-topmiddle">Capacitaciones</h2>
            <div class="w3-content w3-display-middle w3-section" style="max-width:425px">
                <img class="mySlides1" src="char1.png" style="width:100%">
                <img class="mySlides1" src="char2.jpg" style="width:100%">
                <img class="mySlides1" src="char3.jpg" style="width:100%">
            </div>
        </div>
    </div>

    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {
                myIndex = 1;
            }
            x[myIndex - 1].style.display = "block";
            setTimeout(carousel, 2000); // Change image every 2 seconds
        }
    </script>

    <script>
        var myIndex1 = 0;
        carousel();

        function carousel() {
            var p;
            var y = document.getElementsByClassName("mySlides1");
            for (p = 0; p < y.length; p++) {
                y[p].style.display = "none";
            }
            myIndex1++;
            if (myIndex1 > y.length) {
                myIndex1 = 1;
            }
            y[myIndex1 - 1].style.display = "block";
            setTimeout(carousel, 2000); // Change image every 2 seconds
        }
    </script>
    
</body>

</html>