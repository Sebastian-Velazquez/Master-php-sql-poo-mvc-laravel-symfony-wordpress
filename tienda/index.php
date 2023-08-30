<?php
    // Carga las clases automáticamente
    require_once 'autoload.php';
    require_once 'config/parameters.php';//parametro base de localhost
    require_once 'views/layour-partial/header.php';
    require_once 'views/layour-partial/sidebar.php';

    //Funcion de error de url
    function show_error(){
        $error = new errorController;
        $error->index();
    }

    // Comprueba si se proporciona el parámetro 'controller' en la URL
    if(isset($_GET['controller'])){
        // Crea el nombre del controlador añadiendo 'Controller' al valor del parámetro 'controller'
        $nombre_controlador = $_GET['controller'].'Controller';
    }elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $nombre_controlador = controller_default;
    }else{
        //echo 'La página que buscas no existe';
        show_error();

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
        }elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
            $action_default = action_defaul;
            $controlador->$action_default();
        }
        else{
            // Muestra un mensaje de error si no se proporciona la acción correcta
            //echo 'La página que buscas no existe';
            show_error();
        }
    }else{
        // Muestra un mensaje de error si la clase del controlador no existe
        show_error();
        //echo 'La página que buscas no existe';
    }


require_once 'views/layour-partial/footer.php';
