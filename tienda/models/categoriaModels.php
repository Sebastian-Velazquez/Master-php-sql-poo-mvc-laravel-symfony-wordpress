<?php

    class CategoriaModels{
        private $id; // private, estás asegurando que solo los métodos dentro de la misma clase pueden acceder o modificar esa propiedad.
        private $nombre;//el uso de visibilidad puede ser: (como private, protected y public)

        //conexión DB
        private $db;
        public function __construct(){
            $this->db = Database::connect();// Aquí se establece la conexión a la base de datos
        }

        function getId(){
            return $this->id;
        }
        function getNombre(){
            return $this->nombre;
        }

        function setId($id){
            $this->nombre = $id;
        }
        function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function getAll(){
            $categorias = $this->db->query("SELECT * FROM categorias");
            return $categorias;
        }
}