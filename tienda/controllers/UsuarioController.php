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
    //registro de usuario
    public function save(){
        if(isset($_POST)){
            //var_dump($_POST);
            //exit();
            //Validaciones.. PONER MAS VALIDACIONES EN EL PROYECTO ANTERIOR:: VER!!!!!!!!!!!!!!!!!!!!!!!! Adatar!
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false; //if ternario
            $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;
            //var_dump($_POST);//para ver los fatos como si fuera un console.log de node

            if($nombre && $apellido && $email && $password){
                $usuario = new UsuarioModels();
                $usuario->setNombre($nombre);
                $usuario->setApellido($apellido);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
                //var_dump($usuario);
                $save = $usuario->save();
                if($save){
                    //echo "Registro Completado";
                    $_SESSION['register'] = "complete";
                }else{
                    //echo "Registro Fallido";
                    $_SESSION['register'] = "failed";
                }
            }else{
                $_SESSION['register'] = "failed";
            }
        }else {
            //echo "ACCION DENEGADA";
            $_SESSION['register'] = "failed";
        }
        header("Location:".base_url.'usuario/registro');
    }
} 