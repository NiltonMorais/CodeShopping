<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var \Illuminate\Database\Eloquent\Collection $categories */
        $categories = \CodeShopping\Models\Category::all();

        factory(\CodeShopping\Models\Product::class, 30)
            ->create()
            ->each(function(\CodeShopping\Models\Product $product) use($categories){
                $categoryId = $categories->random()->id;
                $product->categories()->attach($categoryId);
            });
    }
}
