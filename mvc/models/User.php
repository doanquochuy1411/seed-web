<?php
    class User extends DB{
        public function GetAllUser(){
            $sql = "SELECT * FROM user Where deleted_at is null";
            return $this -> executeQuery($sql);
        }
        
        public function GetUserByID($id){
            $sql = "SELECT * FROM user where deleted_at is null and id = ?";
            return $this -> executeQuery($sql, [$id]);
        }
        
        public function GetUserByEmail($email){
            $sql = "SELECT * FROM user where deleted_at is null and email = ?";
            return $this -> executeQuery($sql, [$email]);
        }

        public function CreateUser($name, $phone, $email, $password){
            $sql = "INSERT INTO user(full_name, phone_number, email, password) values (?,?,?,?)";
            return $this -> executeQuery($sql, [$name, $phone, $email, $password]);
        }

    }
?>