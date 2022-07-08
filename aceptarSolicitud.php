<?php 
session_start();

if(isset($_SESSION['id_solicitante']) || isset($_SESSION['run_soli'])) {

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "panol";

    $conn = new mysqli($host,$user,$password,$db);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }

    $fk_id_solicitud = $_GET['id_solicitud'];
	$cantidad_producto = $_GET['cantidad_producto'];
	$fk_id_producto = $_GET['fk_id_producto'];

	$SELECT = "SELECT * FROM solicitud WHERE id_solicitud = '$fk_id_solicitud'";
	$stmt = $conn->query($SELECT);
	$row = $stmt->fetch_array(MYSQLI_ASSOC);

	$Stock = "SELECT stock_producto FROM producto WHERE id_producto = '$fk_id_producto'";
	$stmt1 = $conn->query($Stock);
	$row1 = $stmt1->fetch_array(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/pruebas.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Detalles</title>
</head>
<body>
	<?php include "Sistema/includes/HeaderPanol.php"; ?>
	<section id="container">
		<h1 style="text-align:center">Detalles solicitud</h1>
        <div class="combobox">
			
			<form action="guardarDetalles.php" method="POST">
				<div class="form-group">    
					<label>Estado de entrega</label>
					<div class="">
					<input type="radio" name="estado_entrega" value="Aceptado" required> Aceptado
					</div>
				</div>
				
				<div class="form-group">
					<label>Comentario</label>
					<div class="">
						<input type="textarea" name="comentario_detalle" placeholder="COMENTARIO" required>
					</div>
				</div>
				
				<div class="form-group">
					<label>ID solicitud</label>
					<div class="">
                        <input type="hidden" name="fk_id_solicitud" value="<?php echo $row['id_solicitud']; ?>" />
					</div>
				</div>
				<div class="form-group">
					<div class="">
                        <input type="hidden" name="cantidad_producto" value="<?php echo $row['cantidad_producto']; ?>" />
					</div>
				</div>
				<div class="form-group">
					<div class="">
                        <input type="hidden" name="id_solicitud" value="<?php echo $row['id_solicitud']; ?>" />
					</div>
				</div>
				<div class="form-group">
					<div class="">
                        <input type="hidden" name="fk_id_producto" value="<?php echo $row['fk_id_producto']; ?>" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input class="btn btn-success" style="color: #000; background-color: #f2a516; border-color: #f2a516; position: relative; left: 190px; top:61px; height:39px; width: 85px;" type="submit" value="Enviar" name="submit">
					</div>
				</div>
			</form>
				
			<td><button onclick="location.href='solicitudes.php'" style="color: #000; background-color: #f2a516; border-color: #f2a516; position: relative; left: 50px; border-radius: 5px; width: 85px; height:39px; top: 22px;">Volver <i class="fa fa-undo"></i></button></td>
		</div>
	</section>
	<?php include "Sistema/includes/footerPanol.php"; ?>
</body>
</html>

<?php
}else {
	header("Location: Sistema/index.php");
	exit();
}
?>