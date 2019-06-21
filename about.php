<?php
  session_start();
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

<title>Acerca de Nosotros</title>
<link rel="stylesheet" href="owl/owl.carousel.min.ss">
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

   <div class="w3-bar w3-khaki">
    <button class="w3-bar-item w3-button tablink w3-khaki w3-hover-lime" onclick="openCity(event,'Servicios')">Servicios</button>
    <button class="w3-bar-item w3-button tablink w3-khaki w3-hover-lime" onclick="openCity(event,'Interés Social')">Interés Social</button>
    <button class="w3-bar-item w3-button tablink w3-khaki w3-hover-lime" onclick="openCity(event,'Desarrollo Cultural')">Desarrollo Cultural</button>
    <button class="w3-bar-item w3-button tablink w3-khaki w3-hover-lime" onclick="openCity(event,'Proyectos Sociales')">Proyectos Sociales</button>
    <button class="w3-bar-item w3-button tablink w3-khaki w3-hover-lime" onclick="openCity(event,'Reciclo en Marcha')">Reciclo en Marcha</button>
  </div>
  
  <div id="Servicios" class="w3-container w3-border city">
    <center>
    <h2>Servicios</h2>
    <p>Contamos con el transporte adecuado para cualquier tipo de residuo</p>


     <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="IMG/camion1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="IMG/camion2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="IMG/camion3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </center>
  </div>

  <div id="Interés Social" class="w3-container w3-border city" style="display:none">
    <h2>Interés Social</h2>
    <p>blabla bla alguna fotito</p> 
  </div>

  <div id="Desarrollo Cultural" class="w3-container w3-border city" style="display:none">
    <h2>Desarrollo Cultural</h2>
    <p>Lo importante esta en buscar el desarrollo cultural de la región y la mejora en las costumbres del consumismo cíclico. Ah no!</p>
  </div>

  <div id="Proyetos Sociales" class="w3-container w3-border city" style="display:none">
    <h2>Proyetos Sociales</h2>
    <p> los que se den pues</p>
  </div>

  <div id="Reciclo en Marcha" class="w3-container w3-border city" style="display:none">
    <h2>Reciclo en Marcha</h2>
    <p>El objetivo será la reactivación de los mercados de reciclaje y la puesta en valor de los residuos para su rehabilitación y nuevo uso.
    Contamos con los mejores procesos blablablabla</p>
  </div>


</div>

<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}
</script>


  </div> 

</body>