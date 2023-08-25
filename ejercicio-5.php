<?php
    if(isset($_GET['numero1']) && isset($_GET['numero2'])){
        $numero1 = $_GET['numero1']; 
        $numero2 = $_GET['numero2'];

        if($numero1 < $numero2){
            for ($i= $numero1+1; $i < $numero2; $i++) { 
                echo $i."<br/>";
            }
        }
        if($numero1 > $numero2){
            for ($i= $numero2+1; $i < $numero1; $i++) { 
                echo $i."<br/>";
            }
        }

    }
        if($numero1 == $numero2){
        echo "Son iguales";
        }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ejercicio-5.php" method="get">
        <input type="number" name="numero1" id="">
        <input type="number" name="numero2" id="">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>