<center>

<h1>MVC Simples em PHP</h1>
<h2>Sem banco de dados</h2>

<p>Lista de clientes</p>
<br>
<table>
<tr><td>
<table align="left">
<?php
    $count = count($list);
    $keys = array_keys($list);

    for($i = 0; $i < $count; $i++)
    {
        foreach($list[$keys[$i]] as $key => $value) {        
            echo '<b>'.$key . " - </b>" . $value . "<br>";
        }
        echo "<br>";
    }

?>
</table>
</td></tr>
<table>

<a href="index.php">Voltar ao índice</a>
