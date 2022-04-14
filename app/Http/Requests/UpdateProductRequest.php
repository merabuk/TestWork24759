<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Interfaces\ProductRepositoryInterface;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(ProductRepositoryInterface $productRepository)
    {
        $product = $productRepository->getProductBySlug($this->route('slug'));
        return [
            'name' => 'required|string',
            'slug' => 'required|string|unique:products,slug,'.$product->id,
            'description' => 'required',
            'price' => 'required|min:0|max:9999',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Name',
            'slug' => 'Slug',
            'description' => 'Description',
            'price' => 'Price',
        ];
    }
}
