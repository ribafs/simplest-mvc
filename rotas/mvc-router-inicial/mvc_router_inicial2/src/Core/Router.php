<?php

namespace Mvc\Core;

// Classe bem simplificada de router
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
        }elseif(file_exists(SRC . 'Controller/' . ucfirst($this->urlController) . 'Controller.php')){
            $controller = '\\Mvc\\Controller\\'.ucfirst($this->urlController) . 'Controller';
            $this->urlController = new $controller();
            if(method_exists($controller, $this->urlAction)){
                call_user_func_array(array($this->urlController, $this->urlAction), $this->urlParams);
            }else{ 
                echo '<br><br><h3 align="center">Este método não existe</h3>';
            }
        }else{
            if(!method_exists($this->urlController, $this->urlAction)){
                echo '<br><br><h3 align="center">Este controller não existe</h3>';
            }
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
