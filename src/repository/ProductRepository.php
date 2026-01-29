<?php

namespace Repository;

use Entity\Product;
use PDO;

class ProductRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM products");
        $products = [];

        while ($row = $stmt->fetch()) {
            $products[] = new Product($row);
        }

        return $products;
    }

    public function find(int $id): ?Product
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        return $data ? new Product($data) : null;
    }
}
