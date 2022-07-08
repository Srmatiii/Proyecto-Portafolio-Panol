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
    <link rel="stylesheet" type="text/css" href="Sistema/css/listaProducto.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <title>Solicitudes</title>
</head>
<body>
    <?php include "Sistema/includes/HeaderPanol.php"; ?>
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
                    <th>ID:</th>
                    <td><?php echo $consulta['id_solicitud']; ?></td>
                </tr>
                <tr>
                    <th>Fecha:</th>
                    <td><?php echo $consulta['fecha_solicitud']; ?></td>
                </tr>
                <tr>
                    <th>Hora:</th>
                    <td><?php echo $consulta['hora_solicitud']; ?></td>
                </tr>
                <tr>
                    <th>Cantidad:</th>
                    <td><?php echo $consulta['cantidad_producto']; ?></td>
                </tr>
                <?php } ?>

            <?php
                $fk_id_producto = $_GET['fk_id_producto'];
                $data1 = mysqli_query($conn, "SELECT * FROM producto where id_producto = '$fk_id_producto'");
                while ($consulta1 = $data1->fetch_array(MYSQLI_ASSOC)) {
            ?>
            
                <tr>
                    <th>Herramienta:</th>
                    <td><?php echo $consulta1['nom_producto']; ?></td>
                </tr>
            <?php } ?>

            <?php
                $fk_id_solicitante = $_GET['fk_id_solicitante'];
                $data2 = mysqli_query($conn, "SELECT * FROM solicitante where id_solicitante = '$fk_id_solicitante'");
                while ($consulta2 = $data2->fetch_array(MYSQLI_ASSOC)) {
            ?>
            
                <tr>
                    <th>Tipo solicitante:</th>
                    <td><?php echo $consulta2['tipo_solicitante']; ?></td>
                </tr>
                <tr>
                    <th>Rut:</th>
                    <td><?php echo $consulta2['run_soli']; ?></td>
                </tr>
                <tr>
                    <th>Nombre:</th>
                    <td><?php echo $consulta2['p_nombre_sol']; ?> <?php echo $consulta2['p_apellido_sol']; ?></td>
                </tr>
                <tr>
                    <th>Correo:</th>
                    <td><?php echo $consulta2['correo_ins_sol']; ?></td>
                </tr>
                <?php } ?>
        </table>
    
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