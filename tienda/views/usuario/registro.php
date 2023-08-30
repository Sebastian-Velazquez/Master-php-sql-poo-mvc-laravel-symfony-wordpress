<h1>Registrarse</h1>

<?php
    if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete') : ?> <!-- es un if pora vistas -->
        <strong class="alert_green">Resgistro completado correctamente</strong>
    <?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed') : ?> <!-- este else: es un if comun pero especial para vistas -->
        <strong class="alert_red">Resgistro fallido! Introduce bien los datos</strong>
    <?php endif ?> <!-- este endif es un if comun pero especial para vistas -->

    <!-- Borrar session -->
    <?php Utils::deleteSession('register'); ?>

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