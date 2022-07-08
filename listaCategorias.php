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

    $where ="";

    if(!empty($_POST))
	{
		$valor = $_POST['campo'];
		if(!empty($valor)){
            $where = "WHERE nom_categoria LIKE '%$valor%'";
		}
	}

    $SELECT = "SELECT * FROM categoria $where";
    $stmt = $conn->query($SELECT);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Sistema/css/pruebas.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Categorias</title>
</head>
<body>
<?php include "Sistema/includes/HeaderPanol.php"; ?>
    <section id="container">
        <h1 style="text-align:center">Lista de Categorias</h1>
        <br>
        <div class="AnadirButt">
            <button onclick="location.href='agregarCategorias.php'">Añadir Categorias</button>
        </div>
        <br>
        <div class="btn_nuevo_producto">
            <form action="" method="POST">
				<b>Nombre: </b><input type="text" id="campo" name="campo" />
				<input type="submit" id="enviar" name="enviar" value="Buscar" class="btn_search" />
			</form>
        </div>

        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Categorias</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row = $stmt->fetch_array(MYSQLI_ASSOC)) { ?>
                    <tr>
                        <td><?php echo $row['id_categoria']; ?></td>
                        <td><?php echo $row['nom_categoria']; ?></td>
                        <td><a href="editarCategoria.php?id_categoria=<?php echo $row['id_categoria']; ?>"><i class="far fa-edit"></i></a></td>
                        <td><a href="eliminarCategoria.php?id_categoria=<?php echo $row['id_categoria']; ?>"><i class="far fa-trash-alt"></i></a></td>
                    </tr>
                 <?php } ?>
                </tbody>
            </table>
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