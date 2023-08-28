
<?php
    require_once 'controllers/userController.php'; //requiero controlador
    //mostrar lista de clientes

    if (isset($_GET['controller']) && class_exists($_GET['controller'])){
        $nameController = $_GET['controller'];
        $controlador = new UserController();

        if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
            $action = $_GET['action'];
            $controlador->$action();
        }else{
            echo "La pagina que buscas no existe";
        }
    }else{
        echo "La pagina que buscas no existe";

    }
    
    //$controlador->userList();
    //llamar a crear cliente
    //s$controlador->createUser();

    //de esta forma es como realizamos los router de forma dinamica
    
    
    ?>

<h1>Bienvenidos a mi web MVC</h1>