<?php

namespace App\Services;

use App\Models\Product;
use http\Env\Request;

class ProductService
{

    public function index()
    {
        return Product::active()->get();
    }

    public function create( array $attributes )
    {
        return Product::create( $attributes );
    }

    public function update( array $attributes, $product )
    {
        $product->update( $attributes );
        return $product;
    }

    public function view( $order )
    {
        return $order;
    }

    public function getTotalPrice(array $product_ids) : int
    {
        return Product::whereIn( 'id', $product_ids )->sum('price');
    }

}
