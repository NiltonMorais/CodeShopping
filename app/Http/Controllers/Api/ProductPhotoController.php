<?php

namespace CodeShopping\Http\Controllers\Api;

use CodeShopping\Http\Requests\ProductPhotoRequest;
use CodeShopping\Http\Resources\ProductPhotoCollection;
use CodeShopping\Models\Product;
use CodeShopping\Models\ProductPhoto;
use CodeShopping\Http\Controllers\Controller;
use CodeShopping\Http\Resources\ProductPhotoResource;

class ProductPhotoController extends Controller
{

    public function index(Product $product)
    {
        return new ProductPhotoCollection($product->photos, $product);
    }

    public function store(ProductPhotoRequest $request, Product $product)
    {
        $photos = ProductPhoto::createWithPhotosFiles($product->id, $request->photos);
        return response()->json(new ProductPhotoCollection($photos, $product), 201);
    }

    public function show(Product $product, ProductPhoto $photo)
    {
        $this->validateProductPhoto($product, $photo);
        return new ProductPhotoResource($photo);
    }

    public function update(ProductPhotoRequest $request, Product $product,ProductPhoto $photo)
    {
        $this->validateProductPhoto($product, $photo);
        $photo = $photo->updateWithPhoto($request->photo);
        return new ProductPhotoResource($photo);
    }

    public function destroy(Product $product, ProductPhoto $photo)
    {
        $this->validateProductPhoto($product, $photo);
        $photo->deleteWithPhoto();
        return response()->json([],204);
    }

    private function validateProductPhoto(Product $product, ProductPhoto $photo)
    {
        if($photo->product_id != $product->id){
            return response()->json([],404);
        }
    }
}
