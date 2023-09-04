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
            $this->id = $id;
        }
        function setNombre($nombre){
            $this->nombre = $this->db->real_escape_string($nombre);
        }

        public function getAll(){
            $categorias = $this->db->query("SELECT * FROM categorias ORDER BY id ASC");
            return $categorias;
        }

        public function getOne(){
            $categoria = $this->db->query("SELECT * FROM categorias WHERE id = {$this->getId()}");
            return $categoria->fetch_object(); //fetch_object: para que saque el unico onjeto que puede sacar
        }

        public function save(){//carga de los datos que vienen por el form
            $sql = "INSERT INTO categorias VALUES(NULL,'{$this->getNombre()}')";
            $save = $this->db->query($sql);
            $result =false;
            if($save){
                $result = true;
            }
            return $result;
        }
}