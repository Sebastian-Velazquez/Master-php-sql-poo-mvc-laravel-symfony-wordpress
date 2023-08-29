<?php
    class Database{
        // Método estático para establecer una conexión a la base de datos
        public static function connect(){
            // Crear una instancia de la clase mysqli para conectarse a la base de datos
            $db = new mysqli('localhost', 'root', '', 'tienda_master');
            // Realizar una consulta para establecer la codificación de caracteres en utf8
            $db->query("SET NAMES 'utf8' ");
            // Devolver la instancia de la conexión a la base de datos
            return $db;
        }
    }