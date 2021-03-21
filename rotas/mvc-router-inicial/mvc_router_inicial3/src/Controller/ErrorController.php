<?php
declare(strict_types = 1);
namespace Mvc\Controller;

class ErrorController
{
  
  /**
     * ACTION: index
     * Este método manipula a página de erro que irá ser mostrada quando uma página não for encotnrada
     */
    public function index($controller, $action)
    {
        // load views
        require SRC . 'templates/_includes/header.php';
        require SRC . 'templates/error/index.php';
        require SRC . 'templates/_includes/footer.php';
    }
}

