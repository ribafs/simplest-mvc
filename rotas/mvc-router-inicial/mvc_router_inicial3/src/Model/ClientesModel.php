<?php
declare(strict_types = 1);
namespace Mvc\Model;

use Mvc\Core\Model;

class ClientesModel extends Model
{   
    /**
     * Receber todos os clientes do banco
     */
    public function todosClientes()
    {
        $sql = 'SELECT id, nome, email FROM clientes ORDER BY id DESC';
        $query = $this->pdo->prepare($sql);
        $query->execute();

        // fetchAll() é o método PDO que recebe todos os registros da tabela, aqui em object-style porque nós definimos isso em
        // Core/Controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...

        return $query->fetchAll();
    }

    /**
     * Adicionar um cliente para o banco
     * @param string $name Name
     * @param string $email E-amil
     * @param string $birthday Birthday
     */
    public function add($nome, $email)
    {
        $sql = 'INSERT INTO clientes (nome, email) VALUES (:nome, :email)';
        $query = $this->pdo->prepare($sql);
        $parameters = array(':nome' => $nome, ':email' => $email);

        $query->execute($parameters);
    }

    /**
     * Excluir um cliente no banco
     * Favor note: isto é apenas um exemplo! Em uma aplicação real você não deve simplesmente deixar qualquer um
     * add/update/delete algo!
     * @param int $cliente_id Id of Cliente
     */
    public function delete($cliente_id)
    {
        $sql = 'DELETE FROM clientes WHERE id = :cliente_id';
        $query = $this->pdo->prepare($sql);
        $parameters = array(':cliente_id' => $cliente_id);

        $query->execute($parameters);
    }

    /**
     * Receber um cliente do banco
     * @param integer $cliente_id
     */
    public function umCliente($cliente_id)
    {
        $sql = 'SELECT id, nome, email FROM clientes WHERE id = :cliente_id LIMIT 1';
        $query = $this->pdo->prepare($sql);
        $parameters = array(':cliente_id' => $cliente_id);

        $query->execute($parameters);

        // fetch() é o método PDO que recebe exatamento um único resultado/registro
        return ($query->rowcount() ? $query->fetch() : false);
    }

    /**
     * Atualizar em cliente no banco
     * @param string $name Name
     * @param string $temail E-mail
     * @param string $birthday Birthday
     * @param int $cliente_id Id
     */
    public function update($nome, $email, $cliente_id)
    {
        $sql = 'UPDATE clientes SET nome = :nome, email = :email WHERE id = :cliente_id';
        $query = $this->pdo->prepare($sql);
        $parameters = array(':nome' => $nome, ':email' => $email, ':cliente_id' => $cliente_id);

        $query->execute($parameters);
    }

    /**
     * Receber uma "estatística" simples. Isto é apenas um simples exemplo para mostrar
     * como usar mais que um model com um controller (veja src/Controller/ClientesController.php para mais informações)
     */
    public function somaClientes()
    {
        $sql = 'SELECT COUNT(id) AS soma FROM clientes';
        $query = $this->pdo->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->soma;
    }
}
