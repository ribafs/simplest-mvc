<?php

require_once 'config.php';

class Model
{
    public $pdo;

    public function __construct()
    {
        global $host, $user, $pass, $db;
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

            return $this->pdo;

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
