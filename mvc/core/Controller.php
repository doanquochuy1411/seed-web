<?php
    class Controller{

     public $statusOK = "success";
     public $statusFail = "fail";
     
       public function model($model){
            require_once "./mvc/models/".$model.".php";
            return new $model;
       }
       
       public function view($view, $data=[]){
            require_once "./mvc/views/".$view.".php";
       }
       
       public function response($layout, $page, $status, $message, $title) {
            $this -> view($layout, [
                 "Page" => $page,
                 "status" => $status,
                 "message" => $message,
                 "title" => $title
            ]);
       }
    }

?>