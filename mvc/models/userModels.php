<?php
    class UserModels{ //reresenta informacion de usuario
        public $name;
        public $lastName;
        public $email;
        public $password;
    

        function getNombre(){
            return $this->name;
        }
        function getLastName(){
            return $this->lastName;
        }
        function getEmail(){
            return $this->email;
        }
        function getpassword(){
            return $this->password;
        }

        public function allCustomers(){ //metodo para consultar en la DB
            return 'All Cusomers' ;
        }
    }
?>
