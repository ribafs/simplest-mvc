<?php

class Model
{
    private $clients = [
        [1, 'João', 23],
        [2, 'Pedro', 48],
        [3, 'Jorge', 26],
        [4, 'Marta', 35],
    ];

    public function index(){
        return $this->clients;
    }
}
