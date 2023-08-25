<?php
    if($_GET['numero1'] && $_GET['numero2']){
        echo "Suma: ".($_GET['numero1'] + $_GET['numero2']);
        echo "Suma: ".($_GET['numero1'] - $_GET['numero2']);
        echo "Suma: ".($_GET['numero1'] * $_GET['numero2']);
        echo "Suma: ".($_GET['numero1'] / $_GET['numero2']);
    }else{
        echo "No se mando unos de los datos o los dos";
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
    <form action="ejercicio-4.php" method="get">
        <input type="number" name="numero1" id="">
        <input type="number" name="numero2" id="">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>