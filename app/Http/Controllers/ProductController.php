<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Interfaces\ProductRepositoryInterface;
use App\Http\Requests\{
    StoreProductRequest,
    UpdateProductRequest,
};
use Illuminate\Http\{JsonResponse, Request, Response};

class ProductController extends Controller
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->productRepository->getAllProducts()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request): JsonResponse
    {
        return response()->json(
            [
                'data' => $this->productRepository->createProduct($request->all())
            ],
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request): JsonResponse
    {
        $productSlug = $request->route('slug');

        return response()->json([
            'data' => $this->productRepository->getProductBySlug($productSlug)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request): JsonResponse
    {
        $productSlug = $request->route('slug');

        return response()->json([
            'data' => $this->productRepository->updateProduct($productSlug, $request->all())
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request): JsonResponse
    {
        $productSlug = $request->route('slug');
        $this->productRepository->deleteProduct($productSlug);

        return response()->json([
            'message' => 'Product was deleted succesfuly'
        ]);//, Response::HTTP_NO_CONTENT);
    }
}
