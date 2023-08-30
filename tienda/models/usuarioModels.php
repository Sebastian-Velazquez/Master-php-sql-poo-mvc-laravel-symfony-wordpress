<?php

class UsuarioModels{
    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $rol;
    private $imagen;

    //conexión DB
    private $db = Database::connect();
    public function __construct(){
        $this->db==Database::connect();
    }

    function getId(){
        return $this->id;
    }
    function getNombre(){
        return $this->nombre;
    }
    function getApellido(){
        return $this->apellido;
    }
    function getEmail(){
        return $this->email;
    }
    function getPassword(){
        return $this->password;
    }
    function getRol(){
        return $this->rol;
    }
    function getImagen(){
        return $this->imagen;
    }

    function setId($id){
        $this->id  = $id;
    }
    function setNombre($nombre){
        $this->nombre  = $nombre;
    }
    function setApellido($apellido){
        $this->apellido  = $apellido;
    }
    function setEmail($email){
        $this->email  = $email;
    }
    function setPassword($password){
        $this->password  = $password;
    }
    function setRol($rol){
        $this->rol  = $rol;
    }
    function setImagen($imagen){
        $this->imagen  = $imagen;
    }

    public function save(){
        $sql = "INSERT INTO usuarios 
                VALUES(
                    NULL,    
                    '{$this->getNombre()}',
                    '{$this->getApellido()}',
                    '{$this->getApellido()}',
                    '{$this->getEmail()}',
                    '{$this->getPassword()}',
                    'user',
                    '{$this->getImagen()}',
                    )";
        $save = $this->db->query($sql);
        $resultado =false;
        if($save){
            $resultado = true;
        }
        return $resultado;
    }
}