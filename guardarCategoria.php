<?php

$nom_categoria = $_POST['nom_categoria'];

if(!empty($nom_categoria) ){ 
    
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "panol";

    $conn = new mysqli($host,$user,$password,$db);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else {
        $SELECT = "SELECT nom_categoria from categoria where nom_categoria = ? limit 1 ";
        // SE REPRESENTA CON UNA INTERROGANTE PORQUE NO SE SABE CUANTOS SE VAN A REGISTRAR 
        $INSERT = "INSERT INTO categoria (nom_categoria)
        values(?)";

        $stmt = $conn->prepare($SELECT);
        $stmt ->bind_param( "s", $nom_categoria);
        $stmt ->execute();
        $stmt ->bind_result($nom_categoria);
        $stmt ->store_result();
        $rnum =$stmt->num_rows;
        if($rnum == 0) {
            $stmt ->close();
            $stmt = $conn->prepare($INSERT);
            $stmt ->bind_param( "s", $nom_categoria);
            $stmt ->execute();
            echo '<script language="javascript">alert("REGISTRO COMPLETADO");window.location.href="agregarCategorias.php"</script>';
        }
        else {
            echo "alguien registro esa categoria";
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