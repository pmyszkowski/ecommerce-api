<?php

namespace Tests\Feature;


use App\Http\Controllers\Controller;
use App\Models\Product;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class OrderProductsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function user_can_order_products()
    {
        $product_one = Product::factory()->create(['price' => 3250]);
        $product_two = Product::factory()->create(['price' => 1250]);

        $email = 'test@test.com';
        $user = User::create(['email' => $email]);

        $response = $this->postJson("/public/orders", [
            'email' => $email,
            'product_ids' => [
                $product_one->id, $product_two->id
            ],
        ]);

        $response->assertStatus(201);

        // Make sure the customer was charged the correct amount
        $response->assertJsonFragment(['total_price' => 4500]);

//        $data = $response->decodeResponseJson()['data'];
//        $this->assertEquals(4500, $data['total_price'] );

        // Make sure that an order exists for this customer
        $this->assertNotNull($user->orders);
    }

}