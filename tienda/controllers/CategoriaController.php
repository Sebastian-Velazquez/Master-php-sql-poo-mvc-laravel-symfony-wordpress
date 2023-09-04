<?php
    require_once 'models/categoriaModels.php';
    require_once 'models/productoModels.php';
class categoriaController{
    public function index(){
        Utils::isAndmin();
        $categoria = new CategoriaModels();
        $categorias = $categoria->getAll();// lo guardo en categrias y lo mando al index.php
        //echo "Controlador Categoria, Accion index";
        require_once 'views/categoria/index.php';
    }

    public function ver(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            //consegir categoria
            $categoria = new CategoriaModels();
            $categoria->setId($id);
            $categoria = $categoria->getOne();
            //conseguir productos
            $productos = new ProductoModels();
            $productos->setCategoria_id($id);
            $productos = $productos->getAllCategory();
            
        }
        require_once 'views/categoria/ver.php';
    }
    
    public function crear(){
        Utils::isAndmin();
        require_once 'views/categoria/crear.php';
    }
    public function save(){
        Utils::isAndmin();
        
        if(isset($_POST) && isset($_POST['nombre'])){
            /* var_dump($_POST);
            die(); */
            //Guadar categria en db
            $categoria = new CategoriaModels();
            $categoria->setNombre($_POST['nombre']);
            $categoria->save();
        }

        header("Location:".base_url."categoria/index");
    }
} 