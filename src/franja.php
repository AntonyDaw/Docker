<?php

    $mysqli=new mysqli("mysql","root","root","agenda");

    if ($mysqli->connect_error){
        echo "error al realizar la conexión";
    }else{

        if(isset($_POST['edad1']) && isset($_POST['edad2']) && isset($_POST['buscar'])){

            if( $_POST['edad1'] <=  $_POST['edad2']){
                $menor = $_POST['edad1'];
                $mayor = $_POST['edad2'];

            }else{
                $menor = $_POST['edad2'];
                $mayor = $_POST['edad1'];
            }

            $sql= "SELECT * FROM datos WHERE edad BETWEEN $menor AND $mayor";
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
                <h2>Buscar Persona entre edades</h2>
                <form action="franja.php" method="post">

                    <table>

                        <?php
                            echo "<link rel='stylesheet' type='text/css' media='screen' href='main.css'>";

                            if(isset($result)){
                                
                                if ($result){
                                    echo "<table id='tabla'><tr><th>Nombre</th><th>Apellido</th><th>Direccion</th><th>Telefono</th><th>Edad</th><th>Altura</th></tr>";
                                    
                                    $fila=$result->fetch_assoc();
                                 
                                    while ($fila){
                                        echo "<tr>";
                                        echo "<td>{$fila["nombre"]}</td>";
                                        echo "<td>{$fila["apellido"]}</td>";
                                        echo "<td>{$fila["direccion"]}</td>";
                                        echo "<td>{$fila["telefono"]}</td>";
                                        echo "<td>{$fila["edad"]}</td>";
                                        echo "<td>{$fila["altura"]}</td>";
                                        echo "</tr>";
                                        $fila=$result->fetch_assoc();
                                    }
                                    echo "</table><br>";
                                    $result->close();
                                }
                            }  
                        ?>

                        <tr>
                            <td>
                                <label for="">Edad 1</label>
                                <input type="number" name="edad1">
                            </td>
                                
                            <td>
                                <label for="">Edad 2</label>
                                <input type="number" name="edad2">
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
