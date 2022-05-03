<?php

namespace App\Services;

use App\Models\Order;

class OrderService
{

    public function __construct(
        private ProductService $productService,
        private UserService    $userService
    )
    {
    }

    public function index()
    {
        return Order::all();
    }

    public function create(string $email, array $product_ids)
    {
        $total_price = $this->productService->getTotalPrice( $product_ids );

        $user = $this->userService->firstOrCreate( $email );

        $order = Order::create( ['total_price' => $total_price, 'user_id' => $user->id ] );

        return $order;
    }

    public function view(Order $order)
    {
        return $order;
    }

    public function update(array $all, Order $order)
    {
        $order->update( $all );
        return $order;
    }

}
