<?php

namespace App\Controllers;
use App\core\Controller;

class ErrorController extends Controller {
    public function index(){
        $this->view("404");
    }
}