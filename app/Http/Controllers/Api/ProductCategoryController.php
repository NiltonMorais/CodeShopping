<?php

namespace CodeShopping\Http\Controllers\Api;

use CodeShopping\Models\Product;
use Illuminate\Http\Request;
use CodeShopping\Http\Controllers\Controller;

class ProductCategoryController extends Controller
{
    public function index(Product $product)
    {
        return $product->categories;
    }

    public function store(Request $request)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
