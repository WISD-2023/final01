<?php

namespace Database\Seeders;

use App\Models\OrderDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // 取得所有訂單的 ID
        $orderIds = \App\Models\Order::pluck('id')->toArray();

        // 使用 factory 建立 3 筆訂單明細資料，並連結到相應的不同訂單
        OrderDetail::factory(3)->create([
            'order_id' => function () use ($orderIds) {
                return \Illuminate\Support\Arr::random($orderIds);
            },
            'product_id' => function () {
                return Product::inRandomOrder()->first()->id;
            }
        ]);
    }
}
