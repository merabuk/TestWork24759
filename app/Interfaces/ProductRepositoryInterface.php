<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function getAllProducts(): object;
    public function getProductBySlug(string $productSlug): object;
    public function deleteProduct(string $productSlug): void;
    public function createProduct(array $productDetails): object;
    public function updateProduct(string $productSlug, array $newDetails): object;
}
