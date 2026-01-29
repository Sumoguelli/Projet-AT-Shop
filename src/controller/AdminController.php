<?php

namespace Controller;

use Repository\ProductRepository;
use PDO;

class AdminController
{
    private PDO $pdo;
    private ProductRepository $repo;

    public function __construct(PDO $pdo, ProductRepository $repo)
    {
        $this->pdo = $pdo;
        $this->repo = $repo;
    }

    public function add(array $data): void
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO products (name, description, price, stock, type, category_id)
             VALUES (?, ?, ?, ?, ?, ?)"
        );

        $stmt->execute([
            $data['name'],
            $data['description'],
            $data['price'],
            $data['stock'],
            $data['type'],
            $data['category_id']
        ]);
    }

    public function update(int $id, array $data): void
    {
        $stmt = $this->pdo->prepare(
            "UPDATE products
             SET name=?, description=?, price=?, stock=?, type=?, category_id=?
             WHERE id=?"
        );

        $stmt->execute([
            $data['name'],
            $data['description'],
            $data['price'],
            $data['stock'],
            $data['type'],
            $data['category_id'],
            $id
        ]);
    }

    public function delete(int $id): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE id=?");
        $stmt->execute([$id]);
    }
}
