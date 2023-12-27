<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::all()->each(function($user){
            Review::factory(10)->create([
                'user_id'=>$user->id,
                'product_id' => function ()  {
                    return Product::inRandomOrder()->first()->id;
                },
            ]);
        });
       
    }
}
