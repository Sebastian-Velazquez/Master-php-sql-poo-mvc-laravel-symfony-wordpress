<?php
require_once 'models/productoModels.php';
class pedidoController{
    public function index(){
        echo "Controlador Pedido, Accion index";
        //renderizar vista. En node js exite router porque uno las rutas son paralelas. en pho las rutas se definen GET
    }

    public function add(){
        if(isset($_GET['id'])){
            $producto_id = $_GET['id'];
        }else{
            header( 'location'.base_url );
        }
            if(isset($_SESSION['carrito'])){

        }else{
            //conseguir producto
            $producto = new ProductoModels();
            $producto->setId($producto_id);
            $producto = $producto->getOne();

            if(is_object($producto)){
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->getId()
                );
            }
        }
    }
} 