<?php
  
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "panol";

    $conn = new mysqli($host,$user,$password,$db);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else {
        $id_solicitud = $_POST['id_solicitud'];
        $fk_id_solicitante = $_POST['fk_id_solicitante'];

        $SELECT1 = "SELECT correo_ins_sol FROM solicitante WHERE id_solicitante = $fk_id_solicitante";
        if (!empty($_POST['nombre_apellido']) && !empty($_POST['asunto']) && !empty($_POST['msg']) && !empty($_POST['correo_ins_sol'])) {
            $name = $_POST['nombre_apellido'];
            $asunto = $_POST['asunto'];
            $msg = $_POST['msg'];
            $email = $_POST['correo_ins_sol'];
            $header = 'From: noreply@example.com' . "\r\n";
            $header.= 'Reply-To: noreply@example.com' . "\r\n";
            $header.= 'X-Mailer: PHP/'. phpversion();
            $mail = mail($email,$asunto,$msg,$header);
            if ($mail){
                echo "MAIL ENVIADO EXITOSAMENTE";
            }
        }

        if (isset($_POST['id_solicitud'])) {
            $id_solicitud = $_POST['id_solicitud'];
            mysqli_query($conn, "DELETE FROM solicitud WHERE id_solicitud=$id_solicitud");
            header('location: Solicitudes.php');
        }
    }
?>