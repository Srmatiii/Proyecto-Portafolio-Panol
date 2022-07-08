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
        //Devuelve una cadena con la descripción del error de conexión//
    }

    $id_solicitante = isset($_SESSION['id_solicitante']);

    $SELECT2 = "SELECT fk_id_solicitante FROM solicitud WHERE fk_id_solicitante = '$id_solicitante'";
    $stmt1 = $conn->query($SELECT2);
    $row1 = $stmt1->fetch_array(MYSQLI_ASSOC);
    $row2 = $row1['fk_id_solicitante'];

    $SELECT = "SELECT * FROM solicitud WHERE fk_id_solicitante = '$row2'";
    $stmt = $conn->query($SELECT);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/pruebas.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Historial</title>
</head>
<body>
    <?php include "includes/Header.php"; ?>
    <section id="container">
        <h1 style="text-align:center">Historial</h1>


        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>fecha de entrega</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row = $stmt->fetch_array(MYSQLI_ASSOC)) { ?>
                    <tr>
                    <td><?php echo $row['id_solicitud']; ?></td>
                    <td><?php echo $row['fecha_solicitud']; ?></td>
                    <td><a href="verHistorial.php?id_solicitud=<?php echo $row['id_solicitud']; ?>"><i class="fa fa-eye"></i></a></td>
                    </tr>
                 <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
    <?php include "includes/footer.php"; ?>
</body>
</html>

<?php
}else {
	header("Location: index.php");
	exit();
}
?>