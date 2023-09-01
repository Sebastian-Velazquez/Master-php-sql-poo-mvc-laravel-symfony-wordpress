<?php
require_once 'models/productoModels.php';

class productoController{
    public function index(){
        //echo "Controlador Producto, Accion index";
        require_once 'views/producto/destacados.php';
    }

    public function gestion(){
        Utils::isAndmin();

        $producto = new ProductoModels();
        $productos = $producto->getAll();

        require_once 'views/productos/gestion.php';
    }

    public function crear(){

        Utils::isAndmin();//este esta la carpeta helpers. Es una funcion que verifica si sos usuario admin
        require_once 'views/producto/crear.php';
    }

    public function save(){
        Utils::isAndmin();
        if(isset($_POST)){//validacion
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            //$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
            
            if($nombre && $descripcion && $precio && $stock && $categoria){
                /* var_dump("paso por aca");
                die(); */
                $producto = new ProductoModels();
                $producto->setNombre($nombre);
                $producto->setDescipcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoria_id($categoria);
                
                $save = $producto->save();
                if($save){
                    $_SESSION['producto'] = "complete";
                }else{
                    $_SESSION['producto'] = "failed";
                }
            }else{
                $_SESSION['producto'] = "failed";
            }
        }else{
            $_SESSION['producto'] = "failed";
        }
        header('Location:'.base_url.'producto/gestion');
    }
} 