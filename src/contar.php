<?php

    $mysqli=new mysqli("127.0.0.1","root","","agenda");

    if ($mysqli->connect_error){
        echo "error al realizar la conexión";
    }else{

        if(isset($_POST['edad']) && isset($_POST['contar'])){

            $edad = $_POST['edad'];
            

            $sql= "SELECT COUNT(edad) FROM datos WHERE edad=$edad;";
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
                <h2>Contar Persona</h2>
                <form action="contar.php" method="post">

                    <table>

                        <?php
                            echo "<link rel='stylesheet' type='text/css' media='screen' href='main.css'>";

                            if(isset($result)){
                                if ($result){
                                    echo "<table id='tabla'><tr><th>Numeros de personas con edad a $edad</th></tr>";
                                    echo "<tr>";
                                    $fila=$result->fetch_assoc();
                                    while ($fila){
                                        echo "<td>{$fila["COUNT(edad)"]}</td>";
                                        $fila=$result->fetch_assoc();
                                    }
                                    echo "</tr></table><br>";
                                    $result->close();
                                }
                            }  
                        ?>

                        <tr>
                            <td>
                                <label for="">Edad</label>
                                <input type="text" name="edad">
                            </td>
                                

                        <tr>
                            <td>
                                <input type="submit" value="Contar" name="contar">
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
