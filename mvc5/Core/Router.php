<?php
namespace Core;

class Router
{
    private $urlController = null;

    public function __construct()
    {
        $this->Url();

        // Quando não for setado o urlController abrirá o ClientController como o default
        if (!$this->urlController) {
            $page = new \App\Controllers\ClientController();
            $page->index();

        }elseif ($this->urlController == 'clients') {
            $page = new \App\Controllers\ClientController();
            $page->index();

        } elseif ($this->urlController == 'products') {
            $page = new \App\Controllers\ProductController();
            $page->index();
        } else {
            $page = new \Core\ErrorController();
            $page->index();
        }
    }

    private function Url()
    {
        // Suporta descer apenas um nível de diretório no servidor web
        // Testado em: /mvc5 e em /testes/mvc5. Caso precise descer mais precisa ajustar o código abaixo
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('/', $url);// Captura a URL
        $count = count($url);
        if($count == 4){
            $url = $url[3];
        }elseif($count == 3){
            $url = $url[2];
        }
        $this->urlController = $url;
        return $this->urlController;
    }
}
