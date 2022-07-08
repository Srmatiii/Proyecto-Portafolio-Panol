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

	$id_categoria = $_GET['id_categoria'];
	
	$SELECT = "SELECT * FROM categoria WHERE id_categoria = '$id_categoria'";
	$stmt = $conn->query($SELECT);
	$row = $stmt->fetch_array(MYSQLI_ASSOC);
    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Sistema/css/pruebas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Editar Producto</title>
</head>
<body>
    <?php include "Sistema/includes/HeaderPanol.php"; ?>
    <section id="container">
        <h1 style="text-align:center">Editar Productos</h1>
        <div class="combobox">
			
			<form action="updateCategoria.php" method="POST">
				<div class="form-group">    
					<label>Nombre</label>
					<div class="">
						<input type="text" name="nom_categoria" placeholder="Nombre de la categoria" value="<?php echo $row['nom_categoria']; ?>" required>
					</div>
				</div>

				<input type="hidden" name="id_categoria" value="<?php echo $row['id_categoria']; ?>" />

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input class="btn btn-success" style="color: #000; background-color: #f2a516; border-color: #f2a516; position: relative; left: 190px; top:61px; height:39px; width: 85px;" type="submit" value="Enviar" name="submit">
					</div>
				</div>
			</form>
				
			<td><button onclick="location.href='listaCategorias.php'" style="color: #000; background-color: #f2a516; border-color: #f2a516; position: relative; left: 50px; border-radius: 5px; width: 85px; height:39px; top: 22px;">Volver <i class="fa fa-undo"></i></button></td>
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