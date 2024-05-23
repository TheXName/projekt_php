<?php

class ProductRepository
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function saveProduct(Product $product)
    {
        $sql = "INSERT INTO `products` (`id`, `admin_id`, `name`, `description`) 
        VALUES (:id, :admin_id, :name, :description)";

        var_dump($sql, $product->toArray());

        $statement = $this->pdo->prepare($sql);
        $statement->execute($product->toArray());
    }

    public function getAllProducts(): array
    {
        $sql = "SELECT * FROM products";
        $result = $this->pdo->query($sql);
        $products = $result->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    public function removeProductById(int $id){
        $sql = "DELETE FROM products WHERE id = $id";
        $this->pdo->query($sql);
    }

    public function getProductById(int $id){
        $sql = "SELECT * FROM products WHERE id = $id";
        $result = $this->pdo->query($sql);
        $product = $result->fetch(PDO::FETCH_ASSOC);
        return $product;
    }

    public function updateProduct(Product $product){
        $sql = "UPDATE products SET admin_id = :admin_id, name = :name, description = :description WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($product->toArray());
    }
}