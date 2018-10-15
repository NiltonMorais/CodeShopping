<?php

namespace CodeShopping\Http\Controllers\Api;

use CodeShopping\Models\Category;
use CodeShopping\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use CodeShopping\Http\Controllers\Controller;

class ProductCategoryController extends Controller
{
    public function index(Product $product)
    {
        return $product->categories;
    }

    public function store(Request $request, Product $product)
    {
        $changed = $product->categories()->sync($request->categories);
        $categoriesAttachedId = $changed['attached'];

        /** @var Collection $categories */
        $categories = Category::whereIn('id',$categoriesAttachedId)->get();

        return $categories->count() ? response()->json($categories,201) : [];
    }

    public function destroy($id)
    {
        //
    }
}
