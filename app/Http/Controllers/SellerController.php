<?php

namespace App\Http\Controllers;

use App\Models\Market;
use App\Models\Seller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSellerRequest;
use App\Http\Requests\StoreMarketRequest;
use App\Http\Requests\UpdateSellerRequest;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();
        $seller = $user->seller;

        if ($seller) {
            $markets = Market::whereIn('seller_id', $seller->pluck('id')->toArray())->get();
            return view('seller.market.index', compact('user', 'seller', 'markets'));
        } else {
            return view('seller.index', compact('user', 'seller'));
        }
        $markets = Market::whereIn('seller_id', $seller->pluck('id'))->get();
        if ($user->seller)
            return view('seller.market.index', compact('user', 'seller', 'markets'));
        else
            return view('seller.index', compact('user', 'seller'));
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

        Market::create([
            'seller_id' => $request->user()->id,
            'name' => "你的賣場",
            'description' => "賣場描述",
        ]);

        // 重定向到另一個路由，例如 'seller.market.index'

        return redirect()->route('seller.market.store');
    }

    /**
     * Display the specified resource.
     */
    public function show(Seller $seller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seller $seller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSellerRequest $request, Seller $seller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seller $seller)
    {
        //
    }
}
