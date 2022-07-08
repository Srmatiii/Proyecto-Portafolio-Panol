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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Sistema/css/pruebas.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Solicitudes</title>
</head>
<body>
    <?php include "includes/Header.php"; ?>
    <section id="container">
        <h1 style="text-align:center">Ver solicitud</h1>

        <table class="combobox">
            <?php 
                $id_solicitud = $_GET['id_solicitud'];
                $data = mysqli_query($conn, "SELECT * FROM solicitud WHERE id_solicitud = '$id_solicitud'");
                while ($consulta = $data->fetch_array(MYSQLI_ASSOC)) {
                    //while  ejecuta las sentencias anidadas//
            ?>
            
                <tr>
                    <th>Fecha de entrega:</th>
                    <td><?php echo $consulta['fecha_solicitud']; ?></td>
                </tr>
                <tr>
                    <th>Hora de entrega:</th>
                    <td><?php echo $consulta['hora_solicitud']; ?></td>
                </tr>
                <tr>
                    <th>Cantidad:</th>
                    <td><?php echo $consulta['cantidad_producto']; ?></td>
                </tr>
                
                <?php } ?>

                <?php 
                $data = mysqli_query($conn, "SELECT * FROM detalle_solicitud WHERE fk_id_solicitud = '$id_solicitud'");
                while ($consulta = $data->fetch_array(MYSQLI_ASSOC)) {
            ?>
                <tr>
                    <th>Estado de la entrega:</th>
                    <td><?php echo $consulta['estado_entrega']; ?></td>
                </tr>
                <tr>
                    <th>Comentario:</th>
                    <td><?php echo $consulta['comentario_detalle']; ?></td>
                </tr>
                    
                <?php } ?>
        </table>
    
    </section>
    <?php include "includes/footer.php"; ?>
</body>
</html>

<?php
}else {
	header("Location: Sistema/index.php");
	exit();
}
?>