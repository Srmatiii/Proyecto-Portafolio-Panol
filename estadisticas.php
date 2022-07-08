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
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Sistema/css/pruebas.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="Sistema/js/plotly.js"></script>
    <script src="Sistema/js/jquery-3.2.0.min.js"></script>
    <title>Listado</title>
</head>
<body>
<?php include "Sistema/includes/HeaderPanol.php"; ?>
	<section class="container">
        <h1 style="text-align:center">Graficos</h1>
        <br>
            <div class="container">
                <div class="row">
                    <div class="panel panel-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div id="cargaLineal"></div>
                            </div>
                            <div class="col-sm-6">
                                <div id="cargaBarras"></div>
                            </div>
                        </div>
                    </div>
                </div>
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

<script type="text/javascript">
	$(document).ready(function(){
		$('#cargaLineal').load('estadistica/lineal.php');
		$('#cargaBarras').load('estadistica/barras.php');
	});
</script>