<center>

<h1>MVC Simples em PHP</h1>
<h2>Com banco de dados</h2>

<p>Lista de produtos</p>
<br>
<table>
<tr><td>

<table>
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

