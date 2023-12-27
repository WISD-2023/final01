<?php

namespace Database\Seeders;

use App\Models\Market;
use App\Models\Seller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // 確保每個賣家最多只有 3 間商場
        Seller::all()->each(function (Seller $seller) {
            /*
            $numberOfMarkets = $seller->markets()->count();

            // 限制每個賣家最多只能擁有 3 間商場
            $limit = 3 - $numberOfMarkets;

            if ($limit > 0) {
                Market::factory($limit)->create(['seller_id' => $seller->id]);
            }
            */
            Market::factory(3)->create(['seller_id' => $seller->id]);
        });

        /*
        // 如果需要總共建立 5 筆資料，可以再建立額外的商場
        if (Market::count() < 5) {
            $remainingCount = 5 - Market::count();
            Market::factory($remainingCount)->create();
        }
        */
    }
}
