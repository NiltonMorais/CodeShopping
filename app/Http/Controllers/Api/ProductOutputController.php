<?php

namespace CodeShopping\Http\Controllers\Api;

use CodeShopping\Http\Controllers\Controller;
use CodeShopping\Http\Requests\ProductInputRequest;
use CodeShopping\Http\Resources\ProductOutputResource;
use CodeShopping\Models\ProductOutput;

class ProductOutputController extends Controller
{
    public function index()
    {
        $products_outputs = ProductOutput::with('product')->paginate();
        return ProductOutputResource::collection($products_outputs);
    }

    public function store(ProductInputRequest $request)
    {
        $products_output = ProductOutput::create($request->all());
        return new ProductOutputResource($products_output);
    }

    public function show(ProductOutput $products_output)
    {
        return new ProductOutputResource($products_output);
    }
}
