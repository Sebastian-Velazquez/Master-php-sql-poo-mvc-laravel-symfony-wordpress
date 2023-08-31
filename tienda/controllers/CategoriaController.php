<?php
require_once 'models/categoriaModels.php';
class categoriaController{
    public function index(){
        $categoria = new CategoriaModels();
        $categorias = $categoria->getAll();
        //echo "Controlador Categoria, Accion index";
        require_once 'views/categoria/index.php';
    }
} 