<?php

class pedidoController{
    public function index(){
        //echo "Controlador Pedido, Accion index";
        //renderizar vista. En node js exite router porque uno las rutas son paralelas. en pho las rutas se definen GET
        require_once 'views/producto/destacados.php';
    }
} 