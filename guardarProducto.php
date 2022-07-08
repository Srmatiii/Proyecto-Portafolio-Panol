<?php

$nom_producto = $_POST['nom_producto'];
$marca = $_POST['marca'];
$stock_producto = $_POST['stock_producto'];
$fk_id_categoria = $_POST['fk_id_categoria'];



if(!empty($nom_producto) || !empty($marca) || !empty($stock_producto) || !empty($fk_id_categoria) ){ 
    
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "panol";

    $conn = new mysqli($host,$user,$password,$db);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else {
        $SELECT = "SELECT nom_producto from producto where nom_producto = ? limit 1 ";
        // SE REPRESENTA CON UNA INTERROGANTE PORQUE NO SE SABE CUANTOS SE VAN A REGISTRAR 
        $INSERT = "INSERT INTO producto (nom_producto,marca,stock_producto,fk_id_categoria)
        values(?,?,?,?)";

        $stmt = $conn->prepare($SELECT);
        $stmt ->bind_param( "s", $nom_producto);
        //Agrega variables a una sentencia preparada como parámetros//
        $stmt ->execute();
        $stmt ->bind_result($nom_producto);
        //Vincula variables a una sentencia preparada para el almacenamiento de resultados//
        $stmt ->store_result();
        //Transfiere un conjunto de resultados de la última consulta//
        $rnum =$stmt->num_rows;
        //Obtiene el número de filas de un resultado//
        if($rnum == 0) {
            $stmt ->close();
            $stmt = $conn->prepare($INSERT);
            $stmt ->bind_param( "ssii", $nom_producto,$marca,$stock_producto,$fk_id_categoria);
            $stmt ->execute();
            echo '<script language="javascript">alert("REGISTRO COMPLETADO");window.location.href="agregarProducto.php"</script>';
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