<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "panol";

    $conn = new mysqli($host,$user,$password,$db);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }

    $fk_id_categoria = filter_input(INPUT_POST, 'fk_id_categoria'); //obtenemos el parametro que viene de ajax

    /*Obtenemos los productos de las categorias seleccionada*/
    $SELECT = "SELECT id_producto, nom_producto, marca, stock_producto from producto where fk_id_categoria = ".$fk_id_categoria;  
    $query = mysqli_query($conn, $SELECT);
    $filas = mysqli_fetch_all($query, MYSQLI_ASSOC); 
    //Obtener todas las filas en un array asociativo, numérico, o en ambos//
    mysqli_close($conn);

    // Se genera código `html`, esto es lo que sera retornado a `ajax` para llenar el combo dependiente//
    ?>

    <option value="">- Seleccione -</option>
    <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
    <option value="<?= $op['id_producto'] ?>"><?= $op['nom_producto'] ?></option>
    <?php endforeach; ?>

?>