<?php

namespace Mvc\Controller;
use \Mvc\Model\ClientesModel;
use \Mvc\View\ClientesView;

class ClientesController
{
    public function index(){
        $model = new ClientesModel();
        $model = $model->index();

        $view = new ClientesView();
        return $view->index($model);
    }
}
