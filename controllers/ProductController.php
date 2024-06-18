<?php
require_once 'models/ProductModel.php';

class ProductController {
    protected $productModel;

    public function __construct($productModel) {
        $this->productModel = $productModel;
    }
    public function listProducts() {
        $products = $this->productModel->getAllProducts();
        require 'views/listProducts.php';
    }

    public function addProduct() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];
            if ($this->productModel->addProduct($name, $price)) {
                header('Location: /products');
            }
        }
        require 'views/addProduct.php'; 
    }

    
    
}
?>
