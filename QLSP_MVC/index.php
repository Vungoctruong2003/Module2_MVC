<?php
include_once "app/models/Database.php";
include_once "app/models/ProductModels.php";
include_once "app/controllers/ProductController.php";
include_once "views/dashboard.php";

$action = $_REQUEST['action'] ?? null;
$method = $_SERVER['REQUEST_METHOD'] ?? null;
$productManager = new ProductController();

switch ($action) {
    case "show-products":
        $productManager->showList();
        break;

    case "add":
        include_once "views/add.php";
        if ($method == "POST") {
            $product = [];
            $product['id'] = $_REQUEST['id'];
            $product['name'] = $_REQUEST['name'];
            $product['price'] = $_REQUEST['price'];
            $product['description'] = $_REQUEST['description'];
            $product['producer'] = $_REQUEST['producer'];
            $productManager->addProduct($product);
            break;
        }
        break;

    case "delete":
        $id = $_REQUEST['id'] ?? null;
        $productManager->deleteById($id);
        break;

    case "update":
        $id = $_REQUEST['id'] ?? null;
        $productManager->showEditProduct($id);
        include_once "views/update.php";

        if ($method == "POST") {
            $product = [];
            $product['id'] = $_REQUEST['id'];
            $product['name'] = $_REQUEST['name'];
            $product['price'] = $_REQUEST['price'];
            $product['description'] = $_REQUEST['description'];
            $product['producer'] = $_REQUEST['producer'];
            $productManager->updateProduct($product);
        }
        break;
    default;
}




