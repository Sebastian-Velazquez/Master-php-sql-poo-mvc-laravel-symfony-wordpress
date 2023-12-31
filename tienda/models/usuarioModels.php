<?php
//una clase es como un modelo que describe cómo se verá y qué hará un objeto en tu programa.
class UsuarioModels{
    private $id; // private, estás asegurando que solo los métodos dentro de la misma clase pueden acceder o modificar esa propiedad.
    private $nombre;//el uso de visibilidad puede ser: (como private, protected y public)
    private $apellido;
    private $email;
    private $password;
    private $rol;
    private $imagen;

    //conexión DB
    private $db;
    public function __construct(){
        $this->db = Database::connect();// Aquí se establece la conexión a la base de datos
    }

     // Métodos para obtener valores de los atributos
    // (Getters)
    function getId(){
        return $this->id;//es parecido a unsa this.id en node js
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
        return password_hash( $this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost'=>4] ) ;
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
        $this->nombre  = $this->db->real_escape_string($nombre);//real_escape_string: se utiliza para prevenir ateques usando el ` para agregar o cambiar la sentencia de sql
    }
    function setApellido($apellido){
        $this->apellido  = $this->db->real_escape_string($apellido);
    }
    function setEmail($email){
        $this->email  = $this->db->real_escape_string($email);
    }
    function setPassword($password){
        $this->password  = $password ;
    }
    function setRol($rol){
        $this->rol  = $rol;
    }
    function setImagen($imagen){
        $this->imagen  = $imagen;
    }

    public function save(){//carga de los datos que vienen por el form
        $sql = "INSERT INTO usuarios 
                VALUES(
                    NULL,    
                    '{$this->getNombre()}',
                    '{$this->getApellido()}',
                    '{$this->getEmail()}',
                    '{$this->getPassword()}',
                    'user',
                    'NULL'
                    )";
        $save = $this->db->query($sql);
        $result =false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function login(){
        $result = false;
        $email = $this->email;
        $password = $this->password;
        //comprobar si existe el usuario
        $sql = "SELECT * FROM usuarios WHERE email = '$email' ";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1){
            $usuario= $login->fetch_object();

            //verificar la contraseña
            $verify = password_verify($password, $usuario->password);

            //var_dump(($verify));
            //die();

            if($verify){
                $result = $usuario;
            }
        }
        return $result;
    }
}