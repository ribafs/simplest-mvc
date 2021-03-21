<center>
<h1>MVC Simples em PHP</h1>
<h2>Sem banco de dados</h2>

<h3>Lista de clientes</h3>

<table>
<tr><td><b>Código</td><td><b>Nome</td><td><b>Idade</td><tr>
<?php

        for ($lin=0; $lin<4; $lin++) {
            print '<tr>';
            for ($col=0; $col<3; $col++) {
                echo '<td>'.$list[$lin][$col].'</td>';
            }
            print '</tr>';
        }        

?>
</table>
</center>
