<?php
//una clase es como un modelo que describe cómo se verá y qué hará un objeto en tu programa.
class PedidoModels{
    private $id; // private, estás asegurando que solo los métodos dentro de la misma clase pueden acceder o modificar esa propiedad.
    private $usuario_id;
    private $provincia;//el uso de visibilidad puede ser: (como private, protected y public)
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;

    //conexión DB
    private $db;
    public function __construct(){
        $this->db = Database::connect();// Aquí se establece la conexión a la base de datos
    }

    function getId(){
        return $this->id;//es parecido a unsa this.id en node js
    }
    function getUsuario_id(){
        return $this->usuario_id;//es parecido a unsa this.id en node js
    }
    function getProvincia(){
        return $this->provincia;//es parecido a unsa this.id en node js
    }
    function getLocalidad(){
        return $this->localidad;//es parecido a unsa this.id en node js
    }
    function getDireccion(){
        return $this->direccion;//es parecido a unsa this.id en node js
    }
    function getCoste(){
        return $this->coste;//es parecido a unsa this.id en node js
    }
    function getEstado(){
        return $this->estado;//es parecido a unsa this.id en node js
    }
    function getFecha(){
        return $this->fecha;//es parecido a unsa this.id en node js
    }
    function getHora(){
        return $this->hora;//es parecido a unsa this.id en node js
    }

    function setId($id){
        $this->id  = $id;
    }
    function setUsuario_id($usuario_id){
        $this->usuario_id  = $usuario_id;
    }
    function setProvincia($provincia){
        $this->provincia  = $this->db->real_escape_string($provincia);
    }
    function setLocalidad($localidad){
        $this->localidad  = $this->db->real_escape_string($localidad);
    }
    function setDireccion($direccion){
        $this->direccion  = $this->db->real_escape_string($direccion);
    }
    function setCoste($coste){
        $this->coste  = $coste;
    }
    function setEstadoa($estado){
        $this->estado  = $estado;
    }
    function setFecha($fecha){
        $this->fecha  = $fecha;
    }
    function setHora($hora){
        $this->hora  = $hora;
    }

    public function getAll(){
        $productos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC");
        return $productos;
    }

    public function getOne(){
        $producto = $this->db->query("SELECT * FROM pedidos WHERE usuario_id={$this->getId()}");
        return $producto->fetch_object();
    }

    public function getOneByUser(){
        $sql = "SELECT p.id, p.coste FROM pedidos p "
        //. "INNER JOIN lineas_pedidos lp ON lp.pedido_id = p.id "
        . "WHERE p.usuario_id={$this->getUsuario_id()} ORDER BY id DESC LIMIT 1";
        $pedido = $this->db->query($sql);
            /* echo $sql;//es para ver el error en el sql que esta mal escrito
            echo $this->db->error;
            die(); */
        return $pedido->fetch_object();
    }

    public function getProductosByPedido($id){
       // $sql= "SELECT * FROM productos WHERE id IN "
            //. "(SELECT producto_id FROM lineas_pedidos WHERE pedido_id={$id} )";
        $sql= "SELECT pr. * , lp.unidades FROM productos pr "
                . "INNER JOIN lienas_pedidos lp ON pr.id = lp.producto_id "
                . "WHERE lp.pedido_id = {$id}";
        $productos = $this->db->query($sql);
        return $productos;
    }

    public function save(){//carga de los datos que vienen por el form
        $sql = "INSERT INTO pedidos 
                VALUES(
                    NULL,    
                    {$this->getUsuario_id()},
                    '{$this->getProvincia()}',
                    '{$this->getLocalidad()}',
                    '{$this->getDireccion()}',
                    {$this->getCoste()},
                    'confirm',
                    CURDATE(),
                    CURTIME()
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

    public function saveLinea(){

            $sql = "SELECT LAST_INSERT_ID() as 'pedido';";

            $query = $this->db->query($sql);
            $pedido_id = $query->fetch_object()->pedido;
    
            foreach($_SESSION['carrito'] as $indice => $elemento){
                $producto = $elemento['producto'];
    
                $insert = "INSERT INTO lineas_pedidos VALUES(
                            NULL,
                            {$pedido_id},
                            {$producto->id},
                            {$elemento['unidades']}
                )";
                $save = $this->db->query($insert);
            }
            /* var_dump($insert);
            echo $this->db->error;
            die(); */

            $result =false;
            if($save){
                $result = true;
            }
            return $result;
    }


}