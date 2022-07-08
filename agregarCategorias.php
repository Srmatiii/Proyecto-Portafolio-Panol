<?php
session_start();

if(isset($_SESSION['id_solicitante']) || isset($_SESSION['run_soli'])) {

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
    <title>Registrar Categorias</title>
</head>
<body>
    <?php include "Sistema/includes/HeaderPanol.php"; ?>
    <!-- <section id="container">
        <h1 style="text-align:center">Agregar Categorias</h1>
        <div class="combobox">
			
			<form action="guardarCategoria.php" method="POST">
				<div class="form-group">    
					<label>Nombre de la categoria</label>
					<div class="">
						<input type="text" name="nom_categoria" placeholder="Nombre de la Categoria" required>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<td><button onclick="location.href='listaCategorias.php'" style="color: #000; background-color: #f2a516; border-color: #f2a516; position: relative; left: 50px; top:20px; border-radius: 5px; width: 85px; height:39px; top: 22px;">Volver <i class="fa fa-undo"></i></button></td>
						<input class="btn btn-success" style="color: #000; background-color: #f2a516; border-color: #f2a516; position: relative; left: 100px; top:20px;" type="submit" value="Enviar" name="submit">
					</div>
				</div>
			</form>
		</div>
    </section> -->
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<form action="guardarCategoria.php" method="POST" class="formularios">
					<h1 class="text-center">Agregar Categorias</h1>
					<br>
					<div class="form-group">    
						<h2 style="color:#fff;"><label>Nombre de la categoria:</label></h2>
					</div>
						
					<div class="form-group">
						<input type="text" name="nom_categoria" placeholder="Ingrese Categoria" required>
					</div>
					<br><br>
					<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input class="btn btn-success" style="color: #000; background-color: #f2a516; border-color: #f2a516; position: relative; left: 300px; height:39px; width: 85px;" type="submit" value="Enviar" name="submit">
					</div>
				</div>
				</form>
				
				<td><button onclick="location.href='listaCategorias.php'" style="color: #000; background-color: #f2a516; border-color: #f2a516; position: relative; bottom:71px; left:500px; border-radius: 5px; width: 85px; height:39px;">Volver <i class="fa fa-undo"></i></button></td>
			</div>
		</div>
	</div>
	<br>
	<?php include "Sistema/includes/footerPanol.php"; ?>
</body>
</html>

<?php
}else {
	header("Location: Sistema/index.php");
	exit();
}
?>