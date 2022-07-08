<header>
    <div class="header">
                
        <div class="optionsBar">
        <link rel="stylesheet" type="text/css" href="Sistema/css/pruebas.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <?php include "functions.php"; ?>
            <span>Chile, <?php echo fechaC(); ?></span>
            <span>|</span>
            <span><?php echo $_SESSION['p_nombre_sol'] ?></span>
            <span>|</span>
            <a href="Sistema/salirPanol.php"><img class="close" src="Sistema/img/salir.png" alt="Salir del sistema" title="Salir"></a>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a><img class="logo" src="Sistema/img/logo.png" width="220"></a>
        <div class="container-fluid">
        
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Productos
                    </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="listaCategorias.php">Categorias</a></li>
                    <li><a class="dropdown-item" href="listaProducto.php">Lista de Productos</a></li>

                </ul>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Solicitudes
                    </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="solicitudes.php">Solicitudes</a></li>
                    <li><a class="dropdown-item" href="detallesSolicitud.php">Detalles Solicitudes</a></li>

                </ul>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="estadisticas.php">Estadisticas</a>
                </li>
                    </li>
                </ul>
        
            </div>
        </div>
    </nav>
<br><br>
</header>