<?php

class Utils{

    public static function deleteSession($name){
        if(isset($_SESSION[$name])){
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        return $name;
    }

    public static function isAndmin(){
        if(!isset($_SESSION['admin'])){
            header("location:".base_url);
        }else{
            return true;
        }
    }
}