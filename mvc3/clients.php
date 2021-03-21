<?php

require_once 'App/Controllers/ClientController.php';

$controllerCli = new ClientController();
$clients = $controllerCli->index();

