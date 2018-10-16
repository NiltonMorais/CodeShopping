<?php

namespace CodeShopping\Http\Controllers\Api;

use CodeShopping\Http\Controllers\Controller;
use CodeShopping\Http\Requests\ProductInputRequest;
use CodeShopping\Http\Resources\ProductInputResource;
use CodeShopping\Models\ProductInput;

class ProductInputController extends Controller
{

    public function index()
    {
        $products_inputs = ProductInput::with('product')->paginate();
        return ProductInputResource::collection($products_inputs);
    }

    public function store(ProductInputRequest $request)
    {
        $products_input = ProductInput::create($request->all());
        return new ProductInputResource($products_input);
    }

    public function show(ProductInput $products_input)
    {
        return new ProductInputResource($products_input);
    }
}
