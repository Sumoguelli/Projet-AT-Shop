<?php

namespace Repository;

use PDO;
use Entity\Product;

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
        $rows = $stmt->fetchAll();

        $products = [];

        foreach ($rows as $row) {
            $products[] = new Product(
                (int)$row['id'],
                $row['name'],
                $row['description'],
                (float)$row['price'],
                (int)$row['category_id'],
                (int)$row['stock']
            );
        }

        return $products;
    }

    public function find(int $id): ?Product
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();

        if (!$row) return null;

        return new Product(
            (int)$row['id'],
            $row['name'],
            $row['description'],
            (float)$row['price'],
            (int)$row['category_id'],
            (int)$row['stock']
        );
    }

    public function create(Product $product): void
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO products (name, description, price, category_id, stock)
            VALUES (?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            $product->getName(),
            $product->getDescription(),
            $product->getPrice(),
            $product->getCategoryId(),
            $product->getStock()
        ]);
    }

    public function update(Product $product): void
    {
        $stmt = $this->pdo->prepare("
            UPDATE products
            SET name = ?, description = ?, price = ?, category_id = ?, stock = ?
            WHERE id = ?
        ");

        $stmt->execute([
            $product->getName(),
            $product->getDescription(),
            $product->getPrice(),
            $product->getCategoryId(),
            $product->getStock(),
            $product->getId()
        ]);
    }

    public function delete(int $id): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$id]);
    }
}
