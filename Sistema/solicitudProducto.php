<?php 
session_start();

if(isset($_SESSION['id_solicitante']) || isset($_SESSION['run_soli'])) {

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "panol";

    $conn = new mysqli($host,$user,$password,$db);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }

    $id_solicitante = isset($_SESSION['id_solicitante']);

    $SELECT2 = "SELECT id_solicitante FROM solicitante WHERE id_solicitante = '$id_solicitante'";
    $stmt1 = $conn->query($SELECT2);
    $row1 = $stmt1->fetch_array(MYSQLI_ASSOC);
    $row2 = $row1['id_solicitante'];

    $SELECT = "SELECT * FROM categoria";
    $query = mysqli_query($conn, $SELECT);
    $filas = mysqli_fetch_all($query, MYSQLI_ASSOC); 
    mysqli_close($conn);
    

    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" type="text/css" href="css/pruebas.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <title>Solicitud</title>
        </head>
        <body>
        <?php include "includes/Header.php"; ?>
        <section id="container">
          <h1 style="text-align:center">Solicitud</h1>
            <form method="POST" action="guardarSolicitud.php">
            <div class="combobox">
                <label>Fecha de la entrega: </label>
                  <input type="date" name="fecha_solicitud" id="fecha_solicitud" min="2022-07-08" placeholder="YYYY-MM-DD" required>
                  <br></br>
                <label>Hora de la entrega: </label>
                  <input type="time" name="hora_solicitud" id="hora_solicitud" placeholder="Ingrese la hora" min="08:30:00" max="22:00:00" required>
                <br></br>
                <label>Categorias: </label>
                  <select id="categoria" required>
                    <option value="">- Seleccione la categoria -</option>
                    <?php foreach ($filas as $op): //llenar las opciones del primer select ?>
                    <option value="<?= $op['id_categoria'] ?>"><?= $op['nom_categoria'] ?></option>  
                    <?php endforeach; ?>
                  </select>
                <br/><br/>
                <label>Herramientas: </label>
                  <select id="producto" name="fk_id_producto" disabled="" required>
                    <option value="">- Seleccione la herramienta-</option>
                  </select>
                <br></br>
                <label>Cantidad: </label>
                  <input type="number" name="cantidad_producto" placeholder="Cantidad" min="1" max="20"  pattern="^[0-9]+" required>
                <br></br>
                  <input type="hidden" name="fk_id_solicitante" value="<?php echo $row1['id_solicitante']; ?>" required>
                
                  <div class="form-group">
							      <div class="col-sm-offset-2 col-sm-10">
								      <input class="btn btn-success" style="color: #000; background-color: #f2a516; border-color: #f2a516; position: relative; left: 110px; top:20px;" type="submit" value="Enviar" name="submit">
							      </div>
						      </div>
            </form>
                <br/><br/>
              <span style="font-weight: bold;" id="Herramienta_sel"></span>
            </div>
        </section>
        <!-- Agregamos la libreria Jquery -->
        <script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
    
        <!-- Iniciamos el segmento de codigo javascript -->
        <script type="text/javascript">
          $(document).ready(function(){
            var producto = $('#producto');
            var Herramienta_sel = $('#Herramienta_sel');
    
            //Ejecutar accion al cambiar de opcion en el select de las categorias
            $('#categoria').change(function(){
              var fk_id_categoria = $(this).val(); //obtener el id seleccionado
    
              if(fk_id_categoria !== ''){ //verificar haber seleccionado una opcion valida
    
                /*Inicio de llamada ajax*/
                $.ajax({
                  //ajax nos permite intercambiar informacion entre el servidor  y el cliente//
                  data: {fk_id_categoria:fk_id_categoria}, //variables o parametros a enviar, formato => nombre_de_variable:contenido
                  dataType: 'html', //tipo de datos que esperamos de regreso
                  type: 'POST', //mandar variables como post o get
                  url: 'datosProducto.php' //url que recibe las variables
                }).done(function(data){ //metodo que se ejecuta cuando ajax ha completado su ejecucion             
    
                  producto.html(data); //establecemos el contenido html de producto con la informacion que regresa ajax             
                  producto.prop('disabled', false); //habilitar el select
                });
                /*fin de llamada ajax*/
    
              }else{ //en caso de seleccionar una opcion no valida
                producto.val(''); //seleccionar la opcion "- Seleccione -", reinicia la opcion del select
                producto.prop('disabled', true); //deshabilitar el select
              }    
            });
    
    
            //mostrar una leyenda con el producto seleccionado
            $('#producto').change(function(){
              $('#Herramienta_sel').html($(this).val() + ' - ' + $('#producto option:selected').text());
            });
    
          });
        </script>
        <?php include "includes/footer.php"; ?>    
      </body>
    </html>

<?php
}else {
	header("Location: index.php");
	exit();
}
?>
