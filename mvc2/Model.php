<?php

require_once 'connection.php';

class Model
{

    public function index(){
        global $pdo;
        $stmte = $pdo->query("SELECT * FROM clients order by id");
        $executa = $stmte->execute();
        $clients = $stmte->fetchall(PDO::FETCH_ASSOC); // Para recuperar um Objeto utilize PDO::FETCH_OBJ

        return $clients;
    }
}
