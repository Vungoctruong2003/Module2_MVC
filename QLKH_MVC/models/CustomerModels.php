<?php

class CustomerModels
{
    private $pdo;

    public function __construct()
    {
        $database = new DBConnect("root", "truong2003@VNT");
        $this->pdo = $database->connect();
    }

    public function getAllCustomer()
    {
        try {
            $sql = "SELECT * FROM manage_customer";
            $stmt = $this->pdo->query($sql);
            $customers = $stmt->fetchAll();
            return ($customers);
        } catch (PDOException $PDOException) {
            echo $PDOException->getMessage();
            exit();
        }
    }

    public function addCustomer($customer)
    {
        try {
            $sql = "INSERT INTO manage_customer (name,email,address) VALUES (:name ,:email,:address)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":name", $customer['name']);
            $stmt->bindParam(":email", $customer['email']);
            $stmt->bindParam(":address", $customer['address']);
            $stmt->execute();
        } catch (PDOException $PDOException) {
            echo $PDOException->getMessage();
            exit();
        }
    }

    public function deleteCustomer($id)
    {
        try {
            $sql = "DELETE FROM manage_customer WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (PDOException $PDOException) {
            echo $PDOException->getMessage();
            exit();
        }
    }

    public function getCustomerById($id)
    {
        try {
            $sql = "SELECT * FROM manage_customer WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $PDOException) {
            echo $PDOException->getMessage();
            exit();
        }
    }

    public function updateCustomer($customer)
    {
        try {
            $sql = "UPDATE manage_customer
SET  name = :name1, email=:mail,address = :address
WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":id", $customer['id']);
            $stmt->bindParam(":name1", $customer['name']);
            $stmt->bindParam(":mail", $customer['email']);
            $stmt->bindParam(":address", $customer['address']);
            $stmt->execute();

        } catch (PDOException $PDOException) {
            echo $PDOException->getMessage();
            exit();
        }
    }

    public function searchByName($key)
    {
        try {
            $sql = "SELECT * FROM manage_customer WHERE name LIKE N'%$key%'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $PDOException) {
            echo $PDOException->getMessage();
            exit();
        }
    }
}
