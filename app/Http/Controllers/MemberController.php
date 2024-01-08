<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;

class MemberController extends Controller
{
    //
    public function update(ProfileUpdateRequest $request)
    {
        $user = $request->user();

        // 更新使用者資訊
        $user->fill($request->validated());

        // 如果 email 有更動，將 email_verified_at 設為 null
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // 儲存使用者資訊
        $user->save();

        // 使用 Redirect 類別，確保使用正確的路由名稱
        return Redirect::route('dashboard')->with('status', 'profile-updated');
    }
}
