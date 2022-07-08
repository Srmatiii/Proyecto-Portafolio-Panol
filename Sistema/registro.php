<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


    <div class="TituloRegistro">
        <h1>Registro</h1>
    </div>

<body>
    <div class="FormRegistro">
        <form action="save.php" method="POST">
            <table>
                <tr>
                    <td>Tipo del Solicitante:</td>
                    <td>
                        <input type="radio" name="tipo_solicitante" value="Profesor" required> Profesor
                        <input type="radio" name="tipo_solicitante" value="Alumno" required> Alumno
                    </td>
                </tr>
                <tr>
                    <td>Rut:</td>
                    <td><input type="text" name="run_soli" placeholder="Ingrese su rut" pattern="/^[0-9.]+[-]?+[0-9kK]{1}/" required></td>
                </tr>
                <tr>
                    <td>Primer Nombre:</td>
                    <td><input type="text" name="p_nombre_sol" placeholder="Ingrese su nombre" required></td>
                </tr>
                <tr>
                    <td>Segundo Nombre:</td>
                    <td><input type="text" name="s_nombre_sol" placeholder="Ingrese su segundo nombre" required></td>
                </tr>
                <tr>
                    <td>Primer Apellido:</td>
                    <td><input type="text" name="p_apellido_sol" placeholder="Ingrese su apellido" required></td>
                </tr>
                <tr>
                    <td>Segundo Apellido:</td>
                    <td><input type="text" name="s_apellido_sol" placeholder="Ingrese su segundo apellido" required></td>
                </tr>
                <tr>
                    <td>Correo</td>
                    <td><input type="email" name="correo_ins_sol" placeholder="Ingrese su correo" required></td>
                </tr>
                <tr>
                    <td>Contraseña</td>
                    <td><input type="password" name="contrasena" placeholder="Ingrese su contraseña" required></td>
                </tr>
                <tr>
                    <td>Numero</td>
                    <td><input type="text" name="num_tel_sol" placeholder="Ingrese su numero" pattern="^(0?9)[9876543210]\d{7}$" required></td>
                </tr>
                <tr>
                    <td>
                        <select class="seleccion" name="fk_id_escuela" required>
                            <option selected hidden value="">Escuela</option>
                            <option value="1">Sede Alameda</option>
                            <option value="2">Sede Antonio Varas</option>
                            <option value="3">Sede Maipú</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <select class="seleccion" name="fk_id_seccion" required>
                            <option selected hidden value="">Seccion</option>
                            <option value="1">Escuela de Diseño</option>
                            <option value="2">Escuela de Salud</option>
                            <option value="3">Escuela de informática</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <select class="seleccion" name="fk_id_carrera" required>
                            <option selected hidden value="">Carreras</option>
                            <option value="1">Analista Programador Computacional</option>
                            <option value="2">Animación Digital</option>
                            <option value="3">Comercio Exterior</option>
                            <option value="4">Enfermería</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center">
                        <input type="submit" value="Enviar" name="submit"> 
                        <td><button onclick="location.href='index.php'">Volver <i class="fa fa-undo"></i></button></td>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>