<?php

namespace Database\Seeders;

use App\Models\MembersFriend;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MembersFriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        /*
        $users = User::all();

        foreach ($users as $user) {
            $friend = $users->except($user->id)->random();

            // 確保會員不能新增自己為好友，且好友不會重複
            while (
                MembersFriend::where('user_id', $user->id)
                    ->where('friend_id', $friend->id)
                    ->orWhere('user_id', $friend->id)
                    ->where('friend_id', $user->id)
                    ->exists()
            ) {
                $friend = $users->except($user->id)->random();
            }

            MembersFriend::factory()->create([
                'user_id' => $user->id,
                'friend_id' => $friend->id,
            ]);
        }*/

        User::all()->each(function($user){
            $friend = User::inRandomOrder()->first();
            while($user->id == $friend->id){
                $friend = User::inRandomOrder()->first();
            }

            MembersFriend::factory(3)->create([
                'user_id' => $user->id,
                'friend_id' => $friend->id,
            ]);
        });



    }
}
