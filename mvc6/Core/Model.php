<?php

namespace Core;

class Model
{
    public $pdo;

    public function __construct()
    {
        global $host, $user, $pass, $db;
        try {
            $this->pdo = new \PDO("mysql:host=localhost;dbname=testes", 'root', ''  );

            return $this->pdo;

        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
