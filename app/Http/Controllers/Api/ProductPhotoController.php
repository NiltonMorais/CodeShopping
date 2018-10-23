<?php

namespace CodeShopping\Http\Controllers\Api;

use CodeShopping\Http\Resources\ProductPhotoCollection;
use CodeShopping\Models\Product;
use CodeShopping\Models\ProductPhoto;
use Illuminate\Http\Request;
use CodeShopping\Http\Controllers\Controller;
use CodeShopping\Http\Resources\ProductPhotoResource;

class ProductPhotoController extends Controller
{

    public function index(Product $product)
    {
        return new ProductPhotoCollection($product->photos, $product);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Product $product, ProductPhoto $photo)
    {
        if($photo->product_id != $product->id){
            return response()->json([],404);
        }
        return new ProductPhotoResource($photo);
    }

    public function update(Request $request, ProductPhoto $productPhoto)
    {
        //
    }

    public function destroy(ProductPhoto $productPhoto)
    {
        //
    }
}
