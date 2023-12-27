<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
        ]);        
        $this->call([
            SellerSeeder::class,
        ]);
        $this->call([
            MarketSeeder::class,
        ]);
        

        $this->call([
            TypeSeeder::class,
        ]);
        $this->call([
            ProductSeeder::class,
        ]);

        
        $this->call([
            ReviewSeeder::class,
        ]);
        
        $this->call([
            MembersFriendSeeder::class,
        ]);
        
        $this->call([
            CartSeeder::class,
        ]);
        
        $this->call([
            OrderSeeder::class,
        ]);
        
        $this->call([
            OrderDetailSeeder::class,
        ]);


    }
}
