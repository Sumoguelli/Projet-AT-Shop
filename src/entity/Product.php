<?php

namespace Entity;

class Product
{
    protected int $id;
    protected string $name;
    protected string $description;
    protected float $price;
    protected int $stock;
    protected string $type;
    protected int $categoryId;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->price = (float)$data['price'];
        $this->stock = (int)$data['stock'];
        $this->type = $data['type'];
        $this->categoryId = (int)$data['category_id'];
    }

    public function getId(): int { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getDescription(): string { return $this->description; }
    public function getPrice(): float { return $this->price; }
    public function getStock(): int { return $this->stock; }
    public function getType(): string { return $this->type; }
}
