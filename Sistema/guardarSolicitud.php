<?php

$fecha_solicitud = $_POST['fecha_solicitud'];
$hora_solicitud = $_POST['hora_solicitud'];
$cantidad_producto = $_POST['cantidad_producto'];
$fk_id_producto = $_POST['fk_id_producto'];
$fk_id_solicitante = $_POST['fk_id_solicitante'];



if(!empty($fecha_solicitud) || !empty($hora_solicitud) || !empty($cantidad_producto) || !empty($fk_id_producto) || !empty($fk_id_solicitante) ){ 
    
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "panol";

    $conn = new mysqli($host,$user,$password,$db);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else {
        $SELECT = "SELECT id_solicitud from solicitud where id_solicitud = ? limit 1 ";
        // SE REPRESENTA CON UNA INTERROGANTE PORQUE NO SE SABE CUANTOS SE VAN A REGISTRAR 
        $INSERT = "INSERT INTO solicitud (fecha_solicitud,hora_solicitud,cantidad_producto,fk_id_producto,fk_id_solicitante)
        values(?,?,?,?,?)";

        $stmt = $conn->prepare($SELECT);
        $stmt ->bind_param( "i", $id_solicitud);
        $stmt ->execute();
        $stmt ->bind_result($id_solicitud);
        $stmt ->store_result();
        $rnum =$stmt->num_rows;
        if($rnum == 0) {
            $stmt ->close();
            $stmt = $conn->prepare($INSERT);
            $stmt ->bind_param( "ssiii", $fecha_solicitud,$hora_solicitud,$cantidad_producto,$fk_id_producto,$fk_id_solicitante);
            $stmt ->execute();
            echo '<script language="javascript">alert("REGISTRO COMPLETADO");window.location.href="solicitudProducto.php"</script>';
        }
        else {
            echo "alguien registro esa id solicitud";
        }
        $stmt->close();
        $conn->close();
    }

}
else{
    echo "todos los datos son OBLIGATORIOS";
    die();
}
?>