<?php

namespace Tests\Feature;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ViewProductsListTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function user_can_view_products_list()
    {
        // Create a product
        Product::factory()->create([
            'name' => 'The Chosen One',
            'price' => 1111,
        ]);

        // View the list
        $request = $this->get('/public/products');

        // See the details
        $request->assertOk();

        $request->assertSee('The Chosen One');
        $request->assertSee(1111 );
    }

}
