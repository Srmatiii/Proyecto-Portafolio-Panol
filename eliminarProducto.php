<?php
	
	$host = "localhost";
    $user = "root";
    $password = "";
    $db = "panol";

    $conn = new mysqli($host,$user,$password,$db);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }

	if(isset($_GET['id_producto']) ) {
		$id_producto = $_GET['id_producto'];
		! is_numeric($id_producto) ? die('Error al eliminar') : '';
		//is_numeric Comprueba si una variable es un número o un string numérico//
	}
	
	$DELETE = " DELETE FROM producto WHERE id_producto = $id_producto";
	$conn->query($DELETE);

	if($conn->affected_rows < 0) {
		header("location: listaProducto.php?=Hubo un problema");
	}else {
		header("location: listaProducto.php");
	}
	
?>
