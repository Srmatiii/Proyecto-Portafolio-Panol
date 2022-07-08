<?php
$estado_entrega = $_POST['estado_entrega'];
$comentario_detalle = $_POST['comentario_detalle'];
$fk_id_solicitud = $_POST['fk_id_solicitud'];


if(!empty($estado_entrega) || !empty($comentario_detalle) || !empty($fk_id_solicitud) ){ 
    
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
        $cantidad_producto = $_POST['cantidad_producto'];
        $fk_id_producto = $_POST['fk_id_producto'];

        $Stock = "SELECT stock_producto FROM producto WHERE id_producto = '$fk_id_producto'";
        $stmt1 = $conn->query($Stock);
        $row1 = $stmt1->fetch_array(MYSQLI_ASSOC);

        $row2 = $row1['stock_producto'];

        $UPDATE = "UPDATE producto SET stock_producto = $row2-$cantidad_producto WHERE id_producto = $fk_id_producto";
        $stmt2 = $conn->query($UPDATE);
        

        $SELECT = "SELECT fk_id_solicitud from detalle_solicitud where fk_id_solicitud = ? limit 1 ";
        // SE REPRESENTA CON UNA INTERROGANTE PORQUE NO SE SABE CUANTOS SE VAN A REGISTRAR 
        $INSERT = "INSERT INTO detalle_solicitud (estado_entrega,comentario_detalle,fk_id_solicitud)
        values(?,?,?)";

        $stmt = $conn->prepare($SELECT);
        $stmt ->bind_param( "i", $fk_id_solicitud);
        $stmt ->execute();
        $stmt ->bind_result($fk_id_solicitud);
        $stmt ->store_result();
        $rnum =$stmt->num_rows;
        if($rnum == 0) {
            $stmt ->close();
            $stmt = $conn->prepare($INSERT);
            $stmt ->bind_param( "ssi", $estado_entrega, $comentario_detalle, $fk_id_solicitud);
            $stmt ->execute();
            echo '<script language="javascript">alert("REGISTRO COMPLETADO");window.location.href="detallesSolicitud.php"</script>';
        }
        else {
            echo "alguien registro ese nombre";
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