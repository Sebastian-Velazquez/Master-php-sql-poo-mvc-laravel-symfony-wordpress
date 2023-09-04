<?php
require_once 'models/productoModels.php';

class productoController{
    public function index(){
        $producto = new ProductoModels; //llama al modelo
        $productos = $producto->getRamdom(6);
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
                
                //Guardar la imagen
                if(isset($_FILES['imagen'])){//validacion
                    $file = $_FILES['imagen'];//imagen que viene del formulario
                    $filename = date("YmdHis").$file['name'];//date("YmdHis"). para guardar la imgen y que no se repita el nombre
                    $mimetype = $file['type']; //tipo de dato so jpg, png, pdf etc
                    
                    if($mimetype == 'image/jpg' || $mimetype== 'image/jpeg' || $mimetype== 'image/png'||  $mimetype== 'image/gif'){
                        if(!is_dir('uploads/images')){
                            mkdir('uploads/images', 0777, true);
                        }
                        $producto->setImagen($filename);
                        $nombreImagen = $filename;
                        move_uploaded_file($file['tmp_name'], 'uploads/images/'.$nombreImagen);
                    }///Aca se debe hacer un else para redirigir porque la imagen no tiene el fotmato que se necesita o es un archivo diferente
                }
                if(isset($_GET['id'])){
                    //editar y guardar en db
                    $id = $_GET['id'];
                    $producto->setId($id);
                    
                    /****para borrar el achi anterior que estaba guardado una vez que se cambio la images, si es que paso */
                    $consulta =  mysqli_fetch_assoc($producto->consultarImagen());//mysqli_fetch_assoc depuera la consulta 
                    $rutaArchivo = "uploads/images/" . $consulta['imagen'] ;
                    /******* FIn */

                    $save = $producto->edit();
                    /* var_dump($save);
                    die(); */
                    //para buscar el nombre y ruta del archivo que quiero borrar.  se cambio la foto pero ahora se borra el anterior
                    //Tamben hay que cambiar los nombre para que no se repita. Sugiero ponerle feca y hora al final del nombre
                    if (file_exists($rutaArchivo) && $save==true ) {
                        unlink($rutaArchivo);
                    }
                }else{
                    //Guadar en DB
                    $save = $producto->save();
                }
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

    public function editar(){
        //var_dump($_GET);
        Utils::isAndmin();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit= true;

            $producto = new ProductoModels();
            $producto->setId($id);

            $pro = $producto->getOne();

            require_once 'views/producto/crear.php';
        }else{
            header('Location:'.base_url.'producto/gestion');
        }
    }
    public function eliminar(){
        //var_dump($_GET);
        Utils::isAndmin();

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            //Para tomar el dato que quiero borrar
            $producto = new ProductoModels();
            $producto->setId($id);
            //para buscar el nombre y ruta del archivo que quiero borrar
            $consulta =  mysqli_fetch_assoc($producto->consultarImagen());//mysqli_fetch_assoc depuera la consulta 
            $rutaArchivo = "uploads/images/" . $consulta['imagen'] ;
            
            //var_dump($rutaArchivo);
            //print_r($rutaArchivo); 
            //exit();
            $delete = $producto->delete();
            if($delete){
                //eliminar imagen
                if (file_exists($rutaArchivo)) {
                    unlink($rutaArchivo);
                }
                $_SESSION['delete'] = 'complete';
            }else{  
                $_SESSION['delete'] = 'failed';
                //$producto->consulta
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }

        header('Location:'.base_url.'producto/gestion');
    }
} 