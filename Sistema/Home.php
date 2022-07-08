<?php 
session_start();

if(isset($_SESSION['id_solicitante']) || isset($_SESSION['run_soli'])) {

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/pruebas.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Home</title>
</head>
<body>
	<?php include "includes/Header.php"; ?>
	<div id="container">
		<h1 style="text-align:center">Bienvenido al sistema</h1>
	</div>
	<br><br>
	<div id="container" class="titulo">
		<h1>Novedades</h1>
	</div>
	<br><br>
	<div class="container">
  		<div class="row">
  			<div class="col" style="width: 18rem;" >
  				<a href="solicitudProducto.php"> <img src="img/note.jpg" class="card-img-top"></a>
  				<div class="card-body">
    			<p class="card-text">35 Equipos Nuevos para salas que no son Laboratorios</p>
  				</div>
			</div>
    		<div class="col" style="width: 18rem;">
				<a href="solicitudProducto.php"> <img src="img/cable.jpg" class="card-img-top"></a>
  				<div class="card-body">
    			<p class="card-text">Disponibles Cables de Red</p>
  				</div>
			</div>
    		<div class="col" style="width: 18rem;">
				<a href="solicitudProducto.php"> <img src="img/proye.png" class="card-img-top"></a>
  				<div class="card-body">
    			<p class="card-text">Pronto a llegarán Proyectores nuevos</p>
  				</div>
			</div>
  		</div>
	</div>
	
	<br>

	<div class="container">
  		<div class="row">
			<div class="col">
			<h2>Noticias Duoc UC</h2>
				<p>Seleccionado de Futbolito Varones logra Llegar a la final en Campeonato Regional</p>	
				<p>Se implementan Talleres de Invierno</p>
				<p>Se abren Horarios para el Gym de Duoc UC Sede Maipu</p>
				
			</div>
			
			<div class="col">
			<h2>Conoce un poco sobre el Nuevo Sistema</h2>
				<p>El nuevo sistema para el pañol te permitira solicitar en linea
					las herramientas que necesites par tus proyectos o pruebas, 
					sin la necesidad de tener tu credencial fisica. Solo debes registrarte. 
				</p>
				
			</div>
  		</div>
	</div>

<br><br>

	<div id="container" class="titulo">
		<h1>Reglamento Pañol</h1>
	</div>
	<br>
	<div class="container">
  		<div class="row">
			<div class="col">
			<h2>Requesitos para crear una Solicitud</h2>
				<p>Certificado de Alumno Regular al Dia</p>	
				<p>Estar al dia con Financiamiento</p>
				<p>No tener Sancion Previa</p>
				<p>No tener otra Solicitud Activa o en Espera</p>
				
			</div>
			
			<div class="col">
			<h2>Reglamento para Solicitar Herramientas</h2>
				<p>Debe tener su Usuario Registrado como Alumno o Profesor</p>
				<p>No tener Sancion por Entrega de una Herramienta en mal Estado</p>
				<p>No tener Sancion por Entrega a Destiempo de una Herramienta</p>
				<p>Se hace Responsable por Daños u Otros</p>
			</div>
    
  		</div>
	</div>
<br><br><br>

	<?php include "includes/footer.php"; ?>
</body>
</html>


<?php
}else {
	header("Location: index.php");
	exit();
}
?>