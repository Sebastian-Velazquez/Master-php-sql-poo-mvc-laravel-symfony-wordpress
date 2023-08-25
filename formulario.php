<?php
if($_GET){

    $nombre = $_GET['name'];
    echo $nombre;
    $nombre = $_GET['lastName'];
    echo $nombre;
}
if($_POST){
    $nombre = $_POST['name'];
    echo $nombre;
    $nombre = $_POST['lastName'];
    echo $nombre;
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
    <h2>GET</h2>
    <form action="formulario.php" method="get">
        <label for="">Nombre</label>
        <input type="text" name="name" id="">
        <label for="">Apellido</label>
        <input type="text" name="lastName" id="">
        <input type="submit" value="Enviar">
    </form>
    <h2>POST</h2>
    <form action="formulario.php" method="post">
        <label for="">Nombre</label>
        <input type="text" name="name" id="">
        <label for="">Apellido</label>
        <input type="text" name="lastName" id="">
        <input type="submit" value="Enviar">
    </form>
    <form action="formulario.php" method="post"></form>
</body>
</html>