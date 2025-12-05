<?php

namespace App\core;

class Controller {
    protected $modelNamespace = 'App\\Models\\';

    public function model($model){
        $modelClass = $this->modelNamespace . $model;
        
        if (class_exists($modelClass)) {
            return new $modelClass();
        }
    }

    public function view($view, $DATA=[]){
        $filename = "../app/Views/" . $view . ".view.php";

        if(file_exists($filename)){
            require $filename;
        }else{
            require "../app/views/404.view.php";
        }
    }
}