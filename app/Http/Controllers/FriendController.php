<?php

namespace App\Http\Controllers;

use App\Models\MembersFriend;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // 取得當前使用者的 ID
        $userId = Auth::id();

        // 使用當前使用者的 ID 篩選購物車資料
        $friends = MembersFriend::where('user_id', $userId)->get();

        // 如果需要的話，你也可以取得相應的商品資料
        $friendIds = $friends->pluck('friend_id');
        $members = User::whereIn('id', $friendIds)->get();

        return view('friend.index', compact('friends', 'members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
