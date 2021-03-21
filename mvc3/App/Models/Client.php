<?php

require_once 'Core/Model.php';

class Client extends Model
{

    public function index(){
        $stmte = $this->pdo->query("SELECT * FROM clients order by id");
        $executa = $stmte->execute();
        $clients = $stmte->fetchall(PDO::FETCH_ASSOC); // Para recuperar um Objeto utilize PDO::FETCH_OBJ

        return $clients;
    }
}
