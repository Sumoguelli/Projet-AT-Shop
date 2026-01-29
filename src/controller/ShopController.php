<?php

namespace Controller;

use Repository\ProductRepository;

class ShopController
{
    private ProductRepository $repo;

    public function __construct(ProductRepository $repo)
    {
        $this->repo = $repo;
    }

    public function listProducts(): array
    {
        return $this->repo->findAll();
    }

    public function showProduct(int $id)
    {
        return $this->repo->find($id);
    }
}
