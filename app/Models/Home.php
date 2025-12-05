<?php

namespace App\Models;
use App\core\Database;

class Home extends Database {
    public function getUsers(){
        $this->query("SELECT * FROM users");
        $this->execute();

        return $this->result();
    }
}