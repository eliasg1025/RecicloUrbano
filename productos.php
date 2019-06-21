<?php
  session_start();
?>

<html>
<title>Productos</title>

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


  <div class="w3-display-container w3-lime" style="height:600px;">

    <div class="w3-content" style="max-width:450px">
      <img class="mySlides" src="prod1.jpg" style="width:100%;display:none">
      <img class="mySlides" src="prod2.jpg" style="width:100%">
      <img class="mySlides" src="prod3.jpg" style="width:100%;display:none">

      <div class="w3-row-padding w3-section">
        <div class="w3-col s4">
          <img class="demo w3-opacity w3-hover-opacity-off" src="prod1.jpg" style="width:100%;cursor:pointer"
            onclick="currentDiv(1)">
        </div>
        <div class="w3-col s4">
          <img class="demo w3-opacity w3-hover-opacity-off" src="prod2.jpg" style="width:100%;cursor:pointer"
            onclick="currentDiv(2)">
        </div>
        <div class="w3-col s4">
          <img class="demo w3-opacity w3-hover-opacity-off" src="prod3.jpg" style="width:100%;cursor:pointer"
            onclick="currentDiv(3)">
        </div>
      </div>
    </div>

    <script>
      function currentDiv(n) {
        showDivs(slideIndex = n);
      }

      function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        if (n > x.length) {
          slideIndex = 1
        }
        if (n < 1) {
          slideIndex = x.length
        }
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
        }
        x[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " w3-opacity-off";
      }
    </script>

  </div>



</body>