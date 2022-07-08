<?php

$tipo_solicitante = $_POST['tipo_solicitante'];
$run_soli = $_POST['run_soli'];
$p_nombre_sol = $_POST['p_nombre_sol'];
$s_nombre_sol = $_POST['s_nombre_sol'];
$p_apellido_sol = $_POST['p_apellido_sol'];
$s_apellido_sol = $_POST['s_apellido_sol'];
$correo_ins_sol = $_POST['correo_ins_sol'];
$contrasena = $_POST['contrasena'];
$num_tel_sol = $_POST['num_tel_sol'];
$fk_id_escuela = $_POST['fk_id_escuela'];
$fk_id_seccion = $_POST['fk_id_seccion'];
$fk_id_carrera = $_POST['fk_id_carrera']; 


if(!empty($tipo_solicitante) || !empty($run_soli) || !empty($p_nombre_sol) || !empty($s_nombre_sol) || 
!empty($p_apellido_sol) || !empty($s_apellido_sol) || !empty($correo_ins_sol) || !empty($contrasena) || !empty($num_tel_sol) || 
!empty($fk_id_escuela) || !empty($fk_id_seccion) || !empty($fk_id_carrera) ){ 
    
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "panol";

    $conn = new mysqli($host,$user,$password,$db);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else {
        $SELECT = "SELECT num_tel_sol from solicitante where num_tel_sol = ? limit 1 ";
        // SE REPRESENTA CON UNA INTERROGANTE PORQUE NO SE SABE CUANTOS SE VAN A REGISTRAR 
        $INSERT = "INSERT INTO solicitante (tipo_solicitante,run_soli,p_nombre_sol,s_nombre_sol,p_apellido_sol,
        s_apellido_sol,correo_ins_sol,contrasena,num_tel_sol,fk_id_escuela,fk_id_seccion,fk_id_carrera)
        values(?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $conn->prepare($SELECT);
        $stmt ->bind_param( "i", $num_tel_sol);
        $stmt ->execute();
        $stmt ->bind_result($num_tel_sol);
        $stmt ->store_result();
        $rnum =$stmt->num_rows;
        if($rnum == 0) {
            $stmt ->close();
            $stmt = $conn->prepare($INSERT);
            $stmt ->bind_param( "sissssssiiii", $tipo_solicitante,$run_soli,$p_nombre_sol,$s_nombre_sol,$p_apellido_sol,
            $s_apellido_sol,$correo_ins_sol,$contrasena,$num_tel_sol,$fk_id_escuela,$fk_id_seccion,$fk_id_carrera);
            $stmt ->execute();
            echo '<script language="javascript">alert("REGISTRO COMPLETADO");window.location.href="registro.php"</script>';
        }
        else {

            echo "alguien registro ese numero";
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