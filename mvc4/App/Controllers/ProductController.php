<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController
{
    public function index(){
        $products = new Product();
        $list = $products->index();

        require_once 'App/views/products/index.php';
    }
}
