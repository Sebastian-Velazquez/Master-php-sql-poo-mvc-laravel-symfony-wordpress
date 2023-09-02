<?php
//una clase es como un modelo que describe cómo se verá y qué hará un objeto en tu programa.
class ProductoModels{
    private $id; // private, estás asegurando que solo los métodos dentro de la misma clase pueden acceder o modificar esa propiedad.
    private $categoria_id;
    private $nombre;//el uso de visibilidad puede ser: (como private, protected y public)
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;

    //conexión DB
    private $db;
    public function __construct(){
        $this->db = Database::connect();// Aquí se establece la conexión a la base de datos
    }

    function getId(){
        return $this->id;//es parecido a unsa this.id en node js
    }
    function getCategoria_id(){
        return $this->categoria_id;//es parecido a unsa this.id en node js
    }
    function getNombre(){
        return $this->nombre;//es parecido a unsa this.id en node js
    }
    function getDescripcion(){
        return $this->descripcion;//es parecido a unsa this.id en node js
    }
    function getPrecio(){
        return $this->precio;//es parecido a unsa this.id en node js
    }
    function getStock(){
        return $this->stock;//es parecido a unsa this.id en node js
    }
    function getOferta(){
        return $this->oferta;//es parecido a unsa this.id en node js
    }
    function getFecha(){
        return $this->fecha;//es parecido a unsa this.id en node js
    }
    function getImagen(){
        return $this->imagen;//es parecido a unsa this.id en node js
    }

    function setId($id){
        $this->id  = $id;
    }
    function setCategoria_id($categoria_id){
        $this->categoria_id  = $categoria_id;
    }
    function setNombre($nombre){
        $this->nombre  = $this->db->real_escape_string($nombre);
    }
    function setDescipcion($descripcion){
        $this->descripcion  = $this->db->real_escape_string($descripcion);
    }
    function setPrecio($precio){
        $this->precio  = $this->db->real_escape_string($precio);
    }
    function setStock($stock){
        $this->stock  = $this->db->real_escape_string($stock);
    }
    function setOferta($oferta){
        $this->oferta  = $this->db->real_escape_string($oferta);
    }
    function setFecha($fecha){
        $this->fecha  = $fecha;
    }
    function setImagen($imagen){
        $this->imagen  = $imagen;
    }

    public function getAll(){
        $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC");
        return $productos;
    }
        public function getOne(){
        $producto = $this->db->query("SELECT * FROM productos WHERE id={$this->getId()}");
        return $producto->fetch_object();
    }

    public function save(){//carga de los datos que vienen por el form
        $sql = "INSERT INTO productos 
                VALUES(
                    NULL,    
                    {$this->getCategoria_id()},
                    '{$this->getNombre()}',
                    '{$this->getDescripcion()}',
                    {$this->getprecio()},
                    {$this->getStock()}, 
                    NULL,
                    CURDATE(),
                    '{$this->getImagen()}'
                    )"; // {$this->getStock()},  no va en comillas porque es un numero
        $save = $this->db->query($sql);
        
        /* echo $sql;
        echo "<br/>";
        echo $this->db->error;
        die(); */

        $result =false;
        if($save){
            $result = true;
        }
        return $result;
    }
    public function edit(){//carga de los datos que vienen por el form
        $sql = "UPDATE productos SET
                nombre='{$this->getNombre()}',
                desctipcion='{$this->getDescripcion()}',
                precio= {$this->getprecio()},
                stock= {$this->getStock()}" ;
        if ($this->getImagen() != null){
            $sql .= ", imagen'{$this->getImagen()}'"; //.= concatena el codigo, agrega string a lo ultimo si odificar lo que tenia
        }
        $sql .= " WHERE id={$this->getId()}";

        $save = $this->db->query($sql);
        
        /* echo $sql;
        echo "<br/>";
        echo $this->db->error;
        die(); */

        $result =false;
        if($save){
            $result = true;
        }
        return $result;
    }
    public function consultarImagen(){
        $sql = "SELECT imagen FROM productos WHERE id={$this->id}";
        $consultaImagen = $this->db->query($sql);
       /*  $result =false;
        if($consultaImagen){
            $result = true;
        } */
        return $consultaImagen;
    }

    public function delete(){
        
        $sql = "DELETE FROM productos WHERE id={$this->id}";
        $delete = $this->db->query($sql);

        $result =false;
        if($delete){
            $result = true;
        }
        return $result;
    }
}