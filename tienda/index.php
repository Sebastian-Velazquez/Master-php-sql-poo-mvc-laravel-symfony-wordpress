<?php
    // Carga las clases automáticamente
    require_once 'autoload.php';

    // Comprueba si se proporciona el parámetro 'controller' en la URL
    if(isset($_GET['controller'])){
        // Crea el nombre del controlador añadiendo 'Controller' al valor del parámetro 'controller'
        $nombre_controlador = $_GET['controller'].'Controller';
    }else {
        echo 'La página que buscas no existe';
        // Finaliza el script, esto se ejecuta independientemente de la condición anterior
        exit();
    }

    // Comprueba si la clase del controlador existe
    if(class_exists($nombre_controlador)){
        // Crea una instancia del controlador
        $controlador = new $nombre_controlador();

        // Comprueba si se proporciona el parámetro 'action' en la URL
        // y si el método correspondiente existe en el controlador
        if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
            // Obtiene el nombre de la acción y lo almacena en la variable 'action'
            $action = $_GET['action'];
            // Llama al método correspondiente en el controlador
            $controlador->$action();
        }else {
            // Muestra un mensaje de error si no se proporciona la acción correcta
            echo 'La página que buscas no existe';
        }
    }else{
        // Muestra un mensaje de error si la clase del controlador no existe
        echo 'La página que buscas no existe';
        //exit();
    }
?>