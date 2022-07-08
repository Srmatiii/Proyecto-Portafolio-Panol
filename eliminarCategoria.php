<?php
	
	$host = "localhost";
    $user = "root";
    $password = "";
    $db = "panol";

    $conn = new mysqli($host,$user,$password,$db);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }

	if(isset($_GET['id_categoria']) ) {
		$id_categoria = $_GET['id_categoria'];
		! is_numeric($id_categoria) ? die('Error al eliminar') : '';
	}
	
	$DELETE = " DELETE FROM categoria WHERE id_categoria = $id_categoria";
	$conn->query($DELETE);

	if($conn->affected_rows < 0) {
		header("location: listaCategorias.php?=Hubo un problema");
	}else {
		header("location: listaCategorias.php");
	}
	
?>