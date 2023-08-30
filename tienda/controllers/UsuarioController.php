<?php
//Cargar modelo de usuarioRegistro
require_once'models/usuarioModels.php';
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
        if(isset($_POST)){
            //var_dump($_POST);//para ver los fatos como si fuera un console.log de node
            $usuario = new UsuarioModels();
            $usuario->setNombre($_POST['nombre']);
            $usuario->setApellido($_POST['apellido']);
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            //var_dump($usuario);
            $save = $usuario->save();
            if($save){
                //echo "Registro Completado";
                $_SESSION['register'] = "complete";
            }else{
                //echo "Registro Fallido";
                $_SESSION['register'] = "failed";
            }
        }else {
            //echo "ACCION DENEGADA";
            $_SESSION['register'] = "failed";
        }
        header("Location:".base_url.'usuario/registro');
    }
} 