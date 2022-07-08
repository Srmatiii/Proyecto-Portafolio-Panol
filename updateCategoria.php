<?php
	
	$host = "localhost";
    $user = "root";
    $password = "";
    $db = "panol";

    $conn = new mysqli($host,$user,$password,$db);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }

	$id_categoria = $_POST['id_categoria'];
	$nom_categoria = $_POST['nom_categoria'];
	
	$UPDATE = "UPDATE categoria SET nom_categoria='$nom_categoria' WHERE id_categoria = '$id_categoria'";
	$stmt = $conn->query($UPDATE);
	
?>

<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
				<?php if($stmt) { ?>
				<h3>REGISTRO MODIFICADO</h3>
				<?php } else { ?>
				<h3>ERROR AL MODIFICAR</h3>
				<?php } ?>
				
				<a href="listaCategorias.php" class="btn btn-primary">Regresar</a>
				
				</div>
			</div>
		</div>
	</body>
</html>