<?php
require_once 'models/productoModels.php';
class carritoController{
    public function index(){
        $carrito = $_SESSION['carrito'];
        //echo "Controlador Carrito, Accion index";
        //renderizar vista. En node js exite router porque uno las rutas son paralelas. en pho las rutas se definen GET
        require_once 'views/carrito/index.php';
    }

    public function add(){
        if(isset($_GET['id'])){
            $producto_id = $_GET['id'];
        }else{
            header( 'location'.base_url );
        }
        if(isset($_SESSION['carrito'])){
            $counter = 0; 
            foreach($_SESSION['carrito'] as $indice => $elemento){
                if($elemento['id_producto'] == $producto_id){
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $counter++;
                }
            }
        }

        if(!isset($counter) || $counter == 0){
            //conseguir producto
            $producto = new ProductoModels();
            $producto->setId($producto_id);
            $producto = $producto->getOne();

            if(is_object($producto)){
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio"=> $producto->precio,
                    "unidades"=>1,
                    "producto"=> $producto
                );
            }
        }
        
        header( 'location:'.base_url."carrito/index" );
    }

    public function remove (){
        
    }
    public function deleteAll (){
        unset($_SESSION['carrito']);
        header( 'location:'.base_url."carrito/index" );
    }
} 