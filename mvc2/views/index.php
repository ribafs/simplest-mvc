<center>
<h1>MVC Simples em PHP - 2</h1>
<h2>Com banco de dados</h2>

<h3>Lista de clientes</h3>

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

