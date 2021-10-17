<?php

class ProductModels
{
    private $pdo;

    public function __construct()
    {
        $database = new Database("root", "truong2003@VNT");
        $this->pdo = $database->connect();
    }

    public function getAllProducts()
    {
        try {
            $sql = "select * from products";
            $stmt = $this->pdo->query($sql);
            $products = $stmt->fetchAll();
            return ($products);
        } catch (PDOException $PDOException) {
            echo $PDOException->getMessage();
            exit();
        }
    }

    public function updateProduct($product)
    {
        try {
            $sql = "UPDATE products
SET  name = :name, price=:price,description = :description,producer=:producer
WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam("id", $product['id']);
            $stmt->bindParam("name", $product['name']);
            $stmt->bindParam("price", $product['price']);
            $stmt->bindParam("description", $product['description']);
            $stmt->bindParam("producer", $product['producer']);
            $stmt->execute();
        } catch (PDOException $PDOException) {
            echo $PDOException->getMessage();
            exit();
        }
    }

    public function getProductById($id)
    {
        try {
            $sql = "select * from products where id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam("id", $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $PDOException) {
            echo $PDOException->getMessage();
            exit();
        }
    }

    public function insertProduct($product)
    {
        try {
            $sql = "INSERT INTO products(id,name,price,description,producer) VALUES(:id,:name,:price,:description,:producer)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam("id", $product['id']);
            $stmt->bindParam("name", $product['name']);
            $stmt->bindParam("price", $product['price']);
            $stmt->bindParam("description", $product['description']);
            $stmt->bindParam("producer", $product['producer']);
            $stmt->execute();
        } catch (PDOException $PDOException) {
            echo $PDOException->getMessage();
            exit();
        }
    }

    public function deleteProduct($id)
    {
        try {
            $sql = "DELETE FROM products WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam("id", $id);
            $stmt->execute();
        } catch (PDOException $PDOException) {
            echo $PDOException->getMessage();
            exit();
        }
    }

}