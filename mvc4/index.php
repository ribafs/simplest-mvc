<center>
<h2>Selecione</h2>
<hr width="10%">
<a href="index.php?acesso=clients">Clientes</a>&nbsp;&nbsp;&nbsp;
<a href="index.php?acesso=products">Produtos</a>
</center>
<?php
require_once 'vendor/autoload.php';

if(isset($_GET['acesso'])){
    $acesso = $_GET['acesso'];

    if($acesso == 'clients'){
        $controllerCli = new \App\Controllers\ClientController();
        $clients = $controllerCli->index();
    }elseif($acesso == 'products'){
        $controllerPro = new \App\Controllers\ProductController();
        $products = $controllerPro->index();
    }
}
?>
