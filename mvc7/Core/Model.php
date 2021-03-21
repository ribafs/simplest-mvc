<?php

namespace Core;

class Model
{
    public $pdo;

    public function __construct()
    {
        global $host, $user, $pass, $db;
        try {
            // Para que usemos as variáveis como objeto ($client->id) e mostre mais detalhes nas mensagens de erro
            // A barra antes do PDO (\PDO) é para indicar que estamos usando ele em seu próprio namespace e não é uma classe do nosso namespace
            $options = array(\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ, \PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING);
            $this->pdo = new \PDO("mysql:host=localhost;dbname=testes", 'root', '', $options );

            return $this->pdo;

        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
