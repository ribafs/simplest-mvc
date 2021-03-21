<?php

require_once 'App/Controllers/ProductController.php';

$controllerPro = new ProductController();
$products = $controllerPro->index();

