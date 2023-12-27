<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Market;
use App\Models\Seller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // 建立 2 筆賣家資料
        User::all()->take(2)->each(function ($user) {
            /*
            $user->seller()->save(
                Seller::factory()->make()
            );
            */
            Seller::factory(1)->create([
				'user_id' => $user->id,
			]);
        });
    }
}
