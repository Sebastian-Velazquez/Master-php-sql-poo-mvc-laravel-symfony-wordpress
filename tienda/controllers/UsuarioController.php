<?php
// Define la clase del controlador
class usuarioController{
    // Método para la acción 'index'
    public function index(){
        // Imprime un mensaje indicando la acción que se está ejecutando
        echo "Controlador Usuario, Accion index";
    }

    //registro de uusuario
    public function registro(){
        //echo "estamos en Registro";
        require_once 'views/usuario/registro.php';
    }
    //registro de uusuario
    public function save(){
        if(isset($_POST['formRegistro'])){
            var_dump($_POST);//para ver los fatos como si fuera un console.log de node
        }else {
            echo "ACCION DENEGADA";
        }
    }
} 