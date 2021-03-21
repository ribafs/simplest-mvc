<?php

namespace App\Controllers;

use App\Models\Client;

class ClientController
{
    public function index(){
        $clients = new Client();
        $list = $clients->index();

        require_once 'App/views/clients/index.php';
    }
}
