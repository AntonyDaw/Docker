<?php

    $mysqli=new mysqli("127.0.0.1","root","","agenda");

    if ($mysqli->connect_error){
        echo "error al realizar la conexión";
    }else{

        if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['direccion']) &&
        isset($_POST['telefono']) && isset($_POST['edad']) && isset($_POST['altura']) && isset($_POST['insertar'])){

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $edad = $_POST['edad'];
            $altura = $_POST['altura'];

            $sql= "INSERT INTO datos (nombre, apellido, direccion, telefono, edad, altura) VALUES ('$nombre', '$apellido', '$direccion', $telefono, $edad, $altura)";
            $mysqli -> query($sql);

        }

    }


       
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Base de Datos</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
</head>
<body>
    <div id="container">
        <div id="formulario">
            <header>
                <h2>Introducir datos</h2>
                <form action="datos.php" method="post">

                    <table>
                        <tr>

                            <td>
                                <label for="">Nombre</label>
                                <input type="text" name="nombre">
                            </td>
                                
                            <td>
                                <label for="">Apellido</label>
                                <input type="text" name="apellido">
                            </td>

                            <td>
                                <label for="">Dirección</label>
                                <input type="text" name="direccion"><br><br>
                            </td>

                        </tr>

                        <tr>

                            <td>
                                <label for="">Telefono</label>
                                <input type="number" name="telefono">
                            </td>

                            <td>
                                <label for="">Edad</label>
                                <input type="number" name="edad">
                            </td>

                            <td>
                                <label for="">Altura</label>
                                <input type="number" step="0.01" name="altura">
                            </td>
                    

                        </tr>

                        <tr>
                            <td>
                                <input type="submit" value="Insertar" name="insertar">
                            </td>
                        </tr> 

                    </table>
            
                </form>
            </header>
            <footer>
                <a href="datos.php">Introduzir datos</a>
                <a href="buscar.php">Buscar persona</a>
                <a href="contar.php">Contar personas</a>
                <a href="borrar.php">Borrar usuario</a>
                <a href="">Campo contraseña</a>
                <a href="franja.php">Franja de edad</a>
                <a href="https://google.com">Salir</a>
            </footer>
        </div>
    </div>
</body>
</html>