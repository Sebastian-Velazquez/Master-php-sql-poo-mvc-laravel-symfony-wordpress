<?php
require_once 'models/pedidoModels.php';
class pedidoController{
    public function hacer(){
        //echo "Controlador Pedido, Accion index";
        //renderizar vista. En node js exite router porque uno las rutas son paralelas. en pho las rutas se definen GET
        require_once 'views/pedido/hecer.php';
    }

    public function add(){
        //var_dump($_POST);
        if(isset($_SESSION['identity'])){
            $usuario_id = $_SESSION['identity']->id;
            //var_dump($usuario_id);
            //validaciones
            $provincia = isset($_POST['provincia'])? $_POST['provincia']  : false;
            $localidad = isset($_POST['localidad'])? $_POST['localidad']  : false;
            $direccion = isset($_POST['direccion'])? $_POST['direccion']  : false;

            $stats = Utils::statsCarrito();
            $coste = $stats['total'];

            if( $provincia && $localidad && $direccion){
                //guardar datos en db
                $pedido = new PedidoModels();
                $pedido->setUsuario_id($usuario_id);
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($coste);
                //var_dump($pedido);
                $save = $pedido->save();

                //Guardar linea pedido
                $saveLinea = $pedido->saveLinea();
                //Fin de guardar linea
                
                if($save && $saveLinea ){
                    $_SESSION['pedido'] = "complete";
                }else{
                    $_SESSION['pedido'] = "failed";
                }
            }else{
                $_SESSION['pedido'] = "failed";
            }
            header("Location:".base_url.'pedido/confirmado');
        }else{
            //redigir al index
            header("location:".base_url);
        }
    }

    public function confirmado(){
        if(isset($_SESSION['identity'])){
            $identity = $_SESSION['identity'];
            $pedido = new PedidoModels();
            $pedido->setUsuario_id($identity->id);
            $pedido = $pedido->getOneByUser();

            require_once 'views/pedido/confirmado.php';
        }
    }
} 