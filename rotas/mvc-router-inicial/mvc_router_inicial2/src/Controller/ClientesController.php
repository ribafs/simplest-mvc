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
        $Cliente = new ClientesModel();
        $todos = $Cliente->todosClientes();

        // Carregar a view. Com as views nós podemoms mostrar $todos e a soma facilmente
		$view = new ClientesView();
		$view->render($todos);
    }
}
