<?php
    class Register extends Controller{
        public $UserModel;
        
        public $layout = "auth_layout";
        public $page = "register";
        public $title = "Sign up";

        public function __construct(){
            $this -> UserModel = $this -> model("User");
        }

        function Index(){
            $this -> response($this -> layout, $this->page, $this->statusOK, "", $this -> title);
        }

        function HandelRegister(){
            if (isset($_POST["btnRegister"])){
                $name = addslashes($_POST["full_name"]);
                $phone = addslashes($_POST["phone_number"]);
                $email = addslashes($_POST["email"]);
                $password = addslashes($_POST["password"]);
                $retypePassword = addslashes($_POST["retype_password"]);
                if ($password != $retypePassword) {
                    $this -> response($this -> layout, $this -> page, $this -> statusFail, "password and retype password do not matching", $this -> title);
                }
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                $result = $this -> UserModel -> CreateUser();

                if ($result){
                    $this -> response($this -> layout, $this->page, $this->statusOK, "User was registered successfully", $this -> title);
                } else {
                    $this -> response($this->layout, $this->page, $this->statusFail, "Fail to register", $this->title);
                }
            }
        }
    }
?>