<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Cart::all()->take(5)->each(function($cart){
            Order::factory(1)->create([
                'cart_id' => $cart->id,
            ]);
        });

        /*
        // 使用 factory 建立 3 筆訂單，購物車帶入商品編號及數量
        Order::factory(3)->create();

        // 使用 factory 建立 2 筆訂單，直接從商品下訂帶入到訂單
        Order::factory(2)->create([
            'product_id' => function () {
                return Product::inRandomOrder()->first()->id;
            },
            'quantity' => function () {
                // 直接使用隨機值
                return $this->faker->numberBetween(1, 5);
            },
        ]);
        */
    }
}
