<?php

namespace Mvc\Core;
// Classe router melhorada em relação à versão 2, mas ainda com pequenas limitações. Isso por motivos didáticos, para facilitar a compreensão
class Router
{
    private $urlController;
    private $urlAction;
    private $urlParam;
    private $url;

    public function __construct(){
        $this->url();

        $this->urlController = isset($this->url[0]) ? $this->url[0] : null;
        $this->urlAction = isset($this->url[1]) ? $this->url[1] : 'index';// index é o action default

        $this->urlParams = array_values($this->url);
        $this->urlParams = array_splice($this->urlParams, 2);// Reduzindo o array de params

        if(!$this->urlController){
            $controller = '\\Mvc\\Controller\\'.ucfirst(CONTROLLER_DEFAULT) . 'Controller';
            $this->urlController = new $controller();
            $this->urlController->index();
        // Se o arquivo do controller existir
        }elseif(file_exists(SRC . 'Controller/' . ucfirst($this->urlController) . 'Controller.php')){
            $controller = '\\Mvc\\Controller\\'.ucfirst($this->urlController) . 'Controller';
            $this->urlController = new $controller();

            // Caso o action exista e seja chamável
            if(method_exists($controller, $this->urlAction) && is_callable(array($controller, $this->urlAction))){
                call_user_func_array(array($this->urlController, $this->urlAction), $this->urlParams);
            // Caso o método não exista
            } else {
                unset($this->urlController);
                $this->urlController = isset($this->url[0]) ? $this->url[0] : null;
                $controller = ucfirst($this->urlController) . 'Controller';
		        $action = $this->urlAction;
                $page = new \Mvc\Controller\ErrorController();
                $page->index($controller, $action);
            }
        // Caso o controller não seja encontrado dispara o ErrorsController, passando action e controller como argumentos
        }else{
		    $action = $this->urlAction;
            $controller = ucfirst($this->urlController) . 'Controller';
            $page = new \Mvc\Controller\ErrorController();
            $page->index($controller, $action);
        }
    }

    private function url(){
        $url2 = explode('/', dirname(dirname(__DIR__)));// Captura a URL
        $url1 = explode('/', $_SERVER['REQUEST_URI']);// Captura a URL

        $this->url=array();
        foreach($url1 as $value) {
            if(in_array($value, $url2)) {
                continue; // Cai fora do laço
            }else{
                array_push($this->url,$value); // Adiciona ao array
            }
        }
        return $this->url;
    }
}
