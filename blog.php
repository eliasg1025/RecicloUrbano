<?php
  session_start();

  if (!isset($_SESSION['idUsuario'])) {
    header('Location: login.php');
  }

  require "database.php";
  require "funciones/gets.php";

  $conexion = abrirConexion();

  $records = $conexion->prepare('SELECT * FROM `usuario` WHERE `idUsuario`=:idUsuario');
  $records->bindParam(':idUsuario', $_SESSION['idUsuario']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  if (count($results) > 0) {
    $usuario = $results;
  }
?>

<?php
  $recordsPosts = $conexion->query("SELECT * FROM `recojo` ORDER BY fechaPublicacion DESC");
?>

<?php
  $getFunction = new getFunction($conexion);
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
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
		<a class="w3-bar-item w3-button w3-hover-lime w3-padding-16" href="blog.php">Blog</a>
		<a class="w3-bar-item w3-button w3-hover-lime w3-padding-16" href="recojo.php">Programa tu recojo</a>
		<a href="logout.php" class="btn btn-danger mt-3" style="float:right;">Cerra Sesion</a>
	</div>

	<div class="w3-display-container w3-lime pb-5">


		<section class="container">

			<h1 class="text-center pt-5">Bienvenido <?=$getFunction->getNombreUsuario($_SESSION["idUsuario"])?></h1>
			<hr>

			<?php while($resultsPosts = $recordsPosts->fetch(PDO::FETCH_ASSOC)): ?>
			<div class="row post-entry">
				<div class="col-md-12 post">
					<div class="row">
						<div class="col-md-12">
							<h4>
								<strong><?=$resultsPosts["titulo"]?></strong>
							</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 post-header-line">
							<span class="glyphicon glyphicon-user"></span>by <a
								href="#"><?=$getFunction->getNombreUsuario($resultsPosts["Usuario_idUsuario"])?></a> |
							<span class="glyphicon glyphicon-calendar">
							</span>Publicado <?=$resultsPosts["fechaPublicacion"]?>| <span
								class="glyphicon glyphicon-comment"></span><a href="#">
								Comments</a>
						</div>
					</div>
					<div class="row post-content">
						<div class="col-md-3">
							<a href="#">
								<img src="IMG/camion1.jpg" style="display: block; height: 150px ; width: 150px " alt=""
									class="img-responsive">
							</a>
						</div>
						<div class="col-md-9">
							<p>
								<ul class="list-group list-group-flush">
									<li>Fecha de recojo: <?=$resultsPosts["fechaRecojo"]?></li>
									<li> Hora de inicio: <?=$resultsPosts["horaInicio"]?></li>
									<li> Hora de fin: <?=$resultsPosts["horaFin"]?> </li>
									<li> Peso total: <?=$resultsPosts["pesoTotalRecojo"]?> </li>
								</ul>

							</p>
							<p>
								<a class="btn btn-primary"
									href="blog.php?Recojo_idRecojo=<?=$resultsPosts["idRecojo"]?>">Read more
								</a>
							</p>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<?php endwhile; ?>

		</section>
	</div>
</body>

</html>
