<?php

namespace CodeShopping\Rules;

use CodeShopping\Models\Product;
use Illuminate\Contracts\Validation\Rule;

class HasStock implements Rule
{
    /**
     * @var Product
     */
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function passes($attribute, $value)
    {
        return $this->product->stock - $value >= 0;
    }

    public function message()
    {
        return "The product {$this->product->name} doesn't have sufficient stock to output";
    }
}
