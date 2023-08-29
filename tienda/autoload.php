<?php
// Definir la función de autoloading personalizada
    function controllers_autoload($className){
        // Incluir el archivo de la clase desde la carpeta "controllers"
        include 'controllers/'. $className. '.php';
    }// Registrar la función de autoloading personalizada con spl_autoload_register
    spl_autoload_register('controllers_autoload');
    ?>