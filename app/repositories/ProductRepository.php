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
}