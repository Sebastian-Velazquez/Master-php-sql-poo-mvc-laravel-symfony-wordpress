<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de camisetas</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div id="container">
        <div id="header">
            <div id="logo">
                <img src="assets/img/camiseta.png" alt="Camiseta Logo">
                <a href="index-pphp">
                    Tienda de camisetas
                </a>
            </div>
        </div>
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
                    <h3>Entrar a la Web</h3>
                    <form action="#" method="post">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="">
                        <input type="submit" value="Enviar">
                    </form>
                    <ul>
                        <li><a href="#">Mis pedidos</a></li>
                        <li><a href="#">Gestionar pedidos</a></li>
                        <li><a href="#">Gestionar categorias</a></li>
                    </ul>
                </div>
            </aside>
        
            <div id="central">
                <h1>Productos Destacados</h1>

                <div class="product">
                    <img src="assets/img/camiseta.png" >
                    <h2>Camiseta Azul Ancha</h2>
                    <p>30 euros</p>
                    <a href="#" class="button">Comprar</a>
                </div>

                <div class="product">
                    <img src="assets/img/camiseta.png" >
                    <h2>Camiseta Azul Ancha</h2>
                    <p>30 euros</p>
                    <a href="#" class="button">Comprar</a>
                </div>

                <div class="product">
                    <img src="assets/img/camiseta.png" >
                    <h2>Camiseta Azul Ancha</h2>
                    <p>30 euros</p>
                    <a href="#" class="button">Comprar</a>
                </div>
            </div>
        </div>
            <footer id="footer">
                <p>Desarrollado por Sebastian Velazquez</p>
            </footer>
</body>

</html>