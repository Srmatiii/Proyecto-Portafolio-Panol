<?php
session_start();
include "conexion.php";

    if(isset($_POST['run_soli']) || isset($_POST['contrasena'])) {

        function validate($data) {
            $data = trim($data);
            /*ELIMINA ESPACIO EN BLANCO*/
            $data = stripslashes($data);
            /*Quita las barras de un string con comillas escapadas*/
            $data = htmlspecialchars($data);
             /* CARACTERES ESPECIALES EN HTML*/
            return $data;

        }

        $run_soli =  validate($_POST['run_soli']);
        $contrasena = validate($_POST['contrasena']);

        if (empty($run_soli)) {
            $alert = 'Ingrese su correo';
            exit();

        }else if(empty($contrasena)) {
            $alert = 'Ingrese su clave';
            exit();

        }else {
            $sql = "SELECT * FROM solicitante WHERE run_soli='$run_soli' AND contrasena='$contrasena'";
            
            $result = mysqli_query($conection, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = $result->fetch_assoc();
                /* Obtener una fila de resultado como un array asociativo */
                if ($row['run_soli'] === $run_soli || $row['constrasena'] === $constrasena) {
                    $_SESSION['run_soli'] = $row['run_soli'];
                    $_SESSION['id_solicitante'] = $row['id_solicitante'];
                    $_SESSION['tipo_solicitante'] = $row['tipo_solicitante'];
                    $_SESSION['p_nombre_sol'] = $row['p_nombre_sol'];
                    $_SESSION['s_nombre_sol'] = $row['s_nombre_sol'];
                    $_SESSION['p_apellido_sol'] = $row['p_apellido_sol'];
                    $_SESSION['s_apellido_sol'] = $row['s_apellido_sol'];
                    $_SESSION['correo_ins_sol'] = $row['correo_ins_sol'];
                    $_SESSION['num_tel_sol'] = $row['num_tel_sol'];
                    $_SESSION['fk_id_escuela'] = $row['fk_id_escuela'];
                    $_SESSION['fk_id_seccion'] = $row['fk_id_seccion'];
                    $_SESSION['fk_id_carrera'] = $row['fk_id_carrera'];
                    header("Location: Home.php");
                    exit();
                }else {
                    $alert = 'El correo o la clave es incorrecto';
                    exit();
                }    
            }else {
                $alert = 'El correo o la clave es incorrecto';
                exit();
            }
        }

    }else {
        // header("Location: Home.php");
        // exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="IniciarSesion">
        <form action="" method="POST">
            <h1> Bienvenido al Sistema <br> de Gestion de <br> Solicitudes y producto</h1>
            <input type="text" name="run_soli" placeholder="Ingrese su rut">
            <input type="password" name="contrasena" placeholder="Ingrese su contraseña">
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <input type="submit" value="INGRESAR">
        </form>
    </div>
</body>
</html>
