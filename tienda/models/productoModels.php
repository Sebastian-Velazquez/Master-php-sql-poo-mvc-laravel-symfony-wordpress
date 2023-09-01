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
    function getDescipcion(){
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
        $this->nombre  = $nombre;
    }
    function setDescipcion($descripcion){
        $this->descripcion  = $descripcion;
    }
    function setPrecio($precio){
        $this->precio  = $precio;
    }
    function setStock($stock){
        $this->stock  = $stock;
    }
    function setOferta($oferta){
        $this->oferta  = $oferta;
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
}