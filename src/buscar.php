<?php

    $mysqli=new mysqli("127.0.0.1","root","root","agenda");

    if ($mysqli->connect_error){
        echo "error al realizar la conexión";
    }else{

        if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['buscar'])){

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];

            $sql= "SELECT * FROM datos WHERE nombre='$nombre' AND apellido='$apellido'";
            $result = $mysqli -> query($sql);
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
                <h2>Buscar Persona</h2>
                <form action="buscar.php" method="post">

                    <table>

                        <?php
                            echo "<link rel='stylesheet' type='text/css' media='screen' href='main.css'>";

                            if(isset($result)){
                                if ($result){
                                    echo "<table id='tabla'><tr><th>Nombre</th><th>Apellido</th><th>Direccion</th><th>Telefono</th><th>Edad</th><th>Altura</th></tr>";
                                    echo "<tr>";
                                    $fila=$result->fetch_assoc();
                                    while ($fila){
                                        echo "<td>{$fila["nombre"]}</td>";
                                        echo "<td>{$fila["apellido"]}</td>";
                                        echo "<td>{$fila["direccion"]}</td>";
                                        echo "<td>{$fila["telefono"]}</td>";
                                        echo "<td>{$fila["edad"]}</td>";
                                        echo "<td>{$fila["altura"]}</td>";
                                        $fila=$result->fetch_assoc();
                                    }
                                    echo "</tr></table><br>";
                                    $result->close();
                                }
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
                <a href="conta.php">Contar personas</a>
                <a href="borrar.php">Borrar usuario</a>
                <a href="">Campo contraseña</a>
                <a href="franja.php">Franja de edad</a>
                <a href="https://google.com">Salir</a>
            </footer>
        </div>
    </div>
</body>
</html>
