<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=testes', 'root', 'root');
    //print 'Conectou';
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

