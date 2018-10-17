<?php

use CodeShopping\Models\Product;
use Illuminate\Database\Seeder;

class ProductPhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();

        $this->deleteAllPhotosInProductsPath();
        $products->each(function($product){

        });
    }

    private function deleteAllPhotosInProductsPath(){
        $path = \CodeShopping\Models\ProductPhoto::PRODUCTS_PATH;
        \File::deleteDirectory(storage_path($path), true);
    }
}
