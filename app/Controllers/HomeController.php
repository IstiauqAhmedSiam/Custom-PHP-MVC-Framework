<?php

namespace App\Controllers;
use App\core\Controller;

class HomeController extends Controller {
    private $Model;

    public function __construct(){
        $this->Model = $this->model("Home");
    }

    public function index(){
        $users = $this->Model->getUsers();

        return $this->view("home", [
            "users" => $users
        ]);
    }
}