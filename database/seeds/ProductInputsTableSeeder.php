<?php

use Illuminate\Database\Seeder;

class ProductInputsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = \CodeShopping\Models\Product::all();

        factory(\CodeShopping\Models\ProductInput::class, 150)
            ->make()
            ->each(function ($input) use ($products) {
                $input->product_id = $products->random()->id;
                $input->save();
            });
    }
}
