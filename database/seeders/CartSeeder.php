<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // 建立10筆模擬資料
        User::all()->each(function($user){
            Cart::factory(10)->create([
                'user_id'=>$user->id,
                'product_id'=>Product::inRandomOrder()->first()->id
            ]);
        });

        /*
        Cart::factory(20)->create()->each(function ($cart) {
            // 每筆購物車資料都與一個使用者、產品和訂單相關聯
            $user = User::factory()->create();
            $product = Product::factory()->create();
            $order = Order::factory()->create();

            $cart->user()->associate($user);
            $cart->product()->associate($product);
            $cart->orders()->save($order);
        });
        */
    }
}
