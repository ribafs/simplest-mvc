<?php
class Model {

    private $clients = [
        [1, 'João', 23],
        [2, 'Pedro', 48],
        [3, 'Jorge', 26],
        [4, 'Marta', 35],
    ];
	
	public function index() {
        return $this->clients;
	}		
}

class Controller {

	public function index() {
        $list = new Model();
        $clients = $list->index();

        return $clients;
	}
}
//Importante que a view não vá direto ao model, mas que receba dados do model através do controller
// Original em
// https://elias.praciano.com/2014/08/php-mvc-e-hello-world/
?>
<center>
<h1>MVC Olá Mundo</h1>
<h3>Lista de Clientes</h3>
<table>
<tr><td><b>Código</td><td><b>Nome</td><td><b>Idade</td><tr>
<?php

$clients = new Controller();
$clients = $clients->index();

        for ($lin=0; $lin<4; $lin++) {
            print '<tr>';
            for ($col=0; $col<3; $col++) {
                echo '<td>'.$clients[$lin][$col].'</td>';
            }
            print '</tr>';
        }        

?>
</table>




