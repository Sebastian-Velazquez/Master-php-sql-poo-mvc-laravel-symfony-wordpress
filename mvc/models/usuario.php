<?php
    class User{
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

        public function allCustomers(){
            echo "All Cusomers";
        }
    }
?>
