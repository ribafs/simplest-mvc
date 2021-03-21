<?php
declare(strict_types = 1);
namespace Mvc\Model;

use Mvc\Core\Model;

class ClientesModel extends Model
{   
    public function todosClientes()
    {
        $todos = 'Todos os clientes';
        return $todos;
    }
}
