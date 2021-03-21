<?php

require_once 'App/Models/Product.php';

class ProductController
{
    public function index(){
        $products = new Product();
        $list = $products->index();

        require_once 'App/views/products/index.php';
    }
}
