<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAllProducts()
    {
        return Product::with('users')->get();
    }

    public function getProductBySlug($productSlug)
    {
        return Product::with('users')->where('slug', $productSlug)->firstOrFail();
    }

    public function deleteProduct($productSlug)
    {
        Product::destroy($productSlug);
    }

    public function createProduct(array $productDetails)
    {
        return Product::create($productDetails);
    }

    public function updateProduct($productSlug, array $newDetails)
    {
        $newSlug = $newDetails['slug'];

        Product::where('slug', $productSlug)->update($newDetails);

        return Product::where('slug', $newSlug)->firstOrFail();
    }
}
