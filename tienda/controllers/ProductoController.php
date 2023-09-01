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
} 