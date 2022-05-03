<?php

namespace Tests\Unit;

use App\Models\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /** @test */
    public function can_get_formatted_product_price()
    {
        $product = Product::factory()->make([
            'price' => 6750,
        ]);

        $this->assertEquals('67.50', $product->formatted_price);
    }
}
