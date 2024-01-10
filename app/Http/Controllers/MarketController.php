<?php

namespace App\Http\Controllers;

use App\Models\Market;
use App\Models\Seller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMarketRequest;
use App\Http\Requests\UpdateMarketRequest;
use Illuminate\Support\Facades\Auth;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $seller = $user->seller;
        $markets = Market::whereIn('seller_id', $seller->pluck('id'))->get();
        return view('seller.market.index', compact('user', 'seller', 'markets'));
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
    public function store(StoreMarketRequest $request)
    {
        // 檢查使用者是否已經登錄
        if (Auth::check()) {
            $user = Auth::user();
            // 檢查使用者是否有賣家資訊
            if ($user->seller) {
                $seller = $user->seller;
    
                // 檢查是否已經存在賣場，避免重複建立
                if (!$seller->market) {
                    Market::create([
                        'seller_id' => $seller->id,
                        'name' => "你的賣場",
                        'description' => "賣場描述",
                    ]);
    
                    $markets = Market::whereIn('seller_id', $seller->pluck('id'))->get();
                    return view('seller.market.index', compact('seller', 'markets'));
                } else {
                    // 如果已經存在賣場，可以在這裡做相應的處理
                    return view('seller.market.index', compact('seller'));
                }
            }
            // 如果使用者沒有賣家資訊的處理邏輯
            return redirect()->route('home')->with('error', '您不是賣家，無法建立賣場。');
        }
        // 如果使用者未登錄的處理邏輯
        return redirect()->route('login')->with('error', '請先登錄以建立賣場。');
    }    
    
    /**
     * Display the specified resource.
     */
    public function show(Market $market)
    {
        $products = Product::whereIn('market_id', $market->pluck('id'))->get();
        return view('seller.market.show', compact('market', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Market $market)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Market $market)
    {
        $market->update([
            'name'    => $request->input('name'),
            'description' => $request->input('description'),
        ]);
        $products = Product::whereIn('market_id', $market->pluck('id'))->get();
        return view('seller.market.show', compact('market', 'products'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Market $market)
    {
        //
    }
}
