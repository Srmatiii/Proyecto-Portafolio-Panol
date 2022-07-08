<?php 
session_start();

if(isset($_SESSION['id_solicitante']) || isset($_SESSION['run_soli'])) {
	//isset Determina si una variable está definida y no es null//

	$host = "localhost";
    $user = "root";
    $password = "";
    $db = "panol";

    $conn = new mysqli($host,$user,$password,$db);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
	$SELECT = "SELECT * FROM categoria";
    $query = mysqli_query($conn, $SELECT);
	//mysqli_query Realiza una consulta a la base de datos//
    $filas = mysqli_fetch_all($query, MYSQLI_ASSOC); 
	//mysqli_fetch_all Obtiene múltiples filas de una consulta//
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Sistema/css/pruebas.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Registrar Producto</title>
</head>
<body>
    <?php include "Sistema/includes/HeaderPanol.php"; ?>
    <section id="container">
        <h1 style="text-align:center">Agregar Productos</h1>
        <div class="combobox">
			
			<form action="guardarProducto.php" method="POST">
				<div class="form-group">    
					<label>Nombre</label>
					<div class="">
						<input type="text" name="nom_producto" placeholder="Nombre de la herramienta" required>
					</div>
				</div>
				
				<div class="form-group">
					<label>Marca</label>
					<div class="">
						<input type="text" name="marca" placeholder="Marca de la herramienta" required>
					</div>
				</div>
				
				<div class="form-group">
					<label>Stock</label>
					<div class="">
						<input type="number" name="stock_producto" pattern="^[0-9]+" min="1" max="100" placeholder="Stock">
					</div>
				</div>
				<br>
				<div class="form-group">
					<label>Categoria</label>
					<select id="categoria" name="fk_id_categoria">
						<div class="">
							<option value="">- Seleccione la categoria -</option>
							<?php foreach ($filas as $op): //llenar las opciones del primer select, foreach proporciona un modo sencillo de iterar sobre arrays// ?>
							<option value="<?= $op['id_categoria'] ?>"><?= $op['nom_categoria'] ?></option>  
							<?php endforeach; ?>
						</div>
                  	</select>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input class="btn btn-success" style="color: #000; background-color: #f2a516; border-color: #f2a516; position: relative; left: 190px; top:61px; height:39px; width: 85px;" type="submit" value="Enviar" name="submit">
					</div>
				</div>
			</form>
				
			<td><button onclick="location.href='listaProducto.php'" style="color: #000; background-color: #f2a516; border-color: #f2a516; position: relative; left: 50px; border-radius: 5px; width: 85px; height:39px; top: 22px;">Volver <i class="fa fa-undo"></i></button></td>
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