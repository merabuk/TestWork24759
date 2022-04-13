<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function getAllProducts();
    public function getProductBySlug($productSlug);
    public function deleteProduct($productSlug);
    public function createProduct(array $productDetails);
    public function updateProduct($productSlug, array $newDetails);
}
