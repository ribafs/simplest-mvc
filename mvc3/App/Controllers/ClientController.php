<?php

require_once 'App/Models/Client.php';

class ClientController
{
    public function index(){
        $clients = new Client();
        $list = $clients->index();

        require_once 'App/views/clients/index.php';
    }
}
