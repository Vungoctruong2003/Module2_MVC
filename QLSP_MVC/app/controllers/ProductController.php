<?php
include_once "app/models/ProductModels.php";

class ProductController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModels();
    }

    function showList()
    {
        $products = $this->productModel->getAllProducts();
        include_once "views/showList.php";
    }

    function showEditProduct($id){
        $product =  $this-> productModel->getProductById($id);
        include_once "views/update.php";
    }

    function updateProduct($product){
        $this-> productModel->updateProduct($product);
        header('location:index.php?action=show-products');
    }

    function deleteById($id){
        $this->productModel->deleteProduct($id);
        header('location:index.php?action=show-products');
    }

    function addProduct($product)
    {
          $this->productModel->insertProduct($product);
        header('location:index.php?action=show-products');
    }
}