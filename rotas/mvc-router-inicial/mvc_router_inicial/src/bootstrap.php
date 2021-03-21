<?php

define('DS',DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__) . DS);
define('SRC', ROOT . 'src' . DS);

require_once ROOT . 'vendor/autoload.php';
require_once SRC . 'config.php';

use Mvc\Controller\ClientesController;
$cli = new ClientesController();
print $cli->index();

//use Mini\Core\Router;
//echo 'ok';exit;
//$app = new Router();
