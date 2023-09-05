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

                if($save){
                    $_SESSION['pedido'] = "complete";
                }else{
                    $_SESSION['pedido'] = "failed";
                }
            }else{
                $_SESSION['pedido'] = "failed";
            }
        }else{
            //redigir al index
            header("location:".base_url);
        }
    }
} 