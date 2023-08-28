<?php
    class UserController{  //coontrolador de Usuario

        public function userList(){
            require_once 'models/userModels.php'; //requiero el modelo. Hace referrenca a la db

            $user = new  UserModels();//llamo a la clase modelo
            $userList = $user->allCustomers();//llamo a la fucion del modelo

            require_once 'views/users/userAll.php'; //llamo a la vista

        }
        public function createUser(){
            require_once 'views/users/userCreste.php';
        }
    }
?>