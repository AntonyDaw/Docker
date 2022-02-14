<?php

    $mysqli=new mysqli("mysql","root","root","agenda");

    $flag = false;

    if ($mysqli->connect_error){
        echo "error al realizar la conexión";
    }else{

        if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['buscar'])){

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];

            $sql= "DELETE FROM datos WHERE nombre='$nombre' AND apellido='$apellido'";
            $mysqli -> query($sql);

            $flag = true;
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
                <h2>Borrar Persona</h2>
                <form action="borrar.php" method="post">

                    <table>

                        <?php
                            echo "<link rel='stylesheet' type='text/css' media='screen' href='main.css'>";

                            if($flag){
                                echo "Se ha borrado correctamente.";
                                $flag = false;
                            }  
                        ?>

                        <tr>
                            <td>
                                <label for="">Nombre</label>
                                <input type="text" name="nombre">
                            </td>
                                
                            <td>
                                <label for="">Apellido</label>
                                <input type="text" name="apellido">
                            </td>

                        <tr>
                            <td>
                                <input type="submit" value="Buscar" name="buscar">
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
