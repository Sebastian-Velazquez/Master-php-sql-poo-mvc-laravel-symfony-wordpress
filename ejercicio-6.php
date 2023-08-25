<?php
    echo  "<table border='1'><tr>";//fila 1

    echo "<tr>";
        for ($i=1; $i <= 10;  $i++) { 
            echo "<td> Tabla del ".$i."</td>";  
        }
    echo"</tr>";//fin 1
    echo"<tr>";//inicio 2
        for ($i=1; $i <= 10; $i++) { 
            echo "<td>";
                echo "Hola";
            echo "</td>";
        }
    echo"</tr>";//fin 2
    echo "</table>";
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ejercicio-6.php" method="get">
        <input type="number" name="numero1" id="">
        <input type="number" name="numero2" id="">
        <input type="submit" value="Enviar">
    </form>
</body>
</html> -->
