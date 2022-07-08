<?php
	
	$host = "localhost";
    $user = "root";
    $password = "";
    $db = "panol";

    $conn = new mysqli($host,$user,$password,$db);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }

	$id_detalle_so = $_POST['id_detalle_so'];
	$estado_entrega = $_POST['estado_entrega'];
	$comentario_detalle = $_POST['comentario_detalle'];
	$fk_id_solicitud = $_POST['fk_id_solicitud'];
	
	$UPDATE = "UPDATE detalle_solicitud SET estado_entrega='$estado_entrega', comentario_detalle='$comentario_detalle' WHERE id_detalle_so = '$id_detalle_so'";
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
				
				<a href="detallesSolicitud.php" class="btn btn-primary">Regresar</a>
				
				</div>
			</div>
		</div>
	</body>
</html>