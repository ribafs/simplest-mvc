<?php

require_once 'Model.php';

class Controller
{
    public function index(){
        $clients = new Model();

        $list = $clients->index();

        require_once 'views/index.php';
    }
}
