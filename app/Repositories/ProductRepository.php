<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAllProducts()
    {
        return Product::all();
    }

    public function getProductBySlug($productSlug)
    {
        return Product::where('slug', $productSlug)->firstOrFail();
    }

    public function deleteProduct($productSlug)
    {
        Product::where('slug', $productSlug)->destroy();
    }

    public function createProduct(array $productDetails)
    {
        return Product::create($productDetails);
    }

    public function updateProduct($productSlug, array $newDetails)
    {
        return Product::where('slug', $productSlug)->update($newDetails);
    }
}
