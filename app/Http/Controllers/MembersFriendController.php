<?php

namespace App\Http\Controllers;

use App\Models\MembersFriend;
use App\Http\Requests\StoreMembersFriendRequest;
use App\Http\Requests\UpdateMembersFriendRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MembersFriendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // 取得當前使用者的 ID
        $userId = Auth::id();

        // 使用當前使用者的 ID 篩選好友資料
        $friends = MembersFriend::where('user_id', $userId)->get();

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
    public function store(StoreMembersFriendRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MembersFriend $membersFriend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MembersFriend $membersFriend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMembersFriendRequest $request, MembersFriend $membersFriend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MembersFriend $membersFriend)
    {
        //
    }
}
