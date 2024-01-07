<?php

namespace App\Http\Controllers;

use App\Models\MembersFriend;
use App\Http\Requests\StoreMembersFriendRequest;
use App\Http\Requests\UpdateMembersFriendRequest;
use App\Models\User;
use Illuminate\Http\Request;
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
        // 取得輸入的好友姓名
        $friendName = $request->input('name');

        // 檢查資料庫中是否有這個人
        $friend = User::where('name', $friendName)->first();

        // 取得當前使用者的 ID
        $userId = Auth::id();

        // 檢查是否為自己
        if ($friend && $friend->id !== $userId) {

            // 檢查好友關係是否已存在
            $existingFriendship = MembersFriend::where('user_id', $userId)
                ->where('friend_id', $friend->id)
                ->first();

            if (!$existingFriendship) {
                // 建立好友關係
                MembersFriend::create([
                    'user_id' => $userId,
                    'friend_id' => $friend->id,
                    'date' => now(),
                ]);

                return redirect()->route('friend.index')->with('success', '成功新增好友！');
            } else {
                return redirect()->route('friend.index')->withErrors(['error' => '你已經是朋友了！']);
            }
        } else {
            // 如果找不到對應的好友或是自己，回傳錯誤訊息
            return redirect()->route('friend.index')->withErrors(['error' => '沒有這個人或不能新增自己為好友！']);
        }
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
    public function destroy($id)
    {
        //
        $delete = MembersFriend::find($id);
        $delete->delete();
        return redirect()->route('friend.index');
    }
}
