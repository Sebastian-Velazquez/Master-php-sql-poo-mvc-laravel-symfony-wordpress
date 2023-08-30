<h1>Registrarse</h1>

<?php
    if(isset($_SESSION['register']) && $_SESSION['register']) : ?> <!-- es un if pora vistas -->
        <strong>Resgistro completado correctamente</strong>
    <?php else: ?> <!-- este else: es un if comun pero especial para vistas -->
        <strong>Resgistro fallido!!</strong>
    <?php endif ?> <!-- este endif es un if comun pero especial para vistas -->

<form action="<?= base_url ?>usuario/save" method="post">
    <label for="">Nombre</label>
    <input type="text" name="nombre" id="">

    <label for="">Apellido</label>
    <input type="text" name="apellido" id="">

    <label for="">Email</label>
    <input type="email" name="email" id="">

    <label for="">Contraseña</label>
    <input type="password" name="password" id="">

    <input type="submit" name="formRegistro" value="Registrase">
</form>