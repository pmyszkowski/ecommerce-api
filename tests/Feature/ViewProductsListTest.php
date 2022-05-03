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
    function public_user_can_view_products_list()
    {
        // Create a product
        Product::factory()->active()->create([
            'name' => 'The Chosen One',
            'price' => 1111,
            //'active' => true,
        ]);

        // View the list
        $request = $this->get('/public/products');

        // See the details
        $request->assertOk();

        $request->assertSee('The Chosen One');
        $request->assertSee(1111 );
    }

    /** @test */
    function public_user_cannot_view_inactive_products() {

        Product::factory()->inactive()->create([
            'name' => 'The Other One',
            'price' => 2222,
//            'active' => false,
        ]);

        // get products
        $request = $this->get('/public/products');

        $request->assertOk();

        $request->assertDontSee('The Other One');
        $request->assertDontSee(2222 );
    }
}
