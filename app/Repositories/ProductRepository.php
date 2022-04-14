<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAllProducts(): object
    {
        return Product::with('users')->get();
    }

    public function getProductBySlug(string $productSlug): object
    {
        return Product::with('users')->where('slug', $productSlug)->firstOrFail();
    }

    public function deleteProduct(string $productSlug): void
    {
       Product::where('slug', $productSlug)->firstOrFail()->delete();
    }

    public function createProduct(array $productDetails): object
    {
        return Product::create($productDetails);
    }

    public function updateProduct(string $productSlug, array $newDetails): object
    {
        $newSlug = $newDetails['slug'];

        Product::where('slug', $productSlug)->update($newDetails);

        return Product::where('slug', $newSlug)->firstOrFail();
    }
}
