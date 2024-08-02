<?php
    class Home extends Controller{
        function SayHi(){
            $teo = $this -> model("User");
            echo $teo -> GetAllUser();
        }

        function Show($a, $b){
            $teo = $this -> model("User");
            $this -> view("login", [
                "Page" => "news",
                "user" => $teo -> GetAllUser()
            ]);
        }
    }
?>