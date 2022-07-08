<?php
	
	$host = "localhost";
    $user = "root";
    $password = "";
    $db = "panol";

    $conn = new mysqli($host,$user,$password,$db);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }

    $fk_id_solicitante = $_GET['fk_id_solicitante'];
    $id_solicitud = $_GET['id_solicitud'];

    $SELECT = "SELECT * FROM solicitante WHERE id_solicitante = '$fk_id_solicitante'";
    $stmt = $conn->query($SELECT);
    $row = $stmt->fetch_array(MYSQLI_ASSOC);

    $SELECT = "SELECT * FROM solicitud WHERE id_solicitud = '$id_solicitud'";
	$stmt = $conn->query($SELECT);
	$row1 = $stmt->fetch_array(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Msg Correo</title>
</head>
<body>
    <form action="enviarCorreo.php" method="POST">
        <div class="form-group">    
			<label>Nombre</label>
			<div class="">
				<input type="text" name="nombre_apellido" value="<?php echo $row['p_nombre_sol']; ?> <?php echo $row['s_nombre_sol']; ?>" disabled>
			</div>
		</div>
        <div class="form-group">    
			<label>Email</label>
			<div class="">
				<input type="text" name="correo_ins_sol" value="<?php echo $row['correo_ins_sol']; ?>" disabled>
			</div>
		</div>
        <div class="form-group">    
			<label>Asunto</label>
			<div class="">
				<input type="text" name="asunto" placeholder="Solicitud" required>
			</div>
		</div>
        <div class="form-group">    
			<label>Mensaje</label>
			<div class="">
				<textarea name="msg" placeholder="Su solicitud ha sido rechaza, Para mayor informacion acerquese al encargado correspondiente en cuestion" required></textarea>
			</div>
		</div>
        <div class="form-group">
			<div class="">
                <input type="hidden" name="id_solicitud" value="<?php echo $row1['id_solicitud']; ?>" />
			</div>
		</div>
        <div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input class="btn btn-success" style="color: #000; background-color: #f2a516; border-color: #f2a516; position: relative; left: 190px; top:61px; height:39px; width: 85px;" type="submit" value="Enviar" name="submit">
					</div>
				</div>
			</form>
				
			<td><button onclick="location.href='solicitudes.php'" style="color: #000; background-color: #f2a516; border-color: #f2a516; position: relative; left: 50px; border-radius: 5px; width: 85px; height:39px; top: 22px;">Volver <i class="fa fa-undo"></i></button></td>
</body>
</html>

<!-- <?php

    // $SELECT1 = "SELECT correo_ins_sol FROM solicitante WHERE id_solicitante = $fk_id_solicitante";
    // if (!empty($_POST['nombre_apellido']) && !empty($_POST['asunto']) && !empty($_POST['msg']) && !empty($_POST['correo_ins_sol'])) {
    //     $name = $_POST['nombre_apellido'];
    //     $asunto = $_POST['asunto'];
    //     $msg = $_POST['msg'];
    //     $email = $_POST['correo_ins_sol'];
    //     $header = 'From: noreply@example.com' . "\r\n";
    //     $header.= 'Reply-To: noreply@example.com' . "\r\n";
    //     $header.= 'X-Mailer: PHP/'. phpversion();
    //     $mail = mail($email,$asunto,$msg,$header);
    //     if ($mail){
    //         echo "MAIL ENVIADO EXITOSAMENTE";
    //     }
    // }

    //     if (isset($_GET['id_solicitud'])) {
    //         $id_solicitud = $_GET['id_solicitud'];
    //         mysqli_query($conn, "DELETE FROM solicitud WHERE id_solicitud=$id_solicitud");
    //         header('location: eliminarSolicitud.php');
    //     }
?> -->