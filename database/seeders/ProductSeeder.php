<?php

namespace Database\Seeders;

use App\Models\Market;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // 建立 10 筆商品資料
        Market::all()->each(function ($market) {
            Product::factory(5)->create([
                'market_id' => function () use ($market) {
                    return $market->id;
                },
                'type_id' => function ()  {
                    return Type::inRandomOrder()->first()->id;
                },
            ]);
        });
    }
}
