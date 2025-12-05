<?php

namespace App\core;
use \PDO;
use \PDOException;

class Database {
    protected $conn;
    protected $statement;

    public function __construct(){
        $dbName = "mysql:host=localhost;dbname=" . $_ENV["DATABASE_NAME"];

        try {
            $this->conn = new PDO($dbName, $_ENV["DATABASE_USERNAME"], $_ENV["DATABASE_PASSWORD"]);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function query($sql){
        $this->statement = $this->conn->prepare($sql);
    }

    public function bind($param, $value, $type=NULL){
        switch(true){
            case is_int($type):
                $type = PDO::PARAM_INT;
            break;

            case is_bool($type):
                $type = PDO::PARAM_BOOL;
            break;

            case is_null($type):
                $type = PDO::PARAM_NULL;
            break;

            default:
                $type = PDO::PARAM_STR;
        }

        $this->statement->bindValue($param, $value, $type);
    }

    public function execute(){
        return $this->statement->execute();
    }

    public function rowCount(){
        return $this->statement->rowCount();
    }

    public function result(){
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }
}