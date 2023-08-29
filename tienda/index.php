<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tnda de camisetas</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div id="container">
        <header id="header">
            <div id="logo">
                <img src="assets/img/camiseta.png" alt="Camiseta Logo">
                <a href="index-pphp">
                    Tienda de camisetas
                </a>
            </div>
        </header>
        <div id="menu">
            <ul>
                <li>
                    <a href="#">Inicio</a>
                </li>
                <li>
                    <a href="#">Categria 1</a>
                </li>
                <li>
                    <a href="#">Categria 2</a>
                </li>
                <li>
                    <a href="#">Categria 3</a>
                </li>
                <li>
                    <a href="#">Categria 4</a>
                </li>
                <li>
                    <a href="#">Categria 5</a>
                </li>
            </ul>
        </div>
        <div id="content">
            <!-- barra lateral -->
            <aside id="lateral">
                <div id="login" class="block_aside">
                    <form action="#" method="post">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="">
                        <input type="submit" value="Enviar">
                    </form>
                    <a href="#">Mis pedidos</a>
                    <a href="#">Gestionar pedidos</a>
                    <a href="#">Gestionar categorias</a>
                </div>
            </aside>
        </div>
        <div id="central">
            <div class="product">
                <img src="assets/img/camiseta.png" alt="imgen produto">
                <h2>Camiseta Axul Ancha</h2>
                <p>30 euros</p>
                <a href="#">Comprar</a>
            </div>
        </div>
        <footer>
            <p>Desarrollado por Sebastian Velazquez</p>
        </footer>
    </div>
</body>

</html>