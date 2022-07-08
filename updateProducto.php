<?php
	
	$host = "localhost";
    $user = "root";
    $password = "";
    $db = "panol";

    $conn = new mysqli($host,$user,$password,$db);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }

	$id_producto = $_POST['id_producto'];
	$nom_producto = $_POST['nom_producto'];
	$marca = $_POST['marca'];
	$stock_producto = $_POST['stock_producto'];
	$fk_id_categoria = $_POST['categoria'];
	
	
	$UPDATE = "UPDATE producto SET nom_producto='$nom_producto', marca='$marca', stock_producto='$stock_producto', 
    fk_id_categoria='$fk_id_categoria' WHERE id_producto = '$id_producto'";
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
				
				<a href="listaProducto.php" class="btn btn-primary">Regresar</a>
				
				</div>
			</div>
		</div>
	</body>
</html>