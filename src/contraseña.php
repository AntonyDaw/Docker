<?php

    $mysqli=new mysqli("mysql","root","root","agenda");

    

    if ($mysqli->connect_error){
        echo "error al realizar la conexión";
    }else{

        if(isset($_POST['añadir']) ){
            $sql= "ALTER TABLE datos ADD COLUMN contraseña varchar(255)";
            $result = $mysqli -> query($sql);
        }

        if(isset($_POST['actualizar']) ){

            $sql= "SELECT * FROM datos";
            $result = $mysqli -> query($sql);

            $fila=$result->fetch_assoc();
                while ($fila){
                    
                    $string = "";

                    $nombre = $fila["nombre"];
                    $string .= substr($nombre, 0, 2);

                    $apellido = $fila["apellido"];
                    $string .= substr($apellido, 0 , 2);

                    $string .= $fila["edad"];

                    $sql= "UPDATE datos SET contraseña='$string' WHERE nombre='$nombre'";
                    $mysqli -> query($sql);

                    $fila=$result->fetch_assoc();
                }
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
                <h2>Añadir contraseña</h2>

                

                <?php
                    echo "<link rel='stylesheet' type='text/css' media='screen' href='main.css'>";

                        echo "
                        <form action='contraseña.php' method='POST'>
                            <input type='submit' value='Añadir' name='añadir'>
                            <input type='submit' value='Actualizar' name='actualizar'>
                        </form>
                        ";
                    
                ?>

            
                        
                      

                   
            
                
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
