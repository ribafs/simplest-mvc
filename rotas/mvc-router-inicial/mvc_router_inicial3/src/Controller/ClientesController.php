<?php
declare(strict_types = 1);

namespace Mvc\Controller;
use Mvc\Model\ClientesModel;
use Mvc\View\ClientesView;

class ClientesController
{

    /**
     * ACTION: index
     * Este método/action manipula o que acontece quando você move para http://localhost/Mini-fw2/clientes/index
     */
    public function index()
    {
		// View clientes/index envia request para o Router, este envia um request para ClientesContoller/index, este envia request paraa
        // o model ClientesModel/todosClientes, este responde para ClientesContoller/index, este responde para a View clientes/index finalmente
        // Instance new Model (ClientesModel)
        $Cliente = new ClientesModel();
        // Receber todos os clientes e a soma de clientes para usar na view clientes/index
        $todos = $Cliente->todosClientes();
        $soma = $Cliente->somaClientes();

        // Carregar a view. Com as views nós podemoms mostrar $todos e a soma facilmente
		$view = new ClientesView();
		$view->render('clientes','index',$todos,$soma);
    }

    /**
     * ACTION: add
     * Este método controla o que acontece quando você move para http://localhost/Mini-framework2/clientes/add
     * IMPORTANTE: Esta não é uma página normal, ela é um ACTION. Ela é onde o form "add a cliente" no clientes/index
     * direciona o usuário após o submit do form. Este método manipula todos os dados do tipo POST do form e então redireciona
     * o usuário de volta para clientes/index via última linha: header(...)
     * Este é um exemplo de como manipular uma requisição POST.
     */
    public function add()
    {
        // Se temos dados POST para criar uma nova entrada de cliente. Se o button 'submit_add_cliente' na view clientes/index tiver sido clicado
        if (isset($_POST['submit_add_cliente'])) {
            // Instance new Model (ClientesModel)
            $Cliente = new ClientesModel();
            // Execute add() in Model/ClientesModel.php
            $Cliente->add($_POST['nome'], $_POST['email']);
	        // Onde ir após Cliente ser adicionado
	        header('location: ' . URL . 'clientes/index');	
        }

        // Carregar views.
		$view = new ClientesView();
		$view->render('clientes','add');
    }

    /**
     * ACTION: delete
     * Este método manipula tudo que acontece quando você move para http://localhost/Mini-framework2/clientes/delete
     * IMPORTANTE: Esta não é uma página normal, é um ACTION. Isto é para onde o botão "delete a cliente" no clientes/index
     * direciona o usuário após o clique. Este método manipula todos os dados da requisição GET (na URL!) e então
     * redireciona o usuário de volta para clientes/index através da última linha: header(...)
     * Este é um exemplo de como manipular uma requisição do tipo GET.
     * @param int $cliente_id Id of the to-delete cliente
     */
    public function delete($cliente_id)
    {
		// View clientes/index envia request para o Router, este envia um request para ClientesContoller/delete, este envia um request 
        // para o model ClientesModel/delete, este envia uma resposta para ClientesContoller/delete, este envia uma resposta/redirect para
        // a View clientes/index finalmente

        // Se temos um id de um cliente que deve ser excluído
        if (isset($cliente_id)) {
            // Instance new Model (ClientesModel)
            $Cliente = new ClientesModel();
            // do delete() in Model/ClientesModel.php
            $Cliente->delete($cliente_id);
        }

        // Para onde ir após a exclusão do cliente
        header('location: ' . URL . 'clientes/index');
    }

     /**
     * ACTION: edit
     * Este método controla o que acontece quando você move para http://localhost/Mini-framework2/clientes/edit
     * @param int $cliente_id Id of the to-edit cliente
     */
    public function edit($cliente_id)
    {
        // Se temos um id de um cliente que deve ser editado
        if (isset($cliente_id)) {
            // Instance new Model (ClientesModel)
            $Cliente = new ClientesModel();
	        $todos = $Cliente->todosClientes();

            // do umCliente() in Model/ClientesModel.php
            $um = $Cliente->umCliente($cliente_id);

            // Se o cliente não foi encontrado, então isto deve retornar false, e precisamos mostrar a página de erro
            if ($um === false) {
                $page = new \Mvc\Controller\ErrorController();
                $page->index();
            } else {
                // Carregar views.
				$view = new ClientesView();
				$view->render('clientes','edit',$todos, '',$um);// Como os parâmetros precisam ficar na ordem: controller, action, todos, '', um
            }
        } else {
            // Redirecionar usuário para a página clientes/index (por que nós não temos um cliente_id)
            header('location: ' . URL . 'clientes/index');
        }
    }

    /**
     * ACTION: update
     * Este método controla o que acontece quando você move para http://localhost/Mini-framework2/clientes/update
     * IMPORTANTE: Esta não é uma página  normal, é um ACTION. Isto é onde o botão "update a cliente" do form em clientes/edit
     * direciona o usuário após o submit do form. Este método manipula todos os dados POST do form e então redireciona
     * o usuário de volta para clientes/index através da última linha: header(...)
     * Isto é um exemplo de como manipular uma requisição tipo POST.
     */
    public function update()
    {
        // Se temos dados tipo POST para atualizar um cliente
        if (isset($_POST['submit_update_cliente'])) {
            // Instance new Model (ClientesModel)
            $Cliente = new ClientesModel();
            // do update() from Model/ClientesModel.php
            $Cliente->update($_POST['nome'], $_POST['email'], $_POST['cliente_id']);
        }

        // Para onde ir após atualizar o cliente
        header('location: ' . URL . 'clientes/index');
    }
}
