<?php

namespace App\Controllers;
use App\core\Controller;

class ErrorController extends Controller {
    public function index(){
        return $this->view("404");
    }
}